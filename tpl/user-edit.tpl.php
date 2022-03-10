<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
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
            Password: <input type="password" name="password" value="" /><br>
            User Level: <select name="user_level">
                            <option value="">Select One</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select></br>
            First Name: <input type="text" name="user_first_name" value="<?php echo (isset($userArray['user_first_name']) ? $userArray['user_first_name'] : ''); ?>"/><br>
            Last Name: <input type="text" name="user_last_name" value="<?php echo (isset($userArray['user_last_name']) ? $userArray['user_last_name'] : ''); ?>"/><br>
            Upload file: <input type="file" name="upload_image"/><br>
            <input type="hidden" name="user_id" value="<?php echo (isset($userArray['user_id']) ? $userArray['user_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>