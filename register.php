<?php require 'global.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 1</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
</head>
<body>
    <section class="content">
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="regUser">Username</label>
        <input type="text" placeholder="Username" name="regUser" required>
        <label for="regPass">Password</label>
        <input type="password" placeholder="Password" name="regPass" required>
        <input type="submit" class="button" value="Register">
    </form>
    <div class="navmenu">
        <h5>Already a user?</h5>
        <a href="index.php">Log in here!</a>
    </div>
    </section>
</body>

<?php 

    if(isset($_POST["regUser"]) && isset($_POST["regPass"])) {

            $regUser = $_POST["regUser"];
            $regPass = $_POST["regPass"];

        foreach($userData as $data){
            $users[] = $data->username;
        }

        $regUsers = json_encode($users);

        if(strpos($regUsers, $regUser) == false) {

            registerAccount($regUser, $regPass, $salt1, $salt2);          

            echo '<p> Registration complete! Please log in </p>';

        } else if (strpos($regUsers, $regUser) == true) {

            echo '<p> Username already taken, try a different one! </p>';

        }

    }


?>