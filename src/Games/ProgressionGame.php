<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\buildGameProcess;

const GAME_RULES = 'What number is missing in the progression?';
const MAX_VALUE = 20;
const MIN_VALUE = 1;
const PROGRESSION_LENGTH = 10;

function generateProgressionGameRound(): array
{
    $start = rand(MIN_VALUE, MAX_VALUE);
    $step = rand(MIN_VALUE, MAX_VALUE);
    $missingElementIndex = rand(0, PROGRESSION_LENGTH - 1);
    $progressionArray = [];

    for ($i = 0; $i < PROGRESSION_LENGTH; $i += 1) {
        array_push($progressionArray, $start + $i * $step);
    }

    $correctAnswer = $progressionArray[$missingElementIndex];
    $progressionArray[$missingElementIndex] = '..';

    return [implode(' ', $progressionArray), $correctAnswer];
}

function play(): void
{
    buildGameProcess(GAME_RULES, function () {
        return generateProgressionGameRound();
    });
}
