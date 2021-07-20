<?php

class UserModel extends Model{

public $statusID;
public $statusEmail;

	public function register($imgPath = null){
		// Sanitize POST

   
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['password'])){
			$password = password_hash($post['password'], PASSWORD_DEFAULT);
		} else {
			$password = '';
		}

				if(isset($post['submit'])){

			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
		
		  
		  //fetch inserted user ID
			$this->query("SELECT * FROM users WHERE email=:email");
			$user = $this->single(['email' => $post['email']]);
          
           if($user) {	   
			   echo 'userExists';
			   exit;
			   } 		
		
			// Insert into users
			$this->query('INSERT INTO users (name, lname, personal_id, email, password) VALUES (:name, :lname, :personal_id, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':lname', $post['lname']);
			$this->bind(':personal_id', $post['personal_id']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();

      
     

			//fetch inserted user ID
			$this->query("SELECT * FROM users WHERE email=:email");
			$user = $this->single(['email' => $post['email']]);
           
            
            // Insert into images table
			$this->query('INSERT INTO images (user_id, img_path) VALUES (:user_id, :img_path)');
			$this->bind(':user_id', $user['id']);
			$this->bind(':img_path', $imgPath);
			$this->execute();

             
		
       

			// Verify
			if($this->lastInsertId()){
				
				echo json_encode('Account created. You can now login');
				exit;
			}
		}

		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['password'] == '' || $post['email'] == ''){
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
			// Check if email matches in database
			$this->query('SELECT * FROM users WHERE email = :email');
			$this->bind(':email', $post['email']);
			$row = $this->single();

			if($row){

				if(password_verify($post['password'], $row['password'])) {
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(
						"id" => $row['id'],
						"name" => $row['name'],
						"email" => $row['email']
					);
			
			   echo json_encode(true);
					exit(0); // This line solves the issue where $_SESSION['successMsg'] is unset after header redirection
				} else {
				    echo json_encode(false);
					  exit(0);
				}
			} else {
				 echo json_encode("not found");
				 exit(0);
			}
		}

		return;
	}


//get post personal_id
	//get post email



		public function checkID(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['personal_id'])) {

        // Check if email matches in database
			$this->query('SELECT * FROM users WHERE personal_id = :personal_id');
			$this->bind(':personal_id', $post['personal_id']);
			$row = $this->single();
           if( ! $row) 
           {
           	$this->statusID = false;
           }
           else
           {
           	$this->statusID = true;
           }
		}

		echo json_encode($this->statusID);

		return;
	}


			public function checkEmail(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['email'])) {

        // Check if email matches in database
			$this->query('SELECT * FROM users WHERE email = :email');
			$this->bind(':email', $post['email']);
			$row = $this->single();
           if( ! $row) 
           {
             $this->statusEmail = false;
           }
           else
           {
           	 $this->statusEmail = true;
           }

		}

         echo json_encode($this->statusEmail);
        
		return;

	}

	public function fetch() {

			//fetch users
		if(isset($_SESSION['is_logged_in']))
		 {
			$this->query('SELECT * FROM users LEFT JOIN images ON users.id = images.user_id');
			$rows = $this->resultSet();
		  echo json_encode($rows);
		}

	}
	
	public function exportExcel($excelData = null) {
		
		$excelData = json_decode($excelData);
	
$columnHeader = '';
$columnHeader = "id" . "\t" . "First name" . "\t" . "Last Name" . "\t" . "email" . "\t" . "personal_id" . "\t" . "register_date" . "\t";  
$setData = '';  
$rowData = '';
    foreach ($excelData as $row) {  
        $rowData .= $row;  
    }  
    
    $setData .= trim($rowData) . "\n";  

  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
		
	}





}

?>
