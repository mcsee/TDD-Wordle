<?php

Namespace Wordle;

require ROOT . '/Word.php';

final class Game {

    private $wordsTried;
    function __construct() {
        $this->wordsTried = [];
    }

    function hasWon(): bool {
        return false;
    }

    function addTry(Word $trial) {
        return $this->wordsTried[] = $trial;
    }

    function wordsTried(): array {
        return $this->wordsTried;
    }
}
