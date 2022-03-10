<?php

// connect to class
require_once('../inc/NewsArticles.class.php');

// create object
$newsArticle = new NewsArticles();

if (!$newsArticle->load($_GET['article_id'])){
    die("article not found");
}

$dataArray = $newsArticle->dataArray;

require_once('../tpl/article-view.tpl.php');

?>

