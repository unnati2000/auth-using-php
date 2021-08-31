<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    ob_start();
    session_start();

    include_once "./db.php";

   

    if(!$_SESSION["username"]){
        header("Location: login.php");
    }
    ?>
     <?php include "./navbar.php" ?>

    <h1 class="is-title-h1">Hello, <?php echo $_SESSION["username"] ?></h1>
    
</body>
</html>