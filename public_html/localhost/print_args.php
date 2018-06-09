<?php
if ($argc > 1) {
    echo "Number of arguments: ", $argc - 1, "\n";
    echo "Arguments: ";
    for ($i = 1; $i < $argc; $i++) {
        echo $argv[$i] . " ";
    }
    echo "\n";
} else {
    echo "There are no passed arguments", "\n";
}