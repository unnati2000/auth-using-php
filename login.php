<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Login</title>
</head>
<body>

<?php 

    include "./db.php";
    $error = "";
    $emailErrorMsg = "";
    $passwordErrorMsg = "";
    
    ob_start();
    session_start();

    if(isset($_POST["submit"])){
       $email = mysqli_real_escape_string($connection, $_POST["email"]);
       $password = mysqli_real_escape_string($connection, $_POST["password"]);

        if($email == ""){
            $emailErrorMsg = "Please enter the email"; 
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErrorMsg = "Please enter a valid email";  
        }
        if($password == ""){
            $passwordErrorMsg = "Enter your password";
        }


        if($emailErrorMsg == "" && $passwordErrorMsg == ""){

            $password = md5($password);
             
            $query = "SELECT * FROM auth WHERE email = '$email' AND password='$password'";
            $find_user = mysqli_query($connection, $query);

            if(mysqli_num_rows($find_user) == 1){

            $_SESSION["email"] = $email;
            while($row = mysqli_fetch_assoc($find_user)){
                $_SESSION["username"] = $row["username"];
            }
            
            header("location:home.php");

            }else{
                $error = "Invalid credentials";
            }
           
            
           
        }
    }

?>
<?php include "./navbar.php" ?> 
    <form class="card m-3 p-3 m-5" action="./login.php" method="POST">
        <h1 class="title is-1 has-text-center">Login Here</h1>

        <?php if($error!="") echo " <div class='button is-danger is-light'>$error</div>" ?>
        <input class="input is-primary mt-2" name="email" type="email" placeholder="Email">
        <?php if($emailErrorMsg!="") echo "<p class='is-size-6 is-danger is-light has-text-danger'>$emailErrorMsg</p>" ?>
        
        <input class="input is-primary mt-2" name="password" type="password" placeholder="Password">
        <?php if($passwordErrorMsg!="") echo "<p class='is-size-6 is-danger is-light has-text-danger'>$passwordErrorMsg</p>" ?>

        <button class="button is-primary mt-2" type="submit" name="submit">Login</button>
        <p>Don't have an account? <a href="./register.php">Register here</a></p>
    </form>
   
</body>
</html>