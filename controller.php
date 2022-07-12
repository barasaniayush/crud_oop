<?php
    class Crud {
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'functional_crud';
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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO `crud`(name, email, address, phone, gender) VALUES ('$name', '$email', '$address', '$phone', '$gender')";
            $result = $this->conn->query($sql);
            if($result) {
                header('location:index.php');
            } else {
                echo "Error".$sql."<br>".$this->conn->error;
            }
        }

        public function displayRecord() {
            $sql = "SELECT * FROM `crud`";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function displayRecordById($updateid) {
            $sql = "SELECT * FROM `crud` WHERE id='$updateid'";
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

            $sql = "UPDATE `crud` SET name='$name', email='$email', address='$address', phone='$phone', gender='$gender' WHERE id='$editid'";
            $result = $this->conn->query($sql);
            if($result) {
                header('location:index.php');
            } else {
                echo "Error".$sql."<br>".$this->conn->error;
            }
        }

        public function deleteRecord($deleteid) {
            $sql = "DELETE FROM `crud` WHERE id='$deleteid'";
            $result = $this->conn->query($sql);
            if($result) {
                header('location:index.php');
            } else {
                echo "Error".$sql."<br>".$this->conn->error;
            }
        }
    }
?>