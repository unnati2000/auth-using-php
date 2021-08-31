<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
  
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php 
           ob_start();
          
          if(!isset($_SESSION["email"])){
            echo " <a class='button is-primary' href='./register.php'>
            <strong>Sign up</strong>
          </a>
          <a class='button is-light' href='./login.php'>
            Log in
          </a>";
      } else{
        echo " <a class='button is-primary' href='./logout.php'>
        <strong>Logout</strong>
      </a>";
      }

      ?>
         
        </div>
      </div>
    </div>
  </div>
</nav>
</body>
</html>