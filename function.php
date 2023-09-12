<?php

function dbconnect(){
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=security_demo', 'root', "");
        return $dbh;
    } catch (PDOException $e) {
        // tenter de réessayer la connexion après un certain délai, par exemple
        echo 'une erreur est survenue';
    }
}


function login($email, $password){
    $connect = dbconnect();
    $stmt = $connect->prepare("SELECT * FROM users WHERE users.email = :toto");
    $stmt->bindParam(':toto',$email, PDO::PARAM_STR);
    $stmt ->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    if(!$user){
        echo "mauvais mot de passe ou nom d'utilisateur";
        
        }else{
            if(password_verify($password,$user['password'])){
                echo 'utilisateur connecte';
                
        }else{
            echo "mauvais mot de passe ou nom d'utilisateur ";
        }
    }

}


function singIn($email, $password) {
    $connect = dbconnect();
    $stmt=$connect->prepare("SELECT COUNT(*) FROM users WHERE email= :toto");
    $stmt->bindParam(':toto',$email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count > 0){
        echo "adresse mail deja utilisee";

    }else{
        $stmt = $connect->prepare("INSERT INTO users (email, password) VALUES (:GG, :NOOB)");
        $stmt->bindParam(':GG', $email, );
        $stmt->bindParam(':NOOB', $password, );
        $stmt->execute();
        echo "utilisateur enregistré";
    }
}

function secureEmail($email){
    $sanitize = filter_var($email,FILTER_SANITIZE_EMAIL);
    $validate = filter_var($sanitize, FILTER_VALIDATE_EMAIL);
    if($validate){
        return $validate;
    }
}