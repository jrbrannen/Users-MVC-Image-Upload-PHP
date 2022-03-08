<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($errorsArray['user_name'])) { ?>
                <div><?php echo $errorsArray['user_name']; ?></div>
            <?php }elseif (isset($errorsArray['password'])) { ?>
                <div><?= $errorsArray['password']; ?></div>
            <?php }elseif (isset($errorsArray['user_level'])) { ?>
                <div><?= $errorsArray['user_level']; ?></div>
            <?php }elseif (isset($errorsArray['user_first_name'])) { ?>
                <div><?= $errorsArray['user_first_name']; ?></div>
            <?php }elseif (isset($errorsArray['user_last_name'])) { ?>
                <div><?= $errorsArray['user_last_name']; ?></div>
            <?php } ?>

            User Name: <input type="text" name="user_name" value="<?php echo (isset($userArray['user_name']) ? $userArray['user_name'] : ''); ?>"/><br>
            Password: <input type="password" name="password" value="<?php /* echo (isset($userArray['password']) ? $userArray['password'] : '');*/ ?>" /><br>
            User Level: <input type="text" name="user_level" value="<?php echo (isset($userArray['user_level']) ? $userArray['user_level'] : ''); ?>"/><br>
            First Name: <input type="text" name="user_first_name" value="<?php echo (isset($userArray['user_first_name']) ? $userArray['user_first_name'] : ''); ?>"/><br>
            Last Name: <input type="text" name="user_last_name" value="<?php echo (isset($userArray['user_last_name']) ? $userArray['user_last_name'] : ''); ?>"/><br>
            <input type="hidden" name="user_id" value="<?php echo (isset($userArray['user_id']) ? $userArray['user_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>