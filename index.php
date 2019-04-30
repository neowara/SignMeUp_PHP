<?php require 'global.php' ?>

<body>
    <section class="content">
    <h2>Log in</h2>
    <form action="index.php" method="POST">
        <label for="username">Username</label>
        <input type="text" placeholder="Username" name="username" required>
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" class="button" value="Log in">
    </form>
    <div class="navmenu">
        <h5>Not a user?</h5>
        <a href="register.php">Register your account here!</a>
    </div>
    </section>
</body>

<?php 


if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    foreach($userData as $data){
        $users[] = $data->username;
        $passwords[] = $data->password;
    }

    $listOfUsers = json_encode($users);
    $listOfUsersPass = json_encode($passwords);

    for ($i = 0; $i < count($users); $i++) {
        
        if($users[$i] == $username && password_verify($salt1 . $password . $salt2, $passwords[$i])) {
            echo '<p> You are now logged in!</p>';
            break;
        } else if (!in_array($username, $users)) {
            echo '<p> Username does not exist.</p>';
            break;
        }  else if ($passwords[$i] ==! password_verify($salt1 . $password . $salt2, $passwords[$i])) {
            echo '<p> Wrong password!</p>';
            break;
        }
    }

}


?>