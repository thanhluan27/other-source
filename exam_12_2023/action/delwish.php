<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['wish'][$id]);  
}
else{
    unset($_SESSION['wish']);
}
header('location:../index.php');