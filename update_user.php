<?php 
include('connection.php');

$name = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['email'];
$lname = $_POST['lname'];
$personal_id = $_POST['personal_id'];


$sql = "UPDATE `users` SET `name`='$name', `email`='$email', `lname`='$lname' , `personal_id`='$personal_id' WHERE id='$id'";
$query = mysqli_query($con,$sql);
if($query==true)
{
    $data = array(
        'status'=>'success',
    );
    echo  json_encode($data);
}
else
{
    $data = array(
        'status'=>'failed',
    );
    echo  json_encode($data);
}
