<?php

Namespace Wordle;

require ROOT . '/Word.php';

final class Game {

    private $wordsTried;
    private $dictionary;
    function __construct(Dictionary $validWords) {
        $this->dictionary = $validWords;
        $this->wordsTried = [];
    }

    function hasWon(): bool {
        return false;
    }

    function hasLost(): bool {
        return count($this->wordsTried) > 4;
    }

    function addTry(Word $trial) {
        if (!$this->dictionary->includesWord($trial)){
            throw new \Exception('Word is not included ' . $trial);
        }
        return $this->wordsTried[] = $trial;
    }

    function wordsTried(): array {
        return $this->wordsTried;
    }
}
