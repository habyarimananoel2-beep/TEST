<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "noel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch sensor data
$sql    = "SELECT id, temperature, humidity, sensorvalue FROM remy ORDER BY id DESC";
$result = $conn->query($sql);

$sensor_data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sensor_data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sensor Data Records</title>
</head>
<body>
    <h2>📊 List of Sensor Data</h2>

    <?php if (count($sensor_data) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Temperature (°C)</th>
                <th>Humidity (%)</th>
                <th>Sensor Value</th>
                
            </tr>
            <?php foreach ($sensor_data as $data): ?>
                <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['temperature'] ?></td>
                    <td><?= $data['humidity'] ?></td>
                    <td><?= $data['sensorvalue'] ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No sensor data found.</p>
    <?php endif; ?>

</body>
</html>