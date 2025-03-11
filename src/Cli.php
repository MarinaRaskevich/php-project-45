<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{
    $name = prompt('May i have yout name?');
    line("Hello, %s!", $name);
}
