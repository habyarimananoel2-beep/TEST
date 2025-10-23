<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['location'])) {

        $name  = $_POST['name'];
        $email = $_POST['email'];
        $number= $_POST['number'];
        $location =$_POST['location'];

        $sql = "INSERT INTO users (name,email,number,location) VALUES('$name', '$email','$number','$location')";
        
        if ($conn->query($sql) === TRUE) {
            echo "User $name has inseted successfully";
        } else {
            echo "not inserted " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>