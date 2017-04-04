<?php
class Users extends Controller{
	protected function signup(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->signup(), true);
	}

	protected function signin(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->signin(), true);
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}
}