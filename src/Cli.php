<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{
    echo "Welcome to the Brain Games!\n";
    $name = prompt('May I have yout name?');
    line("Hello, %s!", $name);
}
