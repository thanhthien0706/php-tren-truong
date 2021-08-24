<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị</title>
</head>
<body>
    
<?php

require_once "./connection_db.php";

$kn_db = new connection_db();
$kn_db->connect();

$conn = $kn_db->getConn();

?>


    <table align="center" border="1" width="600">
    	<tr align="center">
        	<td>Ten The Loai</td>
            <td>Thu Tu</td>
            <td>An Hien</td>
            <td>Bieu tuong</td>
            <td colspan="2"><a href="./add_tintuc.php">Them</a></td>
        </tr>

        <?php
        
            $sql = "SELECT * FROM `theloai`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr align="center">
        	<td>
                <?php echo $row['TenTL'] ?>
            </td>
            <td>
                <?php echo $row['ThuTu'] ?>
            </td>
            <td>
                <?php
                    if($row['AnHien'] == 1){
                        echo "Hiện";
                    }

                    if($row['AnHien'] == 0){
                        echo "Ẩn";
                    }
                ?>
            </td>
            <td><img src="<?php echo $row['icon'] ?>" width="40" height="40" /></td>
            <td>
            	<a href="./add_tintuc.php?idSua=<?php echo $row['idTL']; ?>" name >Sua</a>
            </td>
            <td>
            	<a href="./xoa_tin.php?id=<?php echo $row['idTL']; ?>" onclick="return confirm('Ban co chac chan khong?');">xoa</a>
            </td>
        </tr>

        <?php
                }
            } else {
                echo "0 results";
            }
        ?>

    </table>

    <?php
        $kn_db->disconnect();
    ?>

</body>
</html>