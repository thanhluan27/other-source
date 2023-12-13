<?php
class Category extends Db
{
    public function getAllCategory()
    {
        $sql = self::$connection->prepare("SELECT * FROM category");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getCate()
    {
        $sql = self::$connection->prepare("SELECT * FROM `category`,`products` WHERE `products`.`category_id` = `category`.`category_id` ORDER BY `products`.`id` DESC LIMIT 4");
        // $sql = self::$connection->prepare("SELECT * FROM `manufactures`,`products` WHERE `products`.`manu_id` = `manufactures`.`manu_id` ORDER BY `products`.`id` DESC LIMIT 4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getCateById($category_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `category` WHERE `category_id`=?");
        $sql->bind_param("i", $category_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addCategory($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `category`(`category_name`)
        VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute(); //return an array
    }
    public function delCategory($category_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `category` WHERE `category_id`=?");
        $sql->bind_param("i", $category_id);
        return $sql->execute(); //return an array
    }
    public function updateCategory($category_name, $category_id)
    {
        $sql = self::$connection->prepare("UPDATE `category` SET `category_name`=? WHERE `category_id`=?");
        $sql->bind_param("si", $category_name, $category_id);
        return $sql->execute(); //return an array
    }
}
