<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAllProductsAdmin()
    {
        $sql = self::$connection->prepare("SELECT * FROM products, category 
        WHERE products.category_id = category.category_id
        ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    public function get10NewsProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,category 
        WHERE products.category_id = category.category_id
        ORDER BY `id` DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    //////////////////////////***TOP SELLING PRODUCTS***//////////////////////////
    public function get4TopSellingProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,category 
        WHERE products.category_id = category.category_id
        ORDER BY `id` ASC LIMIT 0,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get5TopSellingProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,category 
        WHERE products.category_id = category.category_id
        ORDER BY `id` DESC LIMIT 0,5");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopSellingProducts1()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes 
        WHERE products.type_id = protypes.type_id
        ORDER BY `id` DESC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopSellingProducts2()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes 
        WHERE products.type_id = protypes.type_id
        ORDER BY `id` ASC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopSellingProducts3()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes 
        WHERE products.type_id = protypes.type_id
        ORDER BY `id` DESC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    /////////////////////////////////////////////////////////////////////////////

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products, category WHERE products.category_id = category.category_id ORDER BY id = ? DESC LIMIT 0,1");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByType($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products, category 
        WHERE products.category_id = category.category_id
        AND `description` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByManuId($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` AND `manufactures`.`manu_id`=?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get3ProductByManuId($manu_id, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products
        WHERE manu_id = ? LIMIT ?, ?");
        $sql->bind_param("iii", $manu_id, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function quickView($manu_id, $page, $perPage)
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_products WHERE id = " . $_GET["id"]);
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get4RelateProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,category 
        WHERE products.category_id = category.category_id
        ORDER BY `id` DESC LIMIT 0,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getRelateProducts($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products, manufactures, protypes WHERE products.manu_id = manufactures.manu_id AND products.type_id = protypes.type_id ORDER BY id = ? DESC LIMIT 0,4");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Billing address
    public function addBilling($first, $last, $email, $address, $city, $country, $zip, $tel)
    {
        $sql = self::$connection->prepare("INSERT INTO `billingaddress`(`first_name`, `last_name`, `email`, `address`, `city`, `country`, `zip_code`, `phone`) 
        VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssssii", $first, $last, $email, $address, $city, $country, $zip, $tel);
        return $sql->execute(); //return an array
    }
    /////////TEST
    public function getlist()
    {
        $sql = self::$connection->prepare("SELECT DISTINCT(protypes.type_name) 
        FROM products ,protypes 
        WHERE products.type_id = '1' 
        ORDER BY products.id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getbrand()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures` ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getType_id()
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    public function getSelectCheckBox($arr, $arr2)
    {
        // echo "SELECT * FROM  products  
        // WHERE manu_id IN (" . implode(",", $arr ). ")";
        $sql = self::$connection->prepare("SELECT * FROM  products  
        WHERE manu_id IN (" . implode(",", $arr) . ")");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array

    }

    public function getSelectCheckBox2($arr)
    {
        // echo "SELECT * FROM  products  
        // WHERE type_id IN (" . implode($arr). ")";
        $sql = self::$connection->prepare("SELECT * FROM  products  
        WHERE type_id IN (" . implode($arr) . ")");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array

    }


    //******************************* CRUD *******************************//
    public function addProduct($name, $category_id, $price, $image, $description, $feature)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `category_id`, `price`, `image`, `description`, `feature`) 
            VALUES (?,?,?,?,?,?)");
        $sql->bind_param("siissi", $name, $category_id, $price, $image, $description, $feature);
        return $sql->execute(); //return an array
    }
    //Xoa
    public function delProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    //Sua
    public function updateProduct($name, $category_id, $price, $image, $description, $feature, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
                SET `name`=?,`category_id`=?, `price`=?, `image`=? ,`description`=?, `feature`=? WHERE `id`=?");
            $sql->bind_param("siissii", $name, $category_id, $price, $image, $description, $feature, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
                SET `name`=?,`category_id`=?, `price`=?, `description`=?, `feature`=? WHERE `id`=?");
            $sql->bind_param("siisii", $name, $category_id, $price, $description, $feature, $id);
        }
        return $sql->execute(); //return an array
    }
}
