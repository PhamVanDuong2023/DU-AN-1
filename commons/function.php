<?php



function connect_DB()
{
    $host = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port =$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
        // Cài đặt chế độ báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        debug("Connection failed: " . $e->getMessage());
    }
}

// lất all
// if (!function_exists('getAll')) {
//     function getAll($sql)
//     {
//         try {
//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->execute();
//             return $stmt->FetchAll();
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }
// // lấy 1 
// if (!function_exists('showOne')) {
//     function showOne($sql, $id)
//     {
//         try {
//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->bindParam(":id", $id);
//             $stmt->execute();
//             return $stmt->Fetch();
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }
// // update , edit , insert
// if (!function_exists('ko_tra_ve')) {
//     function ko_tra_ve($sql)
//     {
//         try {
//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->execute();
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }




function disconnect_DB()
{
    $conn = null;
}



