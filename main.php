<?php

require('format_pennies.php');
require('validate_input.php');
require('make_levs_array.php');
require('format_levs.php');
require('add_extension.php');

echo "Hello, I'm here to convert your money from numbers to words!\n";
echo "If you want to exit just type 'quit'/'q'/'exit'.\n";

$input = '';

while (true)
{
    //    GETTING THE USER INPUT
    $input = strtolower(readline("Enter a number -> "));

    //    QUITTING THE PROGRAM
    if ($input === 'quit' or $input === 'q' or $input === 'exit') {
        break;
    }

    //    INPUT VALIDATION
    if (validate_input($input)) {
        echo "Invalid input!\n";
        echo "Make sure you only type numbers bigger than 0!\n";
        continue;
    }

    //    FORMATTING RESULT
    $money = explode('.', (float) $input);
    $result = format_levs($money);
    $result.= add_extension($money);
    $result.= format_pennies($money);

    //    PRINTING THE RESULT TO THE CONSOLE
    echo $result."\n";
}

echo "Okay, Bye!\n";