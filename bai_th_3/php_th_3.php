<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xuất số thành chữ</title>
</head>

<body>

<?php

if(isset($_POST['so'])){

    if(is_numeric($_POST['so'])){

        switch($_POST['so']){
            case 0:
                $string = 'Không';
                break;
            case 1:
                $string = 'Một';
                break;
            case 2:
                $string = 'Hai';
                break;
            case 3:
                $string = 'Ba';
                break;
            case 4:
                $string = 'Bốn';
                break;
            case 5:
                $string = 'Năm';
                break;
            case 6:
                $string = 'Sáu';
                break;
            case 7:
                $string = 'Bảy';
                break;
            case 8:
                $string = '8';
                break;
            case 9:
                $string = 'Chín';
                break;
            default:
                $string ="Không hợp lệ";
                break;

        }

    }
}

?>

<form action="./php_th_3.php" method="POST" >
    <table width="519" border="1">
        <tr>
            <td colspan="3">Đọc số</td>
        </tr>
        <tr>
            <td>Nhập số (0-9)</td>
            <td width="69" rowspan="2">
                <input type="submit" name="button" id="button" value="Submit" />
            </td>
            <td> Bằng chữ</td>
        </tr>
        <tr>
            <td width="177">
                <p>
                    <label for="textfield"></label>
                    <input type="text" name="so" id="textfield" />
                </p>
            </td>
            <td width="232">
                <label for="textfield2"></label>
                <input type="text" name="chu" id="textfield2" readonly value="<?php echo isset($string) ? $string : '' ?>"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
