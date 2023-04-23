<?php

include ('connect.php') ;


    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $req = $pdo->prepare("INSERT INTO user (email, name, password,role) VALUES (:email, :name, :password,:role)");

    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
    $req->bindValue(':role', $role, PDO::PARAM_STR);
    
    if($req->execute()){
        header('location:user-profile.php');
    };

?>