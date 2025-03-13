<?php

namespace BrainGames\Games\GCDGame;

use function BrainGames\Engine\buildGameProcess;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';
const MAX_VALUE = 100;
const MIN_VALUE = 1;

function generateEvenGameRound(): array
{
    $firstNum = rand(MIN_VALUE, MAX_VALUE);
    $secondNum = rand(MIN_VALUE, MAX_VALUE);
    $storage = 0;
    $question = $firstNum . ' ' . $secondNum;
    while ($secondNum > 0) {
        $storage = $firstNum % $secondNum;
        $firstNum = $secondNum;
        $secondNum = $storage;
    }
    $correctAnswer = $firstNum;
    return [$question, $correctAnswer];
}

function play(): void
{
    buildGameProcess(GAME_RULES, function () {
        return generateEvenGameRound();
    });
}
