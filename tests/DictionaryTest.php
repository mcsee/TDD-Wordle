<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

define('ROOT', dirname(dirname(__FILE__)).'/src');
require ROOT . '/Dictionary.php';
require ROOT . '/Word.php';

final class DictionaryTest extends TestCase {
    public function test01EmptyDictionaryHasNoWords() {
        $dictionary = new Dictionary([]);
        $this->assertEquals(0, $dictionary->wordsCount());
    }

    public function test02SingleDictionaryReturns1AsCount() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $this->assertEquals(1, $dictionary->wordsCount());
    }

    public function test03DictionaryDoesNotIncludeWord() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $this->assertFalse($dictionary->includesWord(new Word('sadly')));
    }

    public function test04DictionaryIncludesWord() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $this->assertTrue($dictionary->includesWord(new Word('happy')));
    }
}
