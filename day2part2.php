<?php

$content = file_get_contents('day2.txt');

$games = explode("\n", $content);

$patternRed = '/[0-9]{1,2}(?= r)/';
$patternGreen = '/[0-9]{1,2}(?= g)/';
$patternBlue = '/[0-9]{1,2}(?= b)/';

$result = 0;

foreach ($games as $game) {


    $maxRed = checkMaxOfCubes($patternRed, $game);
    $maxGreen = checkMaxOfCubes($patternGreen, $game);
    $maxBlue = checkMaxOfCubes($patternBlue, $game);

    $result += $maxRed * $maxGreen * $maxBlue; 

};

echo $result;

function checkMaxOfCubes($pattern, $game) {

    preg_match_all($pattern, $game, $matches);

    return max($matches[0]);

}