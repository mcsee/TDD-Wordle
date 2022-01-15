<?php

Namespace Wordle;

final class Dictionary {

    private $words;
    function __construct(array $words) {
        $this->words = $words;
    }

    function wordsCount(): int {
        return count($this->words);
    }

    function includesWord(Word $subjectToSearch): bool {
        return in_array($subjectToSearch, $this->words);
    }
}
