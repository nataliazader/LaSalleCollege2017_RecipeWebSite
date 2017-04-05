<?php
class ProfileModel extends Model{

	public function Index(){
		$result='';

		if(isset($_SESSION['user_data'])){
			$sql = "SELECT * recipe WHERE user_id=".$_SESSION['user_data']['user_id'];

			$this->query($sql);
			$recipes = $this->resultSet();

			$result=array('recipes' => $recipes);
		}

		return $result;
	}
}