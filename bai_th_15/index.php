<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
</head>
<body>

    <p>BÌNH CHỌN</p>
    <div id="binhchon">
        <form id="form1" name="form1" method="get" action="./xulybinhchon.php">
            Bạn nghĩ học VKU có giúp bạn học tập tốt hơn không
            <p>
                <?php
                
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

                    $sql = "SELECT * FROM phuongan where idBC=1 ";
                    $result = $conn->query($sql);

                    // if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) 
                      {
                    
                    // } else {
                    //   echo "0 results";
                    // }
                    // $conn->close();

                ?>

                <label for="">
                    <input type="radio" value="<?php echo $row['idPA'] ?>" name="idPA"> <?php echo $row['Mota'];?><br /><?php }?></p>
                </label>
            <p>
                <label>
                    <input id="button" type="submit" value="Xem kết quả" name="Submit" />
                </label>
            </p>
        </form>
    </div>

</body>
</html>