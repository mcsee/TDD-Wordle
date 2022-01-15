<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__FILE__)).'/src/Word.php';
require_once dirname(dirname(__FILE__)).'/src/Dictionary.php';

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
