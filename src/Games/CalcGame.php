<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Engine\buildGameProcess;

const GAME_RULES = 'What is the result of the expression?';
const MAX_VALUE = 100;
const MIN_VALUE = 1;
const OPERATIONS = ['+', '-', '*'];

function generateCalcGameRound(): array
{
    $firstNum = rand(MIN_VALUE, MAX_VALUE);
    $secondNum = rand(MIN_VALUE, MAX_VALUE);
    $operation = OPERATIONS[rand(0, count(OPERATIONS) - 1)];

    $expression = null;
    $correctAnswer =  null;

    switch ($operation) {
        case '+':
            $expression = $firstNum . ' + ' . $secondNum;
            $correctAnswer = $firstNum + $secondNum;
            break;
        case '-':
            $expression = $firstNum . ' - ' . $secondNum;
            $correctAnswer = $firstNum - $secondNum;
            break;
        case '*':
            $expression = $firstNum . ' * ' . $secondNum;
            $correctAnswer = $firstNum * $secondNum;
            break;
    }

    return [$expression, $correctAnswer];
}

function play(): void
{
    buildGameProcess(GAME_RULES, function () {
        return generateCalcGameRound();
    });
}
