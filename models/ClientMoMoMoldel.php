<?php
class ClientMoMoModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connect_DB();
    }
    public function insertMoMo($transId,$resultCode,$amount) {

        try{

        $sql = "INSERT INTO `momo`(`transId`, `resultCode`, `amount`) VALUES ('$transId','$resultCode','$amount')";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

    } catch (Exception $e) {
        echo 'Lỗi' . $e->getMessage();
    }
    }
}
?>