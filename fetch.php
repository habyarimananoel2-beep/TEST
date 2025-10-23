<?php
$servername="localhost";
$username="root";
$password="";
$dbname="example";

$connection=new mysqli($servername,$username,$password,$dbname);

if($connection->connect_error){
    die("connection failed:.$connection->connect_error");
}

$sql  ="SELECT id,name,email,number ,location FROM users";

$solution= $connection->query($sql);
$users=[];
if($solution->num_rows>0){
    while($row=$solution->fetch_assoc()){
        $users[] =$row;
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>registered users</title>
</head>
<body>
<h2>list of registered users</h2>

<?php if(count($users)>0):?>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID></th>
            <th>name</th>
            <th>email</th>
            <th>number</th>
            <th>location</th>
</tr>
<?php foreach($users as $users):?>
    <tr>
        <td><?=$users['id']?></td>
        <td><?=$users['name']?></td>
        <td><?=$users['email']?></td>
        <td><?=$users['number']?></td>
        <td><?=$users['location']?></td> 
</tr>
<?php endforeach;?>
</table>
<?php else:?>
    <p>No users found.</p>
    <?php endif;?>

    <br>
</body>
</html>