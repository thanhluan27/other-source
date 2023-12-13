<?php
require "../../db/config.php";
require "../../models/db.php";
require "../../models/product.php";
require "../../models/user.php";
require "../../models/category.php";

$cate = new Category;

if (isset($_POST['category_name'])) {
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];
    //Goi phuong thuc them
    $cate->updateCategory($category_name,$category_id);
    header('location:../category.php');
}
