<?php
require_once 'function.php';

if(isset($_POST) && !empty($_POST)){
    if($_POST['password_confirm']=== $_POST['password']){
      $email = secureEmail($_POST['email']) ;
      if($email){
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_ARGON2I);
        singIn($email, $password);
      }else{
        echo "adresse mail non valide";
      }
    }else{
      echo 'le mot de passe ne correspond pas';
    }
    
    //var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="container">
  <h1 class="text-center">Inscription</h1>
  <a href="index.php">connection</a>
<form action="newuser.php" method="POST" >
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name='email' placeholder="name@example.com" required>
  </div>
  <label for="inputPassword5" class="form-label">Password</label>
  <input type="password" id="inputPassword5" class="form-control"name="password" aria-describedby="passwordHelpBlock" required>
  <div id="passwordHelpBlock" class="form-text">
    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
  </div>
  <label for="inputPassword5" class="form-label">Confirm password</label>
  <input type="password" id="inputPassword5" class="form-control"name="password_confirm" aria-describedby="passwordHelpBlock" required>
  <input type="submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>