<?php

namespace Wordle;

use PHPUnit\Framework\TestCase;

define('ROOT', dirname(dirname(__FILE__)).'/src');
require ROOT . '/Game.php';
require ROOT . '/Dictionary.php';

final class GameTest extends TestCase {
    public function test01EmptyGameHasNoWinner() {
        $game = new Game();
        $this->assertFalse($game->hasWon());
    }

    public function test02EmptyGameHasNoWinner() {
        $game = new Game();
        $this->assertEquals([], $game->wordsTried());
    }

    public function test03TryOneWordAndRecordIt() {
        $game = new Game();
        $game->addtry(new Word('loser'));
        $this->assertEquals([new Word('loser')], $game->wordsTried());
    }

    public function test04TryOneWordAndDontLooseYet() {
        $game = new Game();
        $game->addtry(new Word('loser'));
        $this->assertFalse($game->hasLost());
    }

    public function test05TryFiveWordsLoses() {
        $game = new Game();
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $game->addtry(new Word('loser'));
        $this->assertFalse($game->hasLost());
        $game->addtry(new Word('loser'));
        $this->assertTrue($game->hasLost());
    }
}