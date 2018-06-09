<?php

require_once("include/common.inc.php");
require_once("workWithUser.php");
require_once("goToAccount.php");

$isAllComponents = isset($_POST["login"]) && isset($_POST["password"]);

if ($isAllComponents) {
    // Формируем массив для JSON ответа
    $result = array(
        'login' => $_POST["login"],
        'password' => $_POST["password"]
    );

    //получаем id пользователя
    $idRegisteredUser = GetUser($result['login'], $result['password']);

    if ($idRegisteredUser != 0)
    {
        $vars = array();
        echo getView('form.twig', $vars);
    }
    else
    {
        echo "Пользователь не найден";
    }
}
else
{
    die('User entered not all components');
}