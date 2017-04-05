<?php
class HomeModel extends Model{

	public function Index(){

		$params=array();
		$where='';
		$limit='';
		$header='';

		$url=parse_url($_SERVER["REQUEST_URI"]);
		
		if(!empty($url['query'])){
			parse_str($url['query'], $params);
				if(isset($params['category'])){
					$where=" WHERE recipe.id IN ( SELECT recipe_id FROM recipe_category WHERE category_id = ".$params['category']." )" ;

					$this->query("SELECT * FROM category WHERE id =".$params['category']);
					$res = $this->resultSet();

					$header="Search by category ".$res[0]['name'];
				}
					
				if(isset($params['type'])){
					$where=" WHERE recipe.type_id = ".$params['type'];

					$this->query("SELECT * FROM type WHERE id =".$params['type']);
					$res = $this->resultSet();

					$header="Search by type ".$res[0]['name'];
				}
				if(isset($params['find'])){
					$where=" WHERE recipe.id IN ( SELECT recipe_category.recipe_id FROM recipe_category INNER JOIN category ON recipe_category.category_id = category.id WHERE category.name LIKE '%".$params['find']."%' )" ;
					$where .=" OR recipe.id IN ( SELECT recipe_id FROM recipe_ingridient WHERE name LIKE '%".$params['find']."%' )" ;			
					$where .=" OR recipe.name LIKE '%".$params['find']."%' ";
					$where .=" OR type.name LIKE '%".$params['find']."%' ";	

					$header="Search for '".$params['find']."' in types, categories, ingridients or recipes.";
				}
		}
		else{
			$limit = "LIMIT 3";
			$header = "TOP 3 rating recipes.";
		}

		$this->query("SELECT * FROM category WHERE image not like ''");
		$carousel = $this->resultSet();

		$this->query("SELECT * FROM category");
		$categories = $this->resultSet();

		$this->query("SELECT * FROM type");
		$types = $this->resultSet();

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
				  ORDER BY rating.rating DESC ".$limit;

		$this->query($sql);
		$recipes = $this->resultSet();

		$result=array( 'carousel' => $carousel , 'categories' => $categories , 'types' => $types ,'recipes' => $recipes, 'header' =>$header);

		return $result;
	}
}