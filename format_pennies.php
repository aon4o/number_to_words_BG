<?php

/**
 * @param $money
 * @return string
 */
function format_pennies($money): string
{
    $result = '';

    if (count($money) === 1) {
        return ' и 0 стотинки';
    }

    $pennies = $money[1];

    if (strlen($pennies) === 1) {
        $pennies *= 10;
    }

    $result .= " и ".$pennies;

    if ($pennies > 1) {
        $result.=" стотинки";
    } else {
        $result.=" стотинкa";
    }

    return $result;
}

