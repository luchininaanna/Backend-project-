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

$arg1 = $_GET['arg1'] ?? 0;
$arg2 = $_GET['arg2'] ?? 0;
$operation = $_GET['operation'] ?? 'add';

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