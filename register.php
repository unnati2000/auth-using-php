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

    <?php
    
        include "./db.php";
        $error = "";
        $emailErrorMsg = "";
        $usernameErrorMsg = "";
        $passwordErrorMsg = "";
        $confirmPasswordErrorMsg = "";

        ob_start();
        session_start();

        if(isset($_POST["email"])){
            header("Location: home.php");
        }

        // on submit
        if(isset($_POST["submit"])){

        // username
           $username = mysqli_real_escape_string($connection, $_POST["username"]);
           if($username === ""){
               $usernameErrorMsg = "Please enter your username";
           }

        //  email
           $email = mysqli_real_escape_string($connection, $_POST["email"]);
           if($email === ""){
               $emailErrorMsg = "Please enter the email";
           }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErrorMsg = "Please enter a valid email";
                }
           }

        // password
           
           $password = mysqli_real_escape_string($connection, $_POST["password"]);
           $confirmPassword = mysqli_real_escape_string($connection, $_POST["confirm-password"]);

           if($password === ""){
               $passwordErrorMsg = "Enter your password";
           }
           if($confirmPassword === ""){
               $confirmPasswordErrorMsg = "Enter confirm password";
           }

           if(strlen($password) < 6){
               $passwordErrorMsg = "Enter a password greater than 6 characters";
           }

           if($password!==$confirmPassword){
               $confirmPasswordErrorMsg = "Password and Confirm Password field should be same";
           }

           $query = "SELECT * FROM auth WHERE email = '$email'";
           $findUser = mysqli_query($connection, $query);
           $resultantUser = mysqli_fetch_assoc($findUser);

           if($user){
                $error = "User already exists";
           }

           $query = "INSERT INTO auth (username, email, password) VALUES('$username', '$email', '$password')";
           $insertUser = mysqli_query($connection, $query);

           $_SESSION['username'] = $username;
           header("location: home.php");


        }



    
    ?>


    <?php include "./navbar.php" ?> 
    <form class="card m-3 p-3 m-5" action="./home.php" method="POST">
        <h1 class="title is-1 has-text-center">Register Here</h1>
        <input class="input is-primary mt-2" type="text" name="username" placeholder="Username">
        <input class="input is-primary mt-2" type="email" name="email" placeholder="Email">
        <input class="input is-primary mt-2" type="password" name="password" placeholder="Password">
        <input class="input is-primary mt-2" type="password" name="confirm-password" placeholder="Confirm Password">
        <button type="submit" class="button is-primary mt-2">Register</button>
        <p class="mt-2 text-center">Already have an account ? <a href="./login.php">Login</a></p> 

    </form>

</body>
</html>