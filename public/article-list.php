<?php

session_start();

require_once('../inc/User.class.php');
require_once('../inc/NewsArticles.class.php');

$userId = null;

if(isset($_SESSION['user_id'])) {
   $userId = $_SESSION['user_id'];
}

$user = new User();

if ($user->checkLogin($userId)){
    // create object to call getList() function
    $newsArticle = new NewsArticles();

    // get all articles and store in an array to display on the view
    $dataList = $newsArticle->getList();

    // include the view
    require_once('../tpl/article-list.tpl.php');
}else{
    $user->errors = "Invalid user";
    header('location: index.php');
    exit;
}

?>
