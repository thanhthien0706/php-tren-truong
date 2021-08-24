<!DOCTYPE html>
<html>
<head>
	<title>Nhập và tính toán trên dãy số</title>
	<meta charset="utf-8">
	<style>
	*{
    font-family: Tahoma;
	}
	table{
	    width: 400px;
	    margin: 100px auto;
	}
	table th{
	    background: #66CCFF;
	    padding: 10px;
	    font-size: 18px;
	}
	</style>
</head>
<body>

<?php

if(isset($_POST['nhap_mang'])){

	$array_number = explode(",", $_POST['nhap_mang']);

	$day_so = $_POST['nhap_mang'];
	$kq = 0;

	for($i = 0; $i < count($array_number) ; $i++){
		$kq += $array_number[$i];
	}

}

?>	

	<form method="POST" action="./php_index_6-01.php">
		<table>
			<thead>
				<tr>
					<th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nhập dãy số:</td>
					<td><input type="text" name="nhap_mang" value=" <?php echo isset($day_so) ? $day_so : ''; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btn_goi" value="Tổng dãy số" ></td>
				</tr>
				<tr>
					<td>Tổng dãy số:</td>
					<td><input type="text" name="ket_qua" disabled="disabled" value=" <?php echo isset($kq) ? $kq : ''; ?> " ></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>
