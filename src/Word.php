<?php

Namespace Wordle;

final class Word {

    private $setters;
    function __construct(string $letters) {
        if (!\preg_match('/^[a-z]+$/i', $letters)) {
            throw new \Exception('word contain invalid letters');
        }
        if (strlen($letters) < 5) {
            throw new \Exception('Too few letters. Should be 5');
        }
        if (strlen($letters) > 5) {
            throw new \Exception('Too many letters. Should be 5');
        }
        $this->letters = $letters;
    }

    function letters(): array {
        return str_split($this->letters);
    }

    function matchesPositionWith(Word $anotherWord) : array {
        $positions = [];
        for ($currentPosition = 0; $currentPosition < count($this->letters()); $currentPosition++){
            if ($this->letters()[$currentPosition] == $anotherWord->letters()[$currentPosition]) {
                $positions[] = $currentPosition + 1; //Humans start counting on 1
                //We can implement this better in several other languages
            }
        }
        return $positions;
    }

    function matchesIncorrectPositionWith(Word $anotherWord) : array {
        $positions = [];
        //count($this->letters() is always 5 but we don't want to add a magic number here
        for ($currentPosition = 0; $currentPosition < count($this->letters()); $currentPosition++){
            if (in_array($this->letters()[$currentPosition], $anotherWord->letters())) {
                $positions[] = $currentPosition + 1; //Humans start counting on 1
                //We can implement this better in several other languages
            }
        }
        return array_values(array_diff($positions, $this->matchesPositionWith($anotherWord)));
    }

    public function __toString(){
        return $this->letters;
    }
}