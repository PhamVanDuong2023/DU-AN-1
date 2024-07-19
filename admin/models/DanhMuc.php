<?php


class DanhMuc{
    public $conn;

    public function __construct(){
       $this -> conn = connect_DB();
    }


    public function insert(){
       $sql = "INSERT INTO `danh_muc`(`name_danhmuc`) VALUES ('name_danhmuc')";
       
       
       
    }


    public function __distruct(){
        $this -> conn =disconnect_DB();
     }
}