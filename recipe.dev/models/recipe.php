<?php
class RecipeModel extends Model{

	private function fillNavbar(){		
		$this->query("SELECT * FROM category");
		$categories = $this->resultSet();

		$this->query("SELECT * FROM type");
		$types = $this->resultSet();

		$result=array( 'categories' => $categories , 'types' => $types );

		return $result;
	}	

	public function Index(){

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


		$result=$this->fillNavbar();		

		$result = array_merge($result , array('recipes' => $recipes),  array('ingridients' =>$ingridients), array('steps' => $steps));
		return $result;
	}
}