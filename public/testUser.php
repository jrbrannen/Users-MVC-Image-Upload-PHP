<?php

require_once('../inc/User.class.php');

$test = new User();

// $test->set(array(
//     "userName" => "wdv441",
//     "password" => "wdv441"
// ));



var_dump($test->verifyUser("wdv441", "wdv441"));
var_dump($test->userArray);


?>
