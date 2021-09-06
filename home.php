<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"/>
    <title>Home</title>
</head>
<body>
    <?php

    ob_start();
    session_start();

    include_once "./db.php";


    if(!$_SESSION["email"]){
        header("Location: login.php");
    }
    ?>
     <?php include "./navbar.php" ?>

     <div class="hero is-primary p-4">

     <h1 class="title is-1">Hello, <?php echo $_SESSION["username"] ?></h1>
     </div>
   
    
</body>
</html>