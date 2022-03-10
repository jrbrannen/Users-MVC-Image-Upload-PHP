<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>News Articles</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>

        <h1> News Articles </h1>
        <a href="article-edit.php"><button>Add A New Article</button></a>
        <table>
            <thead>
                <tr>
                    <th scope="col">Article Title</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <?php foreach($dataList as $article){ ?>
            <tbody>
                <tr>
                    <td><?= $article['article_title'] ?></td>
                    <td><?= $article['article_author'] ?></td>
                    <td></td>
                    <td><a href="article-edit.php?article_id= <?= $article['article_id'] ?> ">Edit</a></td>
                    <td><a href="article-view.php?article_id= <?= $article['article_id'] ?> ">View</a></td>    
                </tr>
            </tbody>
            <?php } ?>
        </table>    
    
    </body>

</html>