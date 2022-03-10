<?php
    
    require_once('../inc/User.class.php');
    // create a user object
    $user = new User();

    // create an error array
    $errorsArray = array();

    // sanatize input
    $requestArray = $user->sanitize($_REQUEST);
        
    if(isset($_POST['Submit'])) {    
        //validate the username and password
        $userName = $requestArray['user_name']; 
        $password = $requestArray['password'];
        $password = $user->passTheSalt($password);
        // set the request array to the user object
        $user->set($requestArray);

        if($user->validate()) {
            //verify the user is in the db
            if($user->verifyUser($userName, $password)) {
                // start a session and store the user id in the $_SESSION array
                session_start();
                $_SESSION['user_id'] = $user->userArray['user_id'];
                // store the user level in the $_SESSION array
                $_SESSION['user_level'] = $user->userArray['user_level'];
                // redirect to user list
                header("location: user-list.php");
                exit;
            }else{
                $errorsArray = $user->errors;
            } 
        }else{
           $errorsArray = $user->errors; 
        }
    }
    require_once('../tpl/index.tpl.php');
?>
