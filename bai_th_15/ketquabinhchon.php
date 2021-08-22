<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bình chọn</title>
</head>
<body>
<table width="450" border="1" cellpadding="4">
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
                $sql="select * from binhchon where idBC=1";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $mota = $row['MoTa'];
                }
                $sql1="select sum(SoLanChon) as tongsolanchon from phuongan where idBC=1";
                $result1 = $conn->query($sql1);
                while($row = $result1->fetch_assoc()) {
                    $tongsobinhchon=$row["tongsolanchon"];
                }
                ?>
            <tr>
                <td colspan="3" bgcolor="#66CCFF" align="center"><?php echo $mota; ?></td>
            </tr>
            <?php
                $sql2="select * from phuongan where idBC=1";
                $result2 = $conn->query($sql2);
                while($row = $result2->fetch_assoc()) {
                    $rong=($row["SoLanChon"]/$tongsobinhchon)*150;
                    $phantram=($row["SoLanChon"]/$tongsobinhchon)*100;
                
            ?>
            <tr>
                <td width="150"><?php echo $row["Mota"]; ?></td>
                <td width="150">
                    <table width="150">
                        <tr>
                            <td width="<?php echo $rong; ?>" bgcolor="#FF0000"></td>
                            <td><?php echo round($phantram,2); ?>%</td>
                        </tr>
                    </table>
                </td>
                <td width="150">So lan chon: <?php echo $row["SoLanChon"]; ?></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" align="right">Tong so lan chon: <?php echo $tongsobinhchon; ?></td>
            </tr>
        </table>

</body>
</html>