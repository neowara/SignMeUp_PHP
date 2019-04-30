<?php require 'global.php' ?>

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

            $dataLocation = 'user_data.json';
            $getUserData = file_get_contents($dataLocation);
            $userData = json_decode($getUserData);

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