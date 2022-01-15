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
}