<?php

function createPrimeNumbers()
{
    function isPrime($i)
    {
        if ($i <= 1) {
            return false;
        }
        for ($j = 2; $j <= ($i - ($i % 2)) / 2; $j++) {
            if ($i % $j === 0) {
                return false;
            }
        }
        return true;
    }

    $primeNumbers = array();
    $counter = 0;
    $maxCounterValue = 10;
    $i = 1;

    while ($counter < $maxCounterValue) {
        if (isPrime($i)) {
            array_push($primeNumbers, $i);
            $counter++;
        }
        $i++;
    }
    return $primeNumbers;
}

function createArrayInformation()
{
    $arrayInformation = array(
        "count" => "Подсчитывает количество элементов массива или что-то в объекте",
        "is_array" => "Определяет, является ли переменная массивом",
        "array_merge" => "Сливает один или большее количество массивов",
        "empty" => "Проверяет, пуста ли переменная",
        "print_r" => "Выводит удобочитаемую информацию о переменной",
    );
    return $arrayInformation;
}

function createMatrix()
{
    $min = 0;
    $max = 4;

    $matrix = array();
    for ($i = $min; $i < $max; $i++) {
        for ($j = $min; $j < $max; $j++) {
            if ($i == $j) {
                $matrix[$i][$j] = 1;
            } else {
                $matrix[$i][$j] = 0;
            }
        }
    }
    return($matrix);
}

$primeNumbers = createPrimeNumbers();
print_r($primeNumbers);
echo "<br/>";

$arrayInformation = createArrayInformation();
print_r($arrayInformation);
echo "<br/>";

$matrix = createMatrix();
print_r($matrix);
echo "<br/>";