<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

define('ROOT', dirname(dirname(__FILE__)).'/src');
require ROOT . '/Word.php';

final class WordTest extends TestCase {
    public function test01ValidWordLettersAreValid() {
        $wordleWord = new Word('valid');
        $this->assertEquals(['v', 'a', 'l', 'i', 'd'], $wordleWord->letters());
    }

    public function test02FewWordLettersShouldRaiseException() {
        $this->expectException(\Exception::class);
        new Word('vali');
    }

    public function test03TooManyWordLettersShouldRaiseException() {
        $this->expectException(\Exception::class);
        new Word('toolong');
    }
}