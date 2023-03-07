<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <p>
        <?php
        require_once __DIR__ . "/utilities.php";

        key_exists('error', $_GET) ? print $error_messsages[$_GET['error']] : print '';
        ?>
    </p>
    <form action="/routes/auth/login.php" method="post">
        <input required type="text" placeholder="username" name="username" value="<?php
            key_exists('username', $_GET) ? print $_GET['username'] : print '';
        ?>">
        <input required type="password" placeholder="password" name="password">
        <button type="submit">login</button>
    </form>
    <a href="/register">don't have an account? click here to register.</a>
</body>

</html>