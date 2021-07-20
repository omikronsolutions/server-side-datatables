<?php include('connection.php');

$sql = "SELECT  users.`id`, users.`name` , users.`lname`, users.`personal_id`, users.`email`, users.`register_date`, images.`img_path`
FROM `users` AS users
RIGHT JOIN `images` AS images
ON users.`id` = images.`user_id`";
$query = mysqli_query($con,$sql);



$count_all_rows = mysqli_num_rows($query);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE name like '%".$search_value."%' ";
	$sql .= " OR email like '%".$search_value."%' ";
	$sql .= " OR lname like '%".$search_value."%' ";
	$sql .= " OR personal_id like '%".$search_value."%' ";
}

if(isset($_POST['order']))
{
	$column = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY '".$column."' ".$order;
}
else
{
	$sql .="ORDER BY id ASC";
}


if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .=" LIMIT ".$start.", ".$length;
}

$data = array();

$run_query = mysqli_query($con,$sql);
$filtered_rows = mysqli_num_rows($run_query);
while($row = mysqli_fetch_assoc($run_query))
{
	$subarray = array();
	$subarray[] = $row['id'];
	$subarray[] = $row['name'];
	$subarray[] = $row['lname'];
	$subarray[] = $row['email'];
	$subarray[] = $row['personal_id'];
	$subarray[] = $row['register_date'];
	$subarray[] = '<img src="' . $row['img_path'].'" width="100">';
	$subarray[] = '<a href="javascript:void();" data-id="'.$row['id'].'"   class="btn btn-sm btn-info editBtn">რედაქტირება</a> <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-danger btnDelete">წაშლა</a>';
	$data[]= $subarray;
}

$output = array(
	'data'=>$data,
	'draw'=>intval($_POST['draw']),
	'recordsTotal'=>$count_all_rows,
	'recordsFiltered'=>$count_all_rows,
);

echo json_encode($output);


