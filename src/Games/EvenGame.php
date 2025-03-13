<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\buildGameProcess;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_VALUE = 50;
const MIN_VALUE = 1;

function generateEvenGameRound(): array
{
    $randomNumber = rand(MIN_VALUE, MAX_VALUE);
    $correctAnswer = ($randomNumber % 2 === 0) ? 'yes' : 'no';

    return [$randomNumber, $correctAnswer];
}

function play(): void
{
    buildGameProcess(GAME_RULES, function () {
        return generateEvenGameRound();
    });
}
