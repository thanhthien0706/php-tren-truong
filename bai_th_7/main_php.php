<?php

require_once "./connection_db.php";
require_once "./xuLy_db.php";
require_once "./sua_thong_tin.php";

$kn_db = new connection_db();
$kn_db->connect();

if(isset($_POST['Them']) ){
    $xu_db = new xuLyThongTin($kn_db->getConn(), $_POST,$_FILES);
    $xu_db->guiTin();
    header('Location: view_hienThi.php');
}

if(isset($_POST['Sua'])){
    $sua_tt = new suaThongTin($kn_db->getConn(), $_POST,$_FILES);
    // $sua_tt->inthongtin();
    $sua_tt->guiSua();
    header('Location: view_hienThi.php');

}



?>