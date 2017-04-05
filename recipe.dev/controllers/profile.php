<?php
class Profile extends Controller{
	protected function Index(){
		$viewmodel = new ProfileModel();
		$this->returnView($viewmodel->Index(), true);
	}
}