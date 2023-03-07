<?php

require_once __DIR__ . "/utilities.php";

if (!is_authenticated()) {
    header('Location: /login');
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>
        Hey, <?php print $_SESSION['username'] ?>
    </h2>
    <a href="/create">Create a quiz</a>
</body>

</html>