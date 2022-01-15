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

    public function test04EmptyLettersShouldRaiseException() {
        $this->expectException(\Exception::class);
        new Word('');
    }

    public function test05InvalidLettersShouldRaiseException() {
        $this->expectException(\Exception::class);
        new Word('vali*');
    }

    public function test06PointShouldRaiseException() {
        $this->expectException(\Exception::class);
        new Word('v.lid');
    }

    public function test07TwoWordsAreNotTheSame() {
        $firstWord = new Word('valid');
        $secondWord = new Word('happy');
        $this->assertNotEquals($firstWord, $secondWord);
    }
}