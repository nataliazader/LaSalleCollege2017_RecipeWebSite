<?php
class RecipeModel extends Model{

	public function Index(){

		$result=$this->FillNavbar();
		
		$params=array();
		$where='';
        $id='';
		$url=parse_url($_SERVER["REQUEST_URI"]);
		
		if(!empty($url['query'])){
			parse_str($url['query'], $params);
				if(isset($params['id'])){
					$id=$params['id'];
					$where=" WHERE recipe.id =".$id ;
				}
		}

		$sql = "SELECT recipe.*,rating.rating,type.name as type
				  FROM recipe 
				  LEFT JOIN 
	              (SELECT recipe_id,ROUND((SUM(rating)/COUNT(DISTINCT id)),2) as rating 
                  FROM `recipe_rating` 
                  GROUP BY recipe_id ORDER BY rating DESC) AS rating 
                  ON recipe.id=rating.recipe_id 
                  INNER JOIN type ON recipe.type_id = type.id
                  ".$where."
				  GROUP BY recipe.id 
				  ORDER BY rating.rating DESC; ";

		$this->query($sql);
		$recipes = $this->resultSet();

		$sql = "SELECT * FROM recipe_ingridient WHERE recipe_id = ".$id;

		$this->query($sql);
		$ingridients = $this->resultSet();

		$sql = "SELECT * FROM recipe_prepare WHERE recipe_id = ".$id." ORDER BY step";

		$this->query($sql);
		$steps = $this->resultSet();

		if(isset($_SESSION['user_data'])){
			$sql = "SELECT * FROM user_favorite WHERE recipe_id = ".$id;
			$this->query($sql);
		    $favorite = $this->single();
		    if($favorite)
		    	$_SESSION['favorite'] = true;
		    else
		    	unset($_SESSION['favorite']);
		}

		$this->Favorite();
		$result = array_merge($result , array('recipes' => $recipes),  array('ingridients' =>$ingridients), array('steps' => $steps));
		return $result;
	}


	private function Favorite(){
		if(isset($_POST['favorite'])) {
				if(!isset($_SESSION['favorite'])){
					$this->query('INSERT INTO user_favorite (user_id, recipe_id) VALUES(:user_id, :recipe_id)');
					$this->bind(':user_id', $_SESSION['user_data']['id']);
					$this->bind(':recipe_id', $id);
					$this->execute();
					if($this->lastInsertId()){
					Messages::setMsg('The recipe added to favorites.');
					$_SESSION['favorite'] = true;
					unset($_POST['favorite']);
				}
			}
			else
			{
				$this->query('DELETE FROM user_favorite WHERE recipe_id ='.$id);
				$count = $this->execute();
				Messages::setMsg('The recipe deleted from favorites.');
				unset($_SESSION['favorite']);
				unset($_POST['favorite']);			
			}
		}
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