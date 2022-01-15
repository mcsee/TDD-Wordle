<?php

Namespace Wordle;

require ROOT . '/Word.php';

final class Game {

    function __construct() {
    }

    function hasWon(): bool{
        return false;
    }

}
