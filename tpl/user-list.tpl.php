<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>User List</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>

        <h1>Users</h1>
        <a href="user-edit.php"><button>Add A New User</button></a>
        <table>
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">User Level</th>
                </tr>
            </thead>
            <?php foreach($userList as $user){ ?>
            <tbody>
                <tr>
                    <td><?= $user['user_name'] ?></td>
                    <td><?= $user['user_level'] ?></td>
                    <td></td>
                    <td><a href="user-edit.php?user_id= <?= $user['user_id'] ?> ">Edit</a></td>
                    <td><a href="user-view.php?user_id= <?= $user['user_id'] ?> ">View</a></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>    
    
    </body>

</html>