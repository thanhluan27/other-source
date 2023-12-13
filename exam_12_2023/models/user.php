<?php
class User extends Db
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE `username`=? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addregister($username, $password, $fullname, $email)
    {
        $sql = self::$connection->prepare("
    INSERT INTO `user`(`username`,`password`, `fullname`, `email`) 
    VALUES (?,?,?,?)");
        var_dump("INSERT INTO `user`(`username`,`password`, `fullname`, `email`) 
    VALUES ($username,$password, $fullname, $email)");
        $passwordd = md5($password);
        $sql->bind_param("ssss", $username, $passwordd, $fullname, $email);
        return $sql->execute();
    }

    public function getUserByRole($role_id)
    {
        $sql = self::$connection->prepare("SELECT `role` FROM user WHERE `role` = ?");
        $sql->bind_param("i", $role_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    // public function getUserByRole($role_id)
    // {
    //     $sql = self::$connection->prepare("SELECT * FROM `user` WHERE role_id = 0 OR 1");
    //     $sql->bind_param("i", $role_id);
    //     $sql->execute();
    //     $items = $sql->get_result()->num_rows;
    //     if ($items == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function getManagerByRole()
    {
        $sql = self::$connection->prepare("SELECT `role` FROM `user` WHERE `role` = 0");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an arrayay
    }

    public function getUsername($role_id)
    {
        $sql = self::$connection->prepare("SELECT username FROM user WHERE role_id = ?");
        $sql->bind_param("i", $role_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
