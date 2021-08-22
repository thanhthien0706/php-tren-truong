<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thực hành form đăng nhập</title>
    <link rel="stylesheet" href="./css__form.css">
</head>
<body>
    
<?php
$serverName = 'localhost:3309';
$userName = 'root';
$password = '';
$databaseName = 'hocphp';

// tạo kết nối với msql
$conn = new mysqli($serverName, $userName, $password,$databaseName);
// kiểm tra kết nối
if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}
$sql = "SELECT user , pass FROM member";
$reusult = $conn->query($sql);
$check = 0;
if(isset($_POST['login']) && isset($_POST['password'])){
    if ($reusult->num_rows > 0) {
        // output data of each row
        while($row = $reusult->fetch_assoc()) {
            if($row["user"] === $_POST["login"] && $row["pass"] === $_POST["password"]){
                echo "Đăng nhập thành công";
                break;
            }else{
                $check++;
            }
        }
        if($check == $reusult->num_rows){
            echo 'tài khoản hoặc mật khẩu không đúng';
        }
    }else {
        echo "0 results";
    }
}
$conn->close();

?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Sign In </h2>
            <h2 class="inactive underlineHover">Sign Up </h2>
            <!-- Login Form -->
            
            <form method="post" action="index_From__php.php">
              <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
              <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
              <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
                
        </div>
    </div>
</body>
</html>