<?php ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bai_th_15";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$idPA=$_GET["idPA"];
$qr1="update binhchon set SoLanChon = SoLanChon+1 where idBC=1";
$qr="update phuongan set SoLanChon = SoLanChon+1 where idBC=1 and idPA=$idPA";

if($conn->query($qr1) === TRUE && $conn->query($qr) === TRUE)
header('location:ketquabinhchon.php');
// echo "Thành Công Bình chọn";
else echo "That bai!";
?>
