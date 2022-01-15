<?php

Namespace Wordle;

require ROOT . '/Word.php';

final class Game {

    private $wordsTried;
    private $dictionary;
    private $winnerWord;
    function __construct(Dictionary $validWords, Word $winnerWord) {
        $this->dictionary = $validWords;
        $this->wordsTried = [];
        $this->winnerWord = $winnerWord;
    }

    function hasWon(): bool {
        return in_array($this->winnerWord, $this->wordsTried);
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
