<?php
require "../../db/config.php";
require "../../models/db.php";
require "../../models/product.php";
require "../../models/user.php";
require "../../models/category.php";

$product = new Product;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $feature = isset($_POST['feature']) ? 1 : 0;
    $id = $_POST['id'];
    //Goi phuong thuc them
    $product->updateProduct($name,$category_id,$price,$image,$description,$feature, $id);
    //Xu li upload
    $target_dir = "../../public/img/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    //add thanh cong su dung header
    header('location:../index.php');
}
