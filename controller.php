<?php
    class Student {
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'user';
        private $conn;

        function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if($this->conn->connect_error) {
                echo "Connection failed";
                return false;
            } else {
                return $this->conn;
            }
        }

        public function insertRecord() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];

    
                if (!preg_match ("/^[a-zA-z]*$/", $name)) {
                    echo "Only alphabets allowed";
                } 
            
                if (!preg_match ("/^[0-9]*$/", $phone)) {
                    echo "Only number allowed";
                }
            
                if (!preg_match ("/^[a-zA-z]*$/", $address)) {
                    echo "Only address allowed";
                } 
                else {
                    $sql = "INSERT INTO `student`(name, email, address, phone, gender) VALUES ('$name', '$email', '$address', '$phone', '$gender')";
                    $result = $this->conn->query($sql);
                    if($result) {
                        header('location:index.php');
                    } else {
                        echo "Error".$sql."<br>".$this->conn->error;
                    }
                }
            }
        }

        public function displayRecord() {
            $sql = "SELECT * FROM `student`";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function displayRecordById($updateid) {
            $sql = "SELECT * FROM `student` WHERE id='$updateid'";
            $result = $this->conn->query($sql);
            if($result->num_rows==1) {
                $row = $result->fetch_assoc();
                return $row;
            }
        }

        public function updateRecord($id) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $editid = $_POST['hid'];

            $sql = "UPDATE `student` SET name='$name', email='$email', address='$address', phone='$phone', gender='$gender' WHERE id='$editid'";
            $result = $this->conn->query($sql);
            if($result) {
                header('location:index.php');
            } else {
                echo "Error".$sql."<br>".$this->conn->error;
            }
        }

        public function deleteRecord($deleteid) {
            $sql = "DELETE FROM `student` WHERE id='$deleteid'";
            $result = $this->conn->query($sql);
            if($result) {
                header('location:index.php');
            } else {
                echo "Error".$sql."<br>".$this->conn->error;
            }
        }
    }
?>