<?php

require_once("include/common.inc.php");
require_once("workWithUser.php");

$isAllComponents = isset($_POST["first_name"]) && isset($_POST["last_name"])
    && isset($_POST["username"]) && isset($_POST["email"])
    && isset($_POST["password_1"]) && isset($_POST["password_2"]);

print_r($_POST);

if ($isAllComponents) {
    // Формируем массив для JSON ответа
    $result = array(
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'username' => $_POST["username"],
        'email' => $_POST["email"],
        'password_1' => $_POST["password_1"],
        'password_2' => $_POST["password_2"]
    );

    CreateNewUser($result);
} else {
    die('User entered not all components');
}
