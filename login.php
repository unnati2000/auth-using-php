<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Register</title>
</head>
<body>
<?php include "./navbar.php" ?> 
    <form class="card m-3 p-3 m-5">
        <h1 class="title is-1 has-text-center">Login Here</h1>
        <input class="input is-primary mt-2" type="email" placeholder="Email">
        <input class="input is-primary mt-2" type="password" placeholder="Password">
        <button class="button is-primary mt-2">Login</button>
        <p>Don't have an account? <a href="./register.php">Register here</a></p>
    </form>
   
</body>
</html>