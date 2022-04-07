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
namespace PhpCsFixer\Fixer\Operator;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Analyzer\AlternativeSyntaxAnalyzer;
use PhpCsFixer\Tokenizer\Analyzer\Analysis\SwitchAnalysis;
use PhpCsFixer\Tokenizer\Analyzer\ControlCaseStructuresAnalyzer;
use PhpCsFixer\Tokenizer\Analyzer\GotoLabelAnalyzer;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
/**
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
final class TernaryOperatorSpacesFixer extends \PhpCsFixer\AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function getDefinition() : \PhpCsFixer\FixerDefinition\FixerDefinitionInterface
    {
        return new \PhpCsFixer\FixerDefinition\FixerDefinition('Standardize spaces around ternary operator.', [new \PhpCsFixer\FixerDefinition\CodeSample("<?php \$a = \$a   ?1 :0;\n")]);
    }
    /**
     * {@inheritdoc}
     *
     * Must run after ArraySyntaxFixer, ListSyntaxFixer, TernaryToElvisOperatorFixer.
     */
    public function getPriority() : int
    {
        return 0;
    }
    /**
     * {@inheritdoc}
     */
    public function isCandidate(\PhpCsFixer\Tokenizer\Tokens $tokens) : bool
    {
        return $tokens->isAllTokenKindsFound(['?', ':']);
    }
    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, \PhpCsFixer\Tokenizer\Tokens $tokens) : void
    {
        $alternativeSyntaxAnalyzer = new \PhpCsFixer\Tokenizer\Analyzer\AlternativeSyntaxAnalyzer();
        $gotoLabelAnalyzer = new \PhpCsFixer\Tokenizer\Analyzer\GotoLabelAnalyzer();
        $ternaryOperatorIndices = [];
        $excludedIndices = $this->getColonIndicesForSwitch($tokens);
        foreach ($tokens as $index => $token) {
            if (!$token->equalsAny(['?', ':'])) {
                continue;
            }
            if (\in_array($index, $excludedIndices, \true)) {
                continue;
            }
            if ($alternativeSyntaxAnalyzer->belongsToAlternativeSyntax($tokens, $index)) {
                continue;
            }
            if ($gotoLabelAnalyzer->belongsToGoToLabel($tokens, $index)) {
                continue;
            }
            $ternaryOperatorIndices[] = $index;
        }
        foreach (\array_reverse($ternaryOperatorIndices) as $index) {
            $token = $tokens[$index];
            if ($token->equals('?')) {
                $nextNonWhitespaceIndex = $tokens->getNextNonWhitespace($index);
                if ($tokens[$nextNonWhitespaceIndex]->equals(':')) {
                    // for `$a ?: $b` remove spaces between `?` and `:`
                    $tokens->ensureWhitespaceAtIndex($index + 1, 0, '');
                } else {
                    // for `$a ? $b : $c` ensure space after `?`
                    $this->ensureWhitespaceExistence($tokens, $index + 1, \true);
                }
                // for `$a ? $b : $c` ensure space before `?`
                $this->ensureWhitespaceExistence($tokens, $index - 1, \false);
                continue;
            }
            if ($token->equals(':')) {
                // for `$a ? $b : $c` ensure space after `:`
                $this->ensureWhitespaceExistence($tokens, $index + 1, \true);
                $prevNonWhitespaceToken = $tokens[$tokens->getPrevNonWhitespace($index)];
                if (!$prevNonWhitespaceToken->equals('?')) {
                    // for `$a ? $b : $c` ensure space before `:`
                    $this->ensureWhitespaceExistence($tokens, $index - 1, \false);
                }
            }
        }
    }
    /**
     * @return int[]
     */
    private function getColonIndicesForSwitch(\PhpCsFixer\Tokenizer\Tokens $tokens) : array
    {
        $colonIndices = [];
        foreach (\PhpCsFixer\Tokenizer\Analyzer\ControlCaseStructuresAnalyzer::findControlStructures($tokens, [\T_SWITCH]) as $analysis) {
            foreach ($analysis->getCases() as $case) {
                $colonIndices[] = $case->getColonIndex();
            }
            if ($analysis instanceof \PhpCsFixer\Tokenizer\Analyzer\Analysis\SwitchAnalysis) {
                $defaultAnalysis = $analysis->getDefaultAnalysis();
                if (null !== $defaultAnalysis) {
                    $colonIndices[] = $defaultAnalysis->getColonIndex();
                }
            }
        }
        return $colonIndices;
    }
    private function ensureWhitespaceExistence(\PhpCsFixer\Tokenizer\Tokens $tokens, int $index, bool $after) : void
    {
        if ($tokens[$index]->isWhitespace()) {
            if (\strpos($tokens[$index]->getContent(), "\n") === \false && !$tokens[$index - 1]->isComment()) {
                $tokens[$index] = new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
            }
            return;
        }
        $index += $after ? 0 : 1;
        $tokens->insertAt($index, new \PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']));
    }
}
