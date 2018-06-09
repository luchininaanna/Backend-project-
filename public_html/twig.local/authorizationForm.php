<?php
require_once("include/common.inc.php");

$vars = array(
    'name' => 'Stephen King',
    'books' => array(
        'Pet Sematary', 'Christine', 'Needful Things'));
echo getView('authorization_form.twig', $vars);
