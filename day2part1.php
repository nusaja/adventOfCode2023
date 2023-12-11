<?php

$content = file_get_contents('day2.txt');

$games = explode("\n", $content);

$cubesInBag = [12, 13, 14];

$patternRed = '/[0-9]{1,2}(?= r)/';
$patternGreen = '/[0-9]{1,2}(?= g)/';
$patternBlue = '/[0-9]{1,2}(?= b)/';

$result = 0;

foreach ($games as $key => $game) {

    if (!checkIfPossible($patternRed, $game, $cubesInBag[0])) {
        continue;
    }

    if (!checkIfPossible($patternGreen, $game, $cubesInBag[1])) {
        continue;
    }

    if (!checkIfPossible($patternBlue, $game, $cubesInBag[2])) {
        continue;
    } 

    $result += $key + 1;
 
};

echo $result;

function checkIfPossible($pattern, $game, $maxCubes) {

    preg_match_all($pattern, $game, $matches);

    foreach($matches[0] as $match) {
        if($match > $maxCubes) {
            return false;
        } 
    }

    return true;

}