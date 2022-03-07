<?php
session_start();

require_once('../inc/User.class.php');

// create a user object
$user = new User();

// create a userId variable
$userId = null;

// check to see if a user_id is stored in the session array, if so assign it to user id var
if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}

if($user->checkLogin($userId)) {
    $userArray = array();
    $errorsArray = array();

    $requestArray = $user->sanitize($_REQUEST); // $_REQUEST is both $_GET and $_POST

    // checks to see if there is a user to load
    if (isset($requestArray['user_id']) && !empty($requestArray['user_id'])){
        $user->load($requestArray['user_id']);
        $userArray = $user->userArray;
    }

    // checks to see if the save button was pushed
    if (isset($requestArray["Save"])){
        
        // sanitize the data
        $requestArray = $user->sanitize($_REQUEST); // $_REQUEST is both $_GET and $_POST
        
        // pass new data to the instance
        // set data array to the object array property
        $user->set($requestArray);

        // validate the data
        if ($user->validate()){
            //save
            if ($user->save()){
                header("location: ../tpl/user-save-success.tpl.php"); // prevents double posting
                exit;   // ends server processing
            }else{
                
            }
        }else{
            //errors
            $errorsArray = $user->errors;
            $dataArray = $user->dataArray;
        }
    }
    // go back to user list view page
    if (isset($_POST['Cancel'])) {
        header("location: index.php");
        exit;
    }
    // include the view
    require_once('../tpl/user-edit.tpl.php');
}else{
    $user->errors = "Invalid User";
    header('location: index.php');
    exit;
}

?>
