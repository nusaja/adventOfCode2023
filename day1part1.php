<?php

$content = file_get_contents('day1.txt');

$lines = explode("\n", $content);

$numbers = [];

foreach ($lines as $line) {
    $characters = str_split($line); 
    foreach($characters as $character) {
        if(is_numeric($character)) {
            $num1 = $character;
            break;
        }
    }
    $reversedCharacters = array_reverse($characters);
    foreach($reversedCharacters as $character) {
        if(is_numeric($character)) {
            $num2 = $character;
            break;
        }
    }
    $number = $num1 . $num2; 
    array_push($numbers, $number);
   
}

$sum = array_sum($numbers);

echo $sum;