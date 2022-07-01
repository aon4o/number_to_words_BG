<?php

/**
 * @param $money
 * @return string
 */
function add_extension($money): string
{
    if ($money[0] == 1) {
        return "лев";
    }
    return "лева";
}
