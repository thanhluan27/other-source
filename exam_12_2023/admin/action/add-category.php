<?php
require "../../db/config.php";
require "../../models/db.php";
require "../../models/product.php";
require "../../models/user.php";
require "../../models/category.php";

$cate = new Category;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    //Goi phuong thuc them
    $cate->addCategory($name);
    //add thanh cong su dung header
    header('location:../category.php');
}
