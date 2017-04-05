<?php
class UserModel extends Model{
	
	private function fillNavbar(){		
		$this->query("SELECT * FROM category");
		$categories = $this->resultSet();

		$this->query("SELECT * FROM type");
		$types = $this->resultSet();

		$result=array( 'categories' => $categories , 'types' => $types );

		return $result;
	}	


	public function signup(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Registration failed.Fill in fields.', 'error');
				return $this->fillNavbar();
			}

			$this->query('INSERT INTO user (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			if($this->lastInsertId()){
				$_SESSION['is_registered'] = true;
				header('Location: '.ROOT_URL.'users/signin');
			}
			else
			{
				Messages::setMsg('Username or email is already registered.', 'error');
			}
		}
		return $this->fillNavbar();
	}

	public function signin(){
		if(isset($_SESSION['is_registered'])){
			Messages::setMsg('Registration successfully completed.');
			unset($_SESSION['is_registered']);
		}
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			$this->query('SELECT * FROM user WHERE email = :email OR name = :name AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':name', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				header('Location: '.ROOT_URL.'profile');
			} else {
				Messages::setMsg('Username/email or password is invalid.', 'error');
			}
		}
		return  $this->fillNavbar();
	}


}