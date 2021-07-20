<?php include('connection.php');
$id =$_POST['id'];
$sql = "SELECT  users.`id`, users.`name` , users.`lname`, users.`personal_id`, users.`email`, users.`register_date`, images.`img_path`
FROM `users` AS users
RIGHT JOIN `images` AS images
ON users.`id` = images.`user_id` WHERE users.id='$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
