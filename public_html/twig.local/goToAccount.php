<?php

require_once("include/common.inc.php");

function GoToAccount() {
    $vars = array();
    echo getView('form.twig', $vars);
}
