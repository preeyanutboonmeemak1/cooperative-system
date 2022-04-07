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
namespace PhpCsFixer\Fixer\ControlStructure;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\ConfigurableFixerInterface;
use PhpCsFixer\FixerConfiguration\FixerConfigurationResolver;
use PhpCsFixer\FixerConfiguration\FixerConfigurationResolverInterface;
use PhpCsFixer\FixerConfiguration\FixerOptionBuilder;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
/**
 * @author Eddilbert Macharia <edd.cowan@gmail.com>
 */
final class NoAlternativeSyntaxFixer extends \PhpCsFixer\AbstractFixer implements \PhpCsFixer\Fixer\ConfigurableFixerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDefinition() : \PhpCsFixer\FixerDefinition\FixerDefinitionInterface
    {
        return new \PhpCsFixer\FixerDefinition\FixerDefinition('Replace control structure alternative syntax to use braces.', [new \PhpCsFixer\FixerDefinition\CodeSample("<?php\nif(true):echo 't';else:echo 'f';endif;\n"), new \PhpCsFixer\FixerDefinition\CodeSample("<?php if (\$condition): ?>\nLorem ipsum.\n<?php endif; ?>\n", ['fix_non_monolithic_code' => \true])]);
    }
    /**
     * {@inheritdoc}
     */
    public function isCandidate(\PhpCsFixer\Tokenizer\Tokens $tokens) : bool
    {
        return $tokens->hasAlternativeSyntax() && (\true === $this->configuration['fix_non_monolithic_code'] || $tokens->isMonolithicPhp());
    }
    /**
     * {@inheritdoc}
     *
     * Must run before BracesFixer, ElseifFixer, NoSuperfluousElseifFixer, NoUselessElseFixer, SwitchContinueToBreakFixer.
     */
    public function getPriority() : int
    {
        return 42;
    }
    /**
     * {@inheritDoc}
     */
    protected function createConfigurationDefinition() : \PhpCsFixer\FixerConfiguration\FixerConfigurationResolverInterface
    {
        return new \PhpCsFixer\FixerConfiguration\FixerConfigurationResolver([(new \PhpCsFixer\FixerConfiguration\FixerOptionBuilder('fix_non_monolithic_code', 'Whether to also fix code with inline HTML.'))->setAllowedTypes(['bool'])->setDefault(\true)->getOption()]);
    }
    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        for ($index = \count($tokens) - 1; 0 <= $index; --$index) {
            $token = $tokens[$index];
            $this->fixElseif($index, $token, $tokens);
            $this->fixElse($index, $token, $tokens);
            $this->fixOpenCloseControls($index, $token, $tokens);
        }
    }
    private function findParenthesisEnd(\PhpCsFixer\Tokenizer\Tokens $tokens, int $structureTokenIndex) : int
    {
        $nextIndex = $tokens->getNextMeaningfulToken($structureTokenIndex);
        $nextToken = $tokens[$nextIndex];
        return $nextToken->equals('(') ? $tokens->findBlockEnd(\PhpCsFixer\Tokenizer\Tokens::BLOCK_TYPE_PARENTHESIS_BRACE, $nextIndex) : $structureTokenIndex;
    }
    /**
     * Handle both extremes of the control structures.
     * e.g. if(): or endif;.
     *
     * @param int    $index  the index of the token being processed
     * @param Token  $token  the token being processed
     * @param Tokens $tokens the collection of tokens
     */
    private function fixOpenCloseControls(int $index, \PhpCsFixer\Tokenizer\Token $token, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        if ($token->isGivenKind([\T_IF, \T_FOREACH, \T_WHILE, \T_FOR, \T_SWITCH, \T_DECLARE])) {
            $openIndex = $tokens->getNextTokenOfKind($index, ['(']);
            $closeIndex = $tokens->findBlockEnd(\PhpCsFixer\Tokenizer\Tokens::BLOCK_TYPE_PARENTHESIS_BRACE, $openIndex);
            $afterParenthesisIndex = $tokens->getNextMeaningfulToken($closeIndex);
            $afterParenthesis = $tokens[$afterParenthesisIndex];
            if (!$afterParenthesis->equals(':')) {
                return;
            }
            $items = [];
            if (!$tokens[$afterParenthesisIndex - 1]->isWhitespace()) {
                $items[] = new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
            }
            $items[] = new \PhpCsFixer\Tokenizer\Token('{');
            if (!$tokens[$afterParenthesisIndex + 1]->isWhitespace()) {
                $items[] = new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
            }
            $tokens->clearAt($afterParenthesisIndex);
            $tokens->insertAt($afterParenthesisIndex, $items);
        }
        if (!$token->isGivenKind([\T_ENDIF, \T_ENDFOREACH, \T_ENDWHILE, \T_ENDFOR, \T_ENDSWITCH, \T_ENDDECLARE])) {
            return;
        }
        $nextTokenIndex = $tokens->getNextMeaningfulToken($index);
        $nextToken = $tokens[$nextTokenIndex];
        $tokens[$index] = new \PhpCsFixer\Tokenizer\Token('}');
        if ($nextToken->equals(';')) {
            $tokens->clearAt($nextTokenIndex);
        }
    }
    /**
     * Handle the else: cases.
     *
     * @param int    $index  the index of the token being processed
     * @param Token  $token  the token being processed
     * @param Tokens $tokens the collection of tokens
     */
    private function fixElse(int $index, \PhpCsFixer\Tokenizer\Token $token, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        if (!$token->isGivenKind(\T_ELSE)) {
            return;
        }
        $tokenAfterElseIndex = $tokens->getNextMeaningfulToken($index);
        $tokenAfterElse = $tokens[$tokenAfterElseIndex];
        if (!$tokenAfterElse->equals(':')) {
            return;
        }
        $this->addBraces($tokens, new \PhpCsFixer\Tokenizer\Token([\T_ELSE, 'else']), $index, $tokenAfterElseIndex);
    }
    /**
     * Handle the elsif(): cases.
     *
     * @param int    $index  the index of the token being processed
     * @param Token  $token  the token being processed
     * @param Tokens $tokens the collection of tokens
     */
    private function fixElseif(int $index, \PhpCsFixer\Tokenizer\Token $token, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        if (!$token->isGivenKind(\T_ELSEIF)) {
            return;
        }
        $parenthesisEndIndex = $this->findParenthesisEnd($tokens, $index);
        $tokenAfterParenthesisIndex = $tokens->getNextMeaningfulToken($parenthesisEndIndex);
        $tokenAfterParenthesis = $tokens[$tokenAfterParenthesisIndex];
        if (!$tokenAfterParenthesis->equals(':')) {
            return;
        }
        $this->addBraces($tokens, new \PhpCsFixer\Tokenizer\Token([\T_ELSEIF, 'elseif']), $index, $tokenAfterParenthesisIndex);
    }
    /**
     * Add opening and closing braces to the else: and elseif: cases.
     *
     * @param Tokens $tokens     the tokens collection
     * @param Token  $token      the current token
     * @param int    $index      the current token index
     * @param int    $colonIndex the index of the colon
     */
    private function addBraces(\PhpCsFixer\Tokenizer\Tokens $tokens, \PhpCsFixer\Tokenizer\Token $token, int $index, int $colonIndex) : void
    {
        $items = [new \PhpCsFixer\Tokenizer\Token('}'), new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']), $token];
        if (!$tokens[$index + 1]->isWhitespace()) {
            $items[] = new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
        }
        $tokens->clearAt($index);
        $tokens->insertAt($index, $items);
        // increment the position of the colon by number of items inserted
        $colonIndex += \count($items);
        $items = [new \PhpCsFixer\Tokenizer\Token('{')];
        if (!$tokens[$colonIndex + 1]->isWhitespace()) {
            $items[] = new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
        }
        $tokens->clearAt($colonIndex);
        $tokens->insertAt($colonIndex, $items);
    }
}