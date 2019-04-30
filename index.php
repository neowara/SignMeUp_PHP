<?php require 'login.php' ?>

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