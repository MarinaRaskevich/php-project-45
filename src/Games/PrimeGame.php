<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Engine\buildGameProcess;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no"';
const MAX_VALUE = 10;
const MIN_VALUE = 1;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generatePrimeGameRound(): array
{
    $randomNumber = rand(MIN_VALUE, MAX_VALUE);
    $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
    return [$randomNumber, $correctAnswer];
}

function play(): void
{
    buildGameProcess(GAME_RULES, function () {
        return generatePrimeGameRound();
    });
}
