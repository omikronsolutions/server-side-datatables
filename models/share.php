<?php

class ShareModel extends Model{
	

	
	public function Index(){
		if(isset($_SESSION['is_logged_in'])) {
		$this->query('SELECT *  FROM shares');
		$rows = $this->resultSet();
		return $rows;
	}
	}
	
	public function fetchPosts(){
		if(isset($_SESSION['is_logged_in'])) {
		$this->query('SELECT *  FROM shares');
		$rows = $this->resultSet();
		echo json_encode($rows);
		exit;
	}
	
	}
	
	
	public function fetchPost(){
		$this->query('SELECT * FROM shares WHERE id = :id');
		$this->bind(':id', $_POST['id']);
		echo json_encode($this->single());
		exit;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
		if(isset($post['submit'])){
			
			if($post['title'] == '' || $post['body'] == ''){
				
				
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
			// Insert into mySQL
			
			$id = $_SESSION['user_data']['id'];
			$this->query('INSERT INTO shares (title, body, user_id) VALUES (:title, :body, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':user_id', $id);
			$this->execute();
			


			// Verify
			if($this->lastInsertId()){
			
				Messages::setMsg('Post added', 'success');
				// Redirect
				
			}
			header('Location: /shares');
				exit;
			
		}


	}

	public function edit(){
		// Sanitize
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['title'] == '' || $post['body'] == ''){
				Messages::setMsg('Make sure the fields are not empty', 'error');
				$this->query('SELECT * FROM shares WHERE id = :id');
				$this->bind(':id', $get['id']);
				return $this->single();
			}
			
			$this->query('UPDATE shares SET title = :title, body = :body WHERE id = :id');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':id', $post['id']);
			$this->execute();

	
			exit(0);
		} else {
			if($get['id'] != NULL || $get['id'] != ''){
				// Fetch post using GET parameter value
				$this->query('SELECT count(*) FROM shares WHERE id = :id');
				$this->bind(':id', $get['id']);
				$row = $this->countSet();
				if($row > 0){
					$this->query('SELECT * FROM shares WHERE id = :id');
					$this->bind(':id', $get['id']);
					return $this->single();
				} else {
					header('Location: ' . ROOT_PATH . 'shares');
				}
			} else {
				header('Location: ' . ROOT_PATH . 'shares');
			}
		}
	}

	public function delete(){
		// Sanitize
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
			$this->query('DELETE FROM shares WHERE id = :id');
			$this->bind(':id', $post['id']);
			$this->execute();
            exit;
	
		
	}
}

?>
