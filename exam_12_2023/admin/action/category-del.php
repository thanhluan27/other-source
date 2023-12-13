<?php
require "../../db/config.php";
require "../../models/db.php";
require "../../models/product.php";
require "../../models/user.php";
require "../../models/category.php";

$cate = new Category;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    //Goi phuong thuc xoa
    $cate->delCategory($category_id);
    header('location:../category.php');
}
