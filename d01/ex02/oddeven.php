#!/usr/bin/php
<?php
$file = fopen("php://stdin", "r");
while (1)
{
    echo "Enter a number: ";
    $number = fgets($file);
    if ($number)
    {
        $number = substr($number, 0, -1);
        if (is_numeric($number))
        {
            if ($number % 2 == 0)
                echo "The number {$number} is even\n";
            else
                echo "The number {$number} is odd\n";
        }
        else
            echo "'{$number}' is not a number\n";
    } else {
        echo "\n";
        break;
    }
}