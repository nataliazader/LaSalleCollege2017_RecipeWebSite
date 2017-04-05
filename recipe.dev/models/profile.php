<?php
class ProfileModel extends Model{

	private function fillNavbar(){		
		$this->query("SELECT * FROM category");
		$categories = $this->resultSet();

		$this->query("SELECT * FROM type");
		$types = $this->resultSet();

		$result=array( 'categories' => $categories , 'types' => $types );

		return $result;
	}
	
	public function Index(){
		$result='';

		if(isset($_SESSION['user_data'])){
			$sql = "SELECT * recipe WHERE user_id=".$_SESSION['user_data']['user_id'];

			$this->query($sql);
			$recipes = $this->resultSet();

			$result=$this->fillNavbar();
			$result=array_merge($result,array('recipes' => $recipes));
		}

		return $result;
	}
}