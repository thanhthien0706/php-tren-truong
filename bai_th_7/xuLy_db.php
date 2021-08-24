<?php

    class xuLyThongTin{
        private $conn;
        private $arrayPost;
        private $arrayFiles;

        public function __construct($conn, $arrayPost, $arrayFiles) {
            
            $this->conn = $conn;
            $this->arrayPost = $arrayPost;
            $this->arrayFiles = $arrayFiles;

        }

        public function guiTin(){
            if(isset($this->arrayFiles['image']['name'])){

                if($this->arrayFiles['image']['type'] == "image/jpeg" || 
                $this->arrayFiles['image']['type'] == 
                "image/png" || $this->arrayFiles['image']['type'] == "image/gif"){
                    
                    // up load ảnh
                    $path = "./img/";
                    $tmpImg = $this->arrayFiles['image']['tmp_name'];
                    $nameFile = $this->arrayFiles['image']['name'];

                    // upLoad ảnh vào thư mục
                    move_uploaded_file($tmpImg, $path.$nameFile);

                    $img_url = $path.$nameFile;

                    // các biến còn lại
                    $theLoai = $this->arrayPost['TenTL'];
                    $ThuTu = $this->arrayPost['ThuTu'];
                    $AnHien = $this->arrayPost['AnHien'];

                    $sql = "INSERT INTO `theloai` (`idTL`, `TenTL`, `ThuTu`, `AnHien`, `icon`) VALUES (NULL, '$theLoai', '$ThuTu', '$AnHien', '$img_url');";
                    mysqli_query($this->conn, $sql);
                    // if(mysqli_query($this->conn, $sql)){
                    //     echo 'thêm thành công';
                    // }else{
                    //     echo "thêm thất bại";
                    // }
                }
            }
        }

        public function inthongtin(){
            echo "<pre>";
            print_r($this->conn);
            echo "</pre>";

            echo "<pre>";
            print_r($this->arrayPost);
            echo "</pre>";

            echo "<pre>";
            print_r($this->arrayFiles);
            echo "</pre>";
        }

    }

?>