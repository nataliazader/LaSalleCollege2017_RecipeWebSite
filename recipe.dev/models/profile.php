<?php
class ProfileModel extends Model{
	
	public function Index(){
		
		$result=$this->FillNavbar();

		if(isset($_SESSION['user_data']) && isset($_POST['favorite'])){
			$sql = "SELECT * FROM recipe WHERE id IN (SELECT recipe_id FROM user_favorite WHERE user_id=".$_SESSION['user_data']['id'].")";

			$this->query($sql);
			$recipes = $this->resultSet();
			$result=array_merge($result,array('recipes' => $recipes));
		}
		return $result;
	}

	private function FillNavbar(){		
		$this->query("SELECT * FROM category");
		$categories = $this->resultSet();

		$this->query("SELECT * FROM type");
		$types = $this->resultSet();

		$result=array( 'categories' => $categories , 'types' => $types );

		return $result;
	}
}