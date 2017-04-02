<?php 

class Recipe{
	private $id;
	private $name;
	private $prepare_time;
	private $cook_time;
	private $calorie;
	private $type;
	private $serving;
	private $recipe_date;
	private $image;	
	private $user;
	
	private static $database;
	
	function __construct($database, $name=null, $prepare_time=null, $cook_time=null, $calorie=null, $type=null, $serving=null, $recipe_date=null, $image=null, $user=null, $id=null ){
		$this->id = $id;
		$this->name = $name;
		$this->prepare_time = $prepare_time;
	    $this->cook_time = $cook_time;
	    $this->calorie = $calorie;
		$this->type =  $type;
		$this->serving = $serving;
		$this->recipe_date = $recipe_date;
		$this->image = $image;
		$this->user = $user;
		self::$database	= $database;	
	}

	public function Save(){
		return isset($this->id)? $this->Update() : $this->Create();
	}
	
	public function Update(){
		
	}
	
	public function Create(){
		$query = "INSERT INTO RECIPE(name,prepare_time,cook_time,calorie,typeId,serving,image,userId) ";
		$query .= "VALUES(?,?,?,?,?,?,?,?)";
		
		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->bindParam(1, $this->name);
			$sql->bindParam(2, $this->prepare_time);
			$sql->bindParam(3, $this->cook_time);
			$sql->bindParam(4, $this->calorie);
			$sql->bindParam(5, $this->typeId);
			$sql->bindParam(6, $this->serving);
			$sql->bindParam(7, $this->image);
			$sql->bindParam(8, $this->userId);
			$sql->execute();
			$last_id = self::$database->Connection->LastInsertId();
			
			return $last_id;
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	public static function getRecipes( $params = ''){
		$where='';
		if(isset($params['category']))
			$where=" WHERE recipe.id IN ( SELECT recipe_id FROM recipe_category WHERE category_id = ".$params['category']." )" ;
		if(isset($params['type']))
			$where=" WHERE recipe.type_id = ".$params['type'];		
		$query = "SELECT recipe.*,rating.rating,type.name as type
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
		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->execute();
			
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
			
		}catch(PDOException $e)
		{
			echo "Query Recipe Failed: ".$e->getMessage();
		}
	}
}
?>