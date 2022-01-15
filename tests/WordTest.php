<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__FILE__)).'/src/Word.php';

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

    public function test08TwoWordsAreTheSame() {
        $firstWord = new Word('valid');
        $secondWord = new Word('valid');
        $this->assertEquals($firstWord, $secondWord);
    }

    public function test09LettersForGrassWord() {
        $grassWord = new Word('grass');
        $this->assertEquals(['g', 'r', 'a', 's', 's'], $grassWord->letters());
    }

    public function test10NoMatch() {
        $firstWord = new Word('trees');
        $secondWord = new Word('valid');
        $this->assertEquals([], $firstWord->matchesPositionWith($secondWord));
    }

    public function test11MatchesFirstLetter() {
        $firstWord = new Word('trees');
        $secondWord = new Word('table');
        $this->assertEquals([1], $firstWord->matchesPositionWith($secondWord));
    }

    public function test12MatchesAllLetters() {
        $firstWord = new Word('trees');
        $secondWord = new Word('trees');
        $this->assertEquals([1, 2, 3 , 4 ,5], $firstWord->matchesPositionWith($secondWord));
    }

    public function test13MatchesIncorrectPositions() {
        $firstWord = new Word('trees');
        $secondWord = new Word('loser');
        $this->assertEquals([4], $firstWord->matchesPositionWith($secondWord));
        $this->assertEquals([], $firstWord->matchesIncorrectPositionWith($secondWord));
    }
}