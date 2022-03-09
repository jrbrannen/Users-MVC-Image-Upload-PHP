<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Users | Home</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>

        <h1>User Login </h1>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($errorsArray['user_name'])) { ?>
                <div><?php echo $errorsArray['user_name']; ?></div>
            <?php } if (isset($errorsArray['password'])) { ?>
                <div><?php echo $errorsArray['password']; ?></div>
            <?php } if (isset($errorsArray['invalid'])) { ?>
                <div><?php echo $errorsArray['invalid']; ?></div>
            <?php } ?>
            <p>
                <label>User Name:</label>
                <input type="text" name="user_name" id="user_name" value="<?= isset($userName) ? $userName : '' ?>">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" id="password" value="">
            </p>
            <p>
                <input type="submit" name="Submit" value="Submit"/>
                <input type="submit" name="Cancel" value="Cancel"/> 
            </p>
                        
        </form> 

    </body>

</html>