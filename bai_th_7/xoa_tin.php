<?php

require_once "./connection_db.php";
$kn = new connection_db();
$kn->connect();
$conn = $kn->getConn();

if(isset($_GET['id'])){
    // sql to delete a record
    $sql = "DELETE FROM theloai WHERE idTL=".$_GET['id'];

    if (mysqli_query($conn, $sql)) {
      header("Location: view_hienThi.php");
    }
}

?>