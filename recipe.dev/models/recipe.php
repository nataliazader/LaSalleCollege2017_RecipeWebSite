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

		if(isset($_POST['favorite'])) 
			$this->Favorite($id);

		if(isset($_POST['comment']))
			$this->Comment($id);

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

		$ingr = array();
		$stp = array();
		$cmt = array();

		foreach ($recipes as $value) {
			$sql = "SELECT * FROM recipe_ingridient WHERE recipe_id = ".$value['id']." ORDER BY id";
			$this->query($sql);
			$ingridients = $this->resultSet();

			$ingr[$value['id']]=$ingridients;

			$sql = "SELECT * FROM recipe_prepare WHERE recipe_id = ".$value['id']." ORDER BY step";
 			$this->query($sql);
			$steps = $this->resultSet();

			$stp[$value['id']]=$steps;

			$sql = "SELECT * FROM recipe_comment WHERE recipe_id = ".$value['id'];
 			$this->query($sql);
			$comments = $this->resultSet();
			
			$cmt[$value['id']]=$comments;
		}


		if(isset($_SESSION['user_data'])){
			$sql = "SELECT * FROM user_favorite WHERE recipe_id = ".$id." AND user_id = ".$_SESSION['user_data']['id'];
			$this->query($sql);
		    $favorite = $this->single();
		    if($favorite)
		    	$_SESSION['favorite'] = true;
		    else
		    	unset($_SESSION['favorite']);
		}


		$result = array_merge($result , array('recipes' => $recipes),  array('ingridients' =>$ingr), array('steps' => $stp) ,array('comments' => $cmt));
		return $result;
	}


	private function Favorite($id){
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
		else{
			$this->query('DELETE FROM user_favorite WHERE recipe_id ='.$id.' AND user_id ='.$_SESSION['user_data']['id']);
			$count = $this->execute();
			Messages::setMsg('The recipe deleted from favorites.','error');
			unset($_SESSION['favorite']);
			unset($_POST['favorite']);			
		}
	}

	private function Comment($id){
		 
		if(isset($_POST['comments']) && !empty($_POST['comments'])){
			$comments=$_POST['comments'];
			$this->query('INSERT INTO recipe_comment (recipe_id, comment, user_id) VALUES(:recipe_id, :comment, :user_id)');
			$this->bind(':recipe_id', $id);
			$this->bind(':comment', $comments);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			
			$this->execute();
			if($this->lastInsertId()){
				Messages::setMsg('Comments are successfully sent.');
				unset($_POST['comment']);
			}
		}
		else
			Messages::setMsg('Enter your comments','error');		
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