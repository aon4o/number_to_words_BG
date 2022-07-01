<?php

/**
 * @param $input
 * @return bool
 */
function validate_input($input): bool
{
    $float_input = (float) $input;

    if ($float_input === 0.0 or substr_count($input, '.') > 1) {
        return true;
    }

    return false;
}
