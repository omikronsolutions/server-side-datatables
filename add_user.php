<?php include('connection.php');

$username = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['lname'];
$personal_id = $_POST['personal_id'];

$sql = "INSERT INTO `users` (`name`,`email`,`lname`,`personal_id`) VALUES ('$username','$email','$mobile','$personal_id')";
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
