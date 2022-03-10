<html>
    <body>
        <?php if (isset($user->errors)) { 
                echo $user->errors;
        } ?>
        </br>
        <a href="../public/user-list.php"><button>Return to User List Page</button></a>           
    </body>
</html>