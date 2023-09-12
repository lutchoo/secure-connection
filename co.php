<?php
require_once 'function.php';

if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST["password"];
    login($email, $password);
    //var_dump($_POST);
}
?>