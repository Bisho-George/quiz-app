<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <p>
        <?php 
            require_once "utilities.php";

            key_exists('error', $_GET) ? print $error_messsages[$_GET['error']] : print '';
        ?>
    </p>
    <form action="routes/auth/register.php" method="post">
        <input required type="text" placeholder="username" name="username" value="<?php
            key_exists('username', $_GET) ? print $_GET['username'] : print '';
        ?>">
        <input required type="email" placeholder="email"name="email" value="<?php 
            key_exists('email', $_GET) ? print $_GET['email'] : print '';
        ?>">
        <input required type="password" placeholder="password" name="password">
        <button type="submit">register</button>
    </form>
    <a href="login.php">already have an account? click here to login.</a>
</body>

</html>