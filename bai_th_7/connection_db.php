<?php

    class connection_db{

        private $conn;

        // hàm kết nối
        function connect(){
            // kiếm tra kết nối
            if(!$this->conn){
                $this->conn = mysqli_connect("localhost","root","","tintuc");
                if(!$this->conn) {
                    die("Failed to connect:" .mysqli_connect_errno());
                }
            }
        }

        // Conn
        public function getConn(){
            return $this->conn;
        }

        // ngắt kết nối
        function disconnect(){
            if($this->conn){
                mysqli_close($this->conn);
            }
        }

    }
?>