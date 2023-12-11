<?php

$content = file_get_contents('day1.txt');

$lines = explode("\n", $content);

$numbers = [];

$pattern1 = '/(?:[1-9]|one|two|three|four|five|six|seven|eight|nine)/';
$pattern2 = '/(?:[1-9]|eno|owt|eerht|ruof|evif|xis|neves|thgie|enin)/';


foreach ($lines as $line) {

    preg_match_all($pattern1, $line, $matches);
    $num1 = $matches[0][0];

    if (!is_numeric($num1)) {
        $num1 = wordToNumber($num1);
    }
    
    $reversedLine = strrev($line);
    preg_match_all($pattern2, $reversedLine, $matches);
    $num2 = $matches[0][0];

    if (!is_numeric($num2)) {
        $num2 = strrev($num2);
        $num2 = wordToNumber($num2);
    }
    
    $number = $num1 . $num2; 
    array_push($numbers, $number);
}

$sum = array_sum($numbers);
echo $sum;

function wordToNumber($word) {

    $wordMap = [
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5,
        'six' => 6,
        'seven' => 7,
        'eight' => 8,
        'nine' => 9,
    ];

    return array_key_exists($word, $wordMap) ? $wordMap[$word] : $word;
}