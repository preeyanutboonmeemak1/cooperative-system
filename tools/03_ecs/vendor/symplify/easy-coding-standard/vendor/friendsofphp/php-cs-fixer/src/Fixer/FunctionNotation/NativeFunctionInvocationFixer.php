<?php

declare (strict_types=1);
/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace PhpCsFixer\Fixer\FunctionNotation;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\ConfigurableFixerInterface;
use PhpCsFixer\FixerConfiguration\FixerConfigurationResolver;
use PhpCsFixer\FixerConfiguration\FixerConfigurationResolverInterface;
use PhpCsFixer\FixerConfiguration\FixerOptionBuilder;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Analyzer\Analysis\NamespaceAnalysis;
use PhpCsFixer\Tokenizer\Analyzer\FunctionsAnalyzer;
use PhpCsFixer\Tokenizer\Analyzer\NamespacesAnalyzer;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use ECSPrefix20220220\Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
/**
 * @author Andreas Möller <am@localheinz.com>
 */
final class NativeFunctionInvocationFixer extends \PhpCsFixer\AbstractFixer implements \PhpCsFixer\Fixer\ConfigurableFixerInterface
{
    /**
     * @internal
     */
    public const SET_ALL = '@all';
    /**
     * Subset of SET_INTERNAL.
     *
     * Change function call to functions known to be optimized by the Zend engine.
     * For details:
     * - @see https://github.com/php/php-src/blob/php-7.2.6/Zend/zend_compile.c "zend_try_compile_special_func"
     * - @see https://github.com/php/php-src/blob/php-7.2.6/ext/opcache/Optimizer/pass1_5.c
     *
     * @internal
     */
    public const SET_COMPILER_OPTIMIZED = '@compiler_optimized';
    /**
     * @internal
     */
    public const SET_INTERNAL = '@internal';
    /**
     * @var callable
     */
    private $functionFilter;
    public function configure(array $configuration) : void
    {
        parent::configure($configuration);
        $this->functionFilter = $this->getFunctionFilter();
    }
    /**
     * {@inheritdoc}
     */
    public function getDefinition() : \PhpCsFixer\FixerDefinition\FixerDefinitionInterface
    {
        return new \PhpCsFixer\FixerDefinition\FixerDefinition('Add leading `\\` before function invocation to speed up resolving.', [new \PhpCsFixer\FixerDefinition\CodeSample('<?php

function baz($options)
{
    if (!array_key_exists("foo", $options)) {
        throw new \\InvalidArgumentException();
    }

    return json_encode($options);
}
'), new \PhpCsFixer\FixerDefinition\CodeSample('<?php

function baz($options)
{
    if (!array_key_exists("foo", $options)) {
        throw new \\InvalidArgumentException();
    }

    return json_encode($options);
}
', ['exclude' => ['json_encode']]), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
namespace space1 {
    echo count([1]);
}
namespace {
    echo count([1]);
}
', ['scope' => 'all']), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
namespace space1 {
    echo count([1]);
}
namespace {
    echo count([1]);
}
', ['scope' => 'namespaced']), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
myGlobalFunction();
count();
', ['include' => ['myGlobalFunction']]), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
myGlobalFunction();
count();
', ['include' => ['@all']]), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
myGlobalFunction();
count();
', ['include' => ['@internal']]), new \PhpCsFixer\FixerDefinition\CodeSample('<?php
$a .= str_repeat($a, 4);
$c = get_class($d);
', ['include' => ['@compiler_optimized']])], null, 'Risky when any of the functions are overridden.');
    }
    /**
     * {@inheritdoc}
     *
     * Must run before GlobalNamespaceImportFixer.
     * Must run after BacktickToShellExecFixer, RegularCallableCallFixer, StrictParamFixer.
     */
    public function getPriority() : int
    {
        return 1;
    }
    /**
     * {@inheritdoc}
     */
    public function isCandidate(\PhpCsFixer\Tokenizer\Tokens $tokens) : bool
    {
        return $tokens->isTokenKindFound(\T_STRING);
    }
    /**
     * {@inheritdoc}
     */
    public function isRisky() : bool
    {
        return \true;
    }
    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        if ('all' === $this->configuration['scope']) {
            $this->fixFunctionCalls($tokens, $this->functionFilter, 0, \count($tokens) - 1, \false);
            return;
        }
        $namespaces = (new \PhpCsFixer\Tokenizer\Analyzer\NamespacesAnalyzer())->getDeclarations($tokens);
        // 'scope' is 'namespaced' here
        /** @var NamespaceAnalysis $namespace */
        foreach (\array_reverse($namespaces) as $namespace) {
            $this->fixFunctionCalls($tokens, $this->functionFilter, $namespace->getScopeStartIndex(), $namespace->getScopeEndIndex(), $namespace->isGlobalNamespace());
        }
    }
    /**
     * {@inheritdoc}
     */
    protected function createConfigurationDefinition() : \PhpCsFixer\FixerConfiguration\FixerConfigurationResolverInterface
    {
        return new \PhpCsFixer\FixerConfiguration\FixerConfigurationResolver([(new \PhpCsFixer\FixerConfiguration\FixerOptionBuilder('exclude', 'List of functions to ignore.'))->setAllowedTypes(['array'])->setAllowedValues([static function (array $value) : bool {
            foreach ($value as $functionName) {
                if (!\is_string($functionName) || '' === \trim($functionName) || \trim($functionName) !== $functionName) {
                    throw new \ECSPrefix20220220\Symfony\Component\OptionsResolver\Exception\InvalidOptionsException(\sprintf('Each element must be a non-empty, trimmed string, got "%s" instead.', \is_object($functionName) ? \get_class($functionName) : \gettype($functionName)));
                }
            }
            return \true;
        }])->setDefault([])->getOption(), (new \PhpCsFixer\FixerConfiguration\FixerOptionBuilder('include', 'List of function names or sets to fix. Defined sets are `@internal` (all native functions), `@all` (all global functions) and `@compiler_optimized` (functions that are specially optimized by Zend).'))->setAllowedTypes(['array'])->setAllowedValues([static function (array $value) : bool {
            foreach ($value as $functionName) {
                if (!\is_string($functionName) || '' === \trim($functionName) || \trim($functionName) !== $functionName) {
                    throw new \ECSPrefix20220220\Symfony\Component\OptionsResolver\Exception\InvalidOptionsException(\sprintf('Each element must be a non-empty, trimmed string, got "%s" instead.', \is_object($functionName) ? \get_class($functionName) : \gettype($functionName)));
                }
                $sets = [self::SET_ALL, self::SET_INTERNAL, self::SET_COMPILER_OPTIMIZED];
                if (\strncmp($functionName, '@', \strlen('@')) === 0 && !\in_array($functionName, $sets, \true)) {
                    throw new \ECSPrefix20220220\Symfony\Component\OptionsResolver\Exception\InvalidOptionsException(\sprintf('Unknown set "%s", known sets are "%s".', $functionName, \implode('", "', $sets)));
                }
            }
            return \true;
        }])->setDefault([self::SET_COMPILER_OPTIMIZED])->getOption(), (new \PhpCsFixer\FixerConfiguration\FixerOptionBuilder('scope', 'Only fix function calls that are made within a namespace or fix all.'))->setAllowedValues(['all', 'namespaced'])->setDefault('all')->getOption(), (new \PhpCsFixer\FixerConfiguration\FixerOptionBuilder('strict', 'Whether leading `\\` of function call not meant to have it should be removed.'))->setAllowedTypes(['bool'])->setDefault(\true)->getOption()]);
    }
    private function fixFunctionCalls(\PhpCsFixer\Tokenizer\Tokens $tokens, callable $functionFilter, int $start, int $end, bool $tryToRemove) : void
    {
        $functionsAnalyzer = new \PhpCsFixer\Tokenizer\Analyzer\FunctionsAnalyzer();
        $tokensToInsert = [];
        for ($index = $start; $index < $end; ++$index) {
            if (!$functionsAnalyzer->isGlobalFunctionCall($tokens, $index)) {
                continue;
            }
            $prevIndex = $tokens->getPrevMeaningfulToken($index);
            if (!$functionFilter($tokens[$index]->getContent()) || $tryToRemove) {
                if (\false === $this->configuration['strict']) {
                    continue;
                }
                if ($tokens[$prevIndex]->isGivenKind(\T_NS_SEPARATOR)) {
                    $tokens->clearTokenAndMergeSurroundingWhitespace($prevIndex);
                }
                continue;
            }
            if ($tokens[$prevIndex]->isGivenKind(\T_NS_SEPARATOR)) {
                continue;
                // do not bother if previous token is already namespace separator
            }
            $tokensToInsert[$index] = new \PhpCsFixer\Tokenizer\Token([\T_NS_SEPARATOR, '\\']);
        }
        $tokens->insertSlices($tokensToInsert);
    }
    private function getFunctionFilter() : callable
    {
        $exclude = $this->normalizeFunctionNames($this->configuration['exclude']);
        if (\in_array(self::SET_ALL, $this->configuration['include'], \true)) {
            if (\count($exclude) > 0) {
                return static function (string $functionName) use($exclude) : bool {
                    return !isset($exclude[\strtolower($functionName)]);
                };
            }
            return static function () : bool {
                return \true;
            };
        }
        $include = [];
        if (\in_array(self::SET_INTERNAL, $this->configuration['include'], \true)) {
            $include = $this->getAllInternalFunctionsNormalized();
        } elseif (\in_array(self::SET_COMPILER_OPTIMIZED, $this->configuration['include'], \true)) {
            $include = $this->getAllCompilerOptimizedFunctionsNormalized();
            // if `@internal` is set all compiler optimized function are already loaded
        }
        foreach ($this->configuration['include'] as $additional) {
            if (\strncmp($additional, '@', \strlen('@')) !== 0) {
                $include[\strtolower($additional)] = \true;
            }
        }
        if (\count($exclude) > 0) {
            return static function (string $functionName) use($include, $exclude) : bool {
                return isset($include[\strtolower($functionName)]) && !isset($exclude[\strtolower($functionName)]);
            };
        }
        return static function (string $functionName) use($include) : bool {
            return isset($include[\strtolower($functionName)]);
        };
    }
    /**
     * @return array<string, true> normalized function names of which the PHP compiler optimizes
     */
    private function getAllCompilerOptimizedFunctionsNormalized() : array
    {
        return $this->normalizeFunctionNames([
            // @see https://github.com/php/php-src/blob/PHP-7.4/Zend/zend_compile.c "zend_try_compile_special_func"
            'array_key_exists',
            'array_slice',
            'assert',
            'boolval',
            'call_user_func',
            'call_user_func_array',
            'chr',
            'count',
            'defined',
            'doubleval',
            'floatval',
            'func_get_args',
            'func_num_args',
            'get_called_class',
            'get_class',
            'gettype',
            'in_array',
            'intval',
            'is_array',
            'is_bool',
            'is_double',
            'is_float',
            'is_int',
            'is_integer',
            'is_long',
            'is_null',
            'is_object',
            'is_real',
            'is_resource',
            'is_string',
            'ord',
            'strlen',
            'strval',
            // @see https://github.com/php/php-src/blob/php-7.2.6/ext/opcache/Optimizer/pass1_5.c
            'constant',
            'define',
            'dirname',
            'extension_loaded',
            'function_exists',
            'is_callable',
        ]);
    }
    /**
     * @return array<string, true> normalized function names of all internal defined functions
     */
    private function getAllInternalFunctionsNormalized() : array
    {
        return $this->normalizeFunctionNames(\get_defined_functions()['internal']);
    }
    /**
     * @param string[] $functionNames
     *
     * @return array<string, true> all function names lower cased
     */
    private function normalizeFunctionNames(array $functionNames) : array
    {
        foreach ($functionNames as $index => $functionName) {
            $functionNames[\strtolower($functionName)] = \true;
            unset($functionNames[$index]);
        }
        return $functionNames;
    }
}