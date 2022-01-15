<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

define('ROOT', dirname(dirname(__FILE__)).'/src');
require ROOT . '/Game.php';
require ROOT . '/Dictionary.php';

final class GameTest extends TestCase {
    public function test01EmptyGameHasNoWinner() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $this->assertFalse($game->hasWon());
    }

    public function test02EmptyGameHasNoWinner() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $this->assertEquals([], $game->wordsTried());
    }

    public function test03TryOneWordAndRecordIt() {
        $words = [new Word('loser'), new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $game->addtry(new Word('loser'));
        $this->assertEquals([new Word('loser')], $game->wordsTried());
    }

    public function test04TryOneWordAndDontLooseYet() {
        $words = [new Word('loser'), new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $game->addtry(new Word('loser'));
        $this->assertFalse($game->hasLost());
    }

    public function test05TryFiveWordsLoses() {
        $words = [new Word('loser'), new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $this->assertFalse($game->hasLost());
        $game->addtry(new Word('loser'));
        $this->assertTrue($game->hasLost());
    }

    public function test06TryToPlayInvalid() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $game = new Game($dictionary, new Word('happy'));
        $this->expectException(\Exception::class);
        $game->addtry(new Word('xxxx'));
    }

    public function test07GuessesWord() {
        $words = [new Word('happy')];
        $dictionary = new Dictionary($words);
        $winnerWord = new Word('happy');
        $game = new Game($dictionary, $winnerWord);
        $this->assertFalse($game->hasWon());
        $game->addtry(new Word('happy'));
        $this->assertTrue($game->hasWon());
    }
}