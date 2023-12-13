<?php
require "../db/config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $check = $_POST['check'];
    if($password == $check){
        $user->addregister($username, $password, $fullname, $email);
       header('location:../index.php');
    }
}