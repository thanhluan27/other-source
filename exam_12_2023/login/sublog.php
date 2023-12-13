<?php
require "../db/config.php";
require "../models/db.php";
require "../models/user.php";

$user = new User;
$role_id = $user->getManagerByRole();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $role = $_POST['role'];
    // $role_id = $user->getManagerByRole();
    // $r = $_SESSION['user'][$role];

    if ($user->checkLogin($username, $password) && $user->getUserByRole($role) != 1) {
        $_SESSION['user'] = $username;
        header('location:../index.php');
        // header('location:../admin/index.php');
    } else if ($user->checkLogin($username, $password) && $user->getUserByRole($role) != 0) {
        $_SESSION['user'] = $username;
        // header('location:../index.php');
        header('location:../admin/index.php');
    } else if ($user->checkLogin($username, $password) == null) {
        header('location:login.php');
        // header('location:../error/404.php');
    }
}

// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     // $role_id = $_POST['role_id'];

//     if ($user->checkLogin($username, $password) && $_SESSION['user']!='admin') {
//         $_SESSION['user'] = $username;
//         header('location:../index.php');
//         // header('location:../admin/index.php');
//     } else if ($user->checkLogin($username, $password) && $_SESSION['user'] == 'admin') {
//         $_SESSION['user'] = $username;
//         // header('location:../index.php');
//         header('location:../admin/index.php');
//     } else if ($user->checkLogin($username, $password) == null) {
//         header('location:login.php');
//         // header('location:../error/404.php');
//     }
// }