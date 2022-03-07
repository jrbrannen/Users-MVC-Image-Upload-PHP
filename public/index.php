<?php
    
    require_once('../inc/User.class.php');
    // create a user object
    $user = new User();
    // create an user array  
    // $userArray = array();
    // create an error array
    $errorsArray = array();
    // TO DO sanatize
    $requestArray = $user->sanitize($_REQUEST);
        
    if(isset($_POST['Submit'])) {    
        //validate the username and password
        $userName = $requestArray['user_name']; 
        $password = $requestArray['password'];

        // set the request array to the user object
        $user->set($requestArray);

        if($user->validate()) {
            //verify the user is in the db
            if($user->verifyUser($userName, $password)) {
                // start a session and store the user id in the $_SESSION array
                session_start();
                $_SESSION['user_id'] = $user->userArray['user_id'];
                // redirect to article list 
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
