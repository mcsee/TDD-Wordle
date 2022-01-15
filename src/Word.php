<?php

Namespace Wordle;

final class Word {

    function __construct(string $letters) {
        if (str_contains($letters, '.'))
            throw new \Exception('word contain invalid letters');
        if (str_contains($letters,'*')) {
           throw new \Exception('word contain invalid letters');
        }
        if (strlen($letters) < 5) {
            throw new \Exception('Too few letters. Should be 5');
        }
        if (strlen($letters) > 5) {
            throw new \Exception('Too many letters. Should be 5');
        }
    }

    function letters(): array {
        return ['v', 'a', 'l', 'i', 'd'];
    }
}