<?php
function add($arg1, $arg2)
{
    return ($arg1 + $arg2);
}

function sub($arg1, $arg2)
{
    return ($arg1 - $arg2);
}

function mul($arg1, $arg2)
{
    return ($arg1 * $arg2);
}

function div($arg1, $arg2)
{
    if ($arg2 == 0) {
        return 0;
    }
    return ($arg1 / $arg2);
}

function checkParamsByRequest() {
    if (count($_GET) > 3) {
        throw new Exception('Переданы лишние параметры');
    }
    if (count($_GET) < 3) {
        throw new Exception('Переданы не все параметры');
    }
    return 0;
}

function getFirstOperator() {
    if (!array_key_exists('arg1', $_GET)) {
        throw new Exception('Первый аргумент имеет некорректное имя');
    } else {
        if (!is_numeric($_GET['arg1'])) {
            throw new Exception('Первый аргумент имеет нечисловое значени');
        }
    }
    return $_GET['arg1'];
}

function getSecondOperator() {
    if (!array_key_exists('arg2', $_GET)) {
        throw new Exception('Второй аргумент имеет некорректное имя');
    } else {
        if (!is_numeric($_GET['arg2'])) {
            throw new Exception('Второй аргумент имеет нечисловое значение');
        }
    }
    return $_GET['arg2'];
}

function getOperation() {
    $arithmetic_operation = array("add", "sub", "mul", "div");

    if (!array_key_exists('operation', $_GET)) {
        throw new Exception('Название операции имеет некорректное имя');
    } else {
        if (!in_array($_GET['operation'], $arithmetic_operation)) {
            throw new Exception('Параметр содержит некорректную операцию');
        } else {
            $secondOperandIsZero = ($_GET['arg2'] == 0) ? 1 : 0;
            if ($secondOperandIsZero and $_GET['operation'] == 'div')
                throw new Exception('Происходит деление на ноль');
        }
    }
    return $_GET['operation'];
}

try {
    checkParamsByRequest();
    $arg1 = getFirstOperator();
    $arg2 = getSecondOperator();
    $operation = getOperation();

    switch ($operation) {
        case 'add':
            echo(add($arg1, $arg2));
            break;
        case 'sub':
            echo(sub($arg1, $arg2));
            break;
        case 'mul':
            echo(mul($arg1, $arg2));
            break;
        case 'div':
            echo(div($arg1, $arg2));
            break;
    }

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "<br/>";
}