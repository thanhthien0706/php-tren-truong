<?php

include_once "./connectionSQL.php";

$serverName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'hocphp';

if(connectionSql($serverName, $userName, $password, $databaseName)==false){
    echo "Connection failed";
}else{
    $conn = connectionSql($serverName, $userName, $password, $databaseName);

    $sql = "SELECT * FROM member";
    $result = $conn->query($sql);

    $check = 0;

    if(isset($_POST['user']) && isset($_POST['pass'])){
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["user"] === $_POST["user"] && $row["pass"] === $_POST["pass"]){
                    echo "Đăng nhập thành công";
                    break;
                }else{
                    $check++;
                }
            }
            if($check == $result->num_rows){
                echo '<script type="text/javascript">
                        alert("Tài khoản hoặc matak khẩu không đúng");
                        window.location.assign("../dang-nhap-tieng-viet.html")
                    </script>';
            }
        }else {
            echo "0 results";
        }
    }
    $conn->close();

}

?>