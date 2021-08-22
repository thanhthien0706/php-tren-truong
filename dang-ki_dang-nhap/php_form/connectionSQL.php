<?php

function connectionSql($serverName,$userName,$password,$databaseName){
    // tạo kết nối với msql
    $conn = new mysqli($serverName, $userName, $password,$databaseName);
    // kiểm tra kết nối
    if($conn->connect_errno){
        return false;
    }

    return $conn;
}

?>