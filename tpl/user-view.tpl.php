<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Users | View</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>
        <h1>View User</h1>
        <h3>User Name: <?= $userArray['user_name']?></h3>
        <h5>User Level  <?= $userArray['user_level']?></h5>
        <p>First Name: <?= $userArray['user_first_name']?></p>
        <p>Last Name: <?= $userArray['user_last_name']?></p>
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userArray['user_id'] . "_user.jpg")) { ?>
            <img src="images/<?php echo $userArray['user_id'] . "_user.jpg"; ?>"/>
        <?php } ?>
        <a href="user-list.php"><button>Return To User List</button></a>
    </body>

</html>