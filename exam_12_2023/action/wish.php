<?php
session_start();
if(isset($_GET['id'])):
    $id = $_GET['id'];
    if(isset($_SESSION['wish'][$id])):
        $_SESSION['wish'][$id]++;
    else:
        $_SESSION['wish'][$id] = 1;
    endif;
endif;
header('location:../index.php');