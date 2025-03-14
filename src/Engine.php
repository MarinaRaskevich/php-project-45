<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_NUMBER = 3;

function buildGameProcess(string $gameRules, callable $generateRoundData): void
{
    echo "Welcome to the Brain Games!\n";
    $name = prompt('May I have yout name?');
    line("Hello, %s!", $name);
    line($gameRules);

    for ($i = 0; $i < ROUNDS_NUMBER; $i += 1) {
        [$question, $correctAnswer] = $generateRoundData();

        line("Question: {$question}");
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}");
}
