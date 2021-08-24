<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức</title>
</head>
<body>


<?php

require_once "./connection_db.php";

$kn_db = new connection_db();
$kn_db->connect();

$conn = $kn_db->getConn();

if(isset($_GET['idSua'])){

    $sql = "SELECT * FROM theloai where idTL=". $_GET['idSua'];

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $idTL = $row['idTL'];
        $TenTL =  $row['TenTL'];
        $ThuTu = $row['ThuTu'];
        $AnHien = $row['AnHien'];
        $icon = $row['icon'];
      }
    } else {
      echo "0 results";
    }
}

?>
    <form action="./main_php.php" method="post" enctype="multipart/form-data" name="form1">
    	<table align="left"  width="400">
            <tr>
            	<td align="right">
            	Ten The Loai
                </td>
                <td>
                	<input type="text" name="TenTL" value="<?php  echo isset($TenTL) ? $TenTL :'' ?>" />
                </td>
            </tr>
            <tr>
            	<td align="right">
            	Thu Tu
                </td>
                <td>
                	<input type="text" name="ThuTu" value="<?php  echo isset($ThuTu) ? $ThuTu :'' ?>" />
                </td>
            </tr>
            <tr>
            	<td align="right">
                	An Hien
                </td>
                <td>
                	<select name="AnHien">
                	<option value="0" <?php if( isset($AnHien) && $AnHien == 0) echo 'selected' ?>>An</option>
                	<option value="1" <?php if(isset($AnHien) && $AnHien == 1) echo 'selected' ?>>Hien</option>
                	</select>
                </td>
            </tr>
            <tr>
              <td align="right">icon</td>
              <td>
                <img src="<?php echo $icon ?>" width="40" height="40" />
                <input type="file" name="image" id="anh" />

                </td>
            </tr>
            <tr>
            	<td align="right">
            		<?php
                        if(isset($_GET['idSua'])){
                    ?>
                        <input type="hidden" name="idTL" value="<?php echo $idTL ?>">
                        <input type="submit" name="Sua" value="Sua" />
                    <?php }else if(!isset($_GET['idSua'])) { ?>
                        <input type="submit" name="Them" value="Them" /> 
                    <?php } ?>
            </td>
            <td>
            	<input type="reset" name="Huy" value="Huy" />
            </td>
            </tr>
        </table>
    </form>

</body>
</html>