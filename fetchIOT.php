<?php
$servername="localhost";
$username="root";
$password="";
$dbname="noel";

$connection=new mysqli($servername,$username,$password,$dbname);

if($connection->connect_error){
    die("connection failed:.$connection->connect_error");
}

$sql  ="SELECT id,temperature,humidity,sensorValue FROM remy ORDER BY id DESC";
$solution= $connection->query($sql);
$form=[];
if($solution->num_rows>0){
    while($row=$solution->fetch_assoc()){
        $form[] =$row;
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>registered IOT DATA </title>
</head>
<body>
<h2 align="center">list of registered IOT DATA</h2>

<?php if(count($form)>0):?>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID></th>
            <th>temperature</th>
            <th>humidity</th>
            <th>sensorValue</th>
            
</tr>
<?php foreach($form as $form):?>
    <tr>
        <td><?=$form['id']?></td>
        <td><?=$form['temperature']?></td>
        <td><?=$form['humidity']?></td>
        <td><?=$form['sensorValue']?></td>
        
</tr>
<?php endforeach;?>
</table>
<?php else:?>
    <p>No data found.</p>
    <?php endif;?>

    <br>
</body>
</html>