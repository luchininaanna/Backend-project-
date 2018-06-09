<?php
header("Content-type: text/plain");
$name = $_GET["my_name"] ?? "";
echo "Hello, Dear {$name}!";