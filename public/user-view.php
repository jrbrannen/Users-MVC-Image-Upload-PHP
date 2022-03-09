<?php

// connect to user class
require_once('../inc/User.class.php');

// create object
$user = new User();

if (!$user->load($_GET['user_id'])){
    die("User not found");
}

$userArray = $user->userArray;

require_once('../tpl/user-view.tpl.php');

?>