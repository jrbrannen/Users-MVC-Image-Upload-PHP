<?php

session_start();

require_once('../inc/User.class.php');

// create a user object
$user = new User();

// create a userId variable
$userId = null;

// check to see if a user_id is stored in the session array, if so assign it to user id var
if(isset($_SESSION['user_id'])) {
   $userId = $_SESSION['user_id'];
}

// function call to see if the user is logged in
if ($user->checkLogin($userId)){

    // get all users and store in an array to display on the view
    $userList = $user->getList();

    // include the view
    require_once('../tpl/user-list.tpl.php');
}else{
    header('location: index.php');
    exit;
}

?>
