<?php

/**
 * @param $levs_str
 * @return array
 */
function make_levs_array($levs_str): array
{
    $levs_str = strrev($levs_str);
    $result = str_split($levs_str, 3);
    $result = array_reverse($result);

    for ($levs_part = 0; $levs_part < count($result); $levs_part++) {
        $result[$levs_part] = strrev($result[$levs_part]);
    }

    return $result;
}

