<?php

require('constants.php');

function format_levs($money): string
{
    $result = '';
    $levs_array = make_levs_array($money[0]);

    for ($levs_part_index = 0; $levs_part_index < count($levs_array); ++$levs_part_index)
    {
        if ($levs_array[$levs_part_index] == 1) {
            if (count($levs_array) === 1 or count($levs_array) - 1 === $levs_part_index) {
                $result.='един ';
                break;
            }

            $result.=WORDS[count($levs_array) - $levs_part_index].' ';

            if (count($levs_array) - $levs_part_index === 2) {
                $result.='и ';
            }

            continue;
        }

        $levs_int = (int) $levs_array[$levs_part_index];

        if (strlen($levs_int) === 1)
        {
            //    ONES
            $result.=NUMBERS[$levs_array[0]].' '.WORDS[$levs_part_index];
        } elseif (strlen($levs_int) === 2)
        {
            //    TENS
            if (count($levs_array) === 1) {
                if ($levs_int < 20)
                {
                    $result.=TENS[$levs_int - 10].' ';
                } else
                {
                    $result.=PLURAL_NUMBERS[$levs_int / 10].' ';

                    $ones = $levs_int - ($levs_array[$levs_part_index][0] * 10);
                    if ($ones !== 0)
                    {
                        $result.='и '.NUMBERS[$ones].' ';
                    }
                }
            } else {
                if ($levs_int < 20)
                {
                    $result.=TENS[$levs_int - 10].' ';
                } else
                {
                    $result.=PLURAL_NUMBERS[$levs_int / 10].' ';

                    $ones = $levs_int - ($levs_array[$levs_part_index][0] * 10);
                    if ($ones !== 0)
                    {
                        $result.='и '.NUMBERS[$ones].' ';
                    }

                    $result.=PLURAL_NUMBERS[$levs_array[$levs_part_index][1]].' и '.NUMBERS[$levs_array[$levs_part_index][2]].' ';

                }
            }
        }
        else
        {
            //    HUNDREDS
            $result.=HUNDREDS[$levs_array[$levs_part_index][0]].' ';

            if ($levs_int % 100 === 0)
            {
                continue;
            }

            $tens = (int) $levs_array[$levs_part_index][1].$levs_array[$levs_part_index][2];


            if ($levs_array[$levs_part_index][1] === '0')
            {
                $result.='и '.NUMBERS[$levs_array[$levs_part_index][2]].' ';
                continue;
            }

            if ($tens < 20)
            {
                $result.='и '.TENS[$tens - 10].' ';
            } else
            {
                $result.=PLURAL_NUMBERS[$tens / 10].' ';

                $ones = $tens - ($levs_array[$levs_part_index][1] * 10);
                if ($ones !== 0)
                {
                    $result.='и '.NUMBERS[$ones].' ';
                }
            }

//            $result.=PLURAL_NUMBERS[$levs[$i][1]].' и '.NUMBERS[$levs[$i][2]].' ';

        }
    }

    return $result;
}

