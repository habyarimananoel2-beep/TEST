<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "le_15092025";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['location'])) {

        $name= $_POST['name'];
        $email= $_POST['email'];
        $phonenumber= $_POST['phonenumber'];
        $location= $_POST['location'];

        $sql = " INSERT INTO tasks (name,email,phonenumber,location) VALUES ('$name','$email','$phonenumber','$location')";
     
        if ($conn->query($sql) === TRUE) {
            echo "data has inseted successfully";
        } else {
            echo "not inserted " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>