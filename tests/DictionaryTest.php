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
}
