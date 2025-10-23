<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example;

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['temperature']) && isset($_POST['humidity']) && isset($_POST['sensorValue'])) {

        $temperature  = $_POST['temperature'];
        $humidity= $_POST['humidity'];
        $sensorValue= $_POST['sensorValue'];
    

        $sql = "INSERT INTO iot (temperature,humidity,sensorValue) VALUES('$temperature', '$humidity','$sensorValue')";
     
        if ($conn->query($sql) === TRUE) {
            echo "IOT data has inseted successfully";
        } else {
            echo "not inserted " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>