<?php
$servername = "localhost";
$username = "root"; // default user in XAMPP
$password = "";     // default password is empty
$dbname = "noel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form sends data via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['temperature']) && isset($_POST['humidity']) && isset($_POST['sensorvalue'])) {

        $temperature = $_POST['temperature'];
        $humidity    = $_POST['humidity'];
        $sensorvalue = $_POST['sensorvalue'];

        // Insert into database
        $sql = "INSERT INTO remy(temperature, humidity, sensorvalue) 
                VALUES ('$temperature', '$humidity', '$sensorvalue')";
        
        if ($conn->query($sql) === TRUE) {
            echo "✅ New sensor record created successfully";
        } else {
            echo "❌ Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Sensor Data</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <form method="POST" action="noel.php">
        Temperature: <input type="text" name="temperature"><br>
        Humidity: <input type="text" name="humidity"><br>
        Sensor Value: <input type="text" name="sensorvalue"><br>
        <button type="submit">Save Data</button>
    </form>
</body>
</html>