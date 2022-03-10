<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>News Article | View</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>
        <h1>Article</h1>
        <h3><?= $dataArray['article_title']?></h3>
        <h5><?= $dataArray['article_author']?></h5>
        <p><?= $dataArray['article_date']?></p>
        <p><?= $dataArray['article_content']?></p>
        <a href="article-list.php"><button>Return To List</button></a>
    </body>

</html>