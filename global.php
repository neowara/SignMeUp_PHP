<?php 

$salt1 = "qwerty69";
$salt2 = "420blaze1t";

function registerAccount($regUser, $regPass, $salt1, $salt2) {

    $getUserData = file_get_contents('user_data.json');
    $userData = json_decode($getUserData, true);


    $hashedPass = password_hash($salt1 . $regPass . $salt2, PASSWORD_BCRYPT);

    $userArray = array("username"=>$regUser, "password"=>$hashedPass);
    $userData[] = $userArray;
    $users = json_encode($userData);

    file_put_contents('user_data.json', $users);

}


?>