<?php

$beginNumber = 1;
$endNumber = 100;

$multMap = array(
    3 => 'Fizz',
    5 => 'Buzz'
);

function isMultipleOf($number, $multipleOf)
{
    return $number % $multipleOf == 0;
}

for ($i = $beginNumber; $i <= $endNumber; $i++) {

    $output = '';
    foreach ($multMap as $multiple => $text) {

        if (isMultipleOf($i, $multiple)) {
            $output .= $text;
        }
    }

    echo empty($output) ? $i : $output;
    echo '<br />';
}
