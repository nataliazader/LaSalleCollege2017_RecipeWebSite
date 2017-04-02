<?php 

class Category{
	private $id;
	private $name;
	private $image;	

	private static $database;
	
	function __construct($database, $name=null, $image=null, $id=null ){
		$this->id = $id;
		$this->name = $name;
		$this->image = $image;
		self::$database = $database;		
	}	
	
	public function Save(){
		return isset($this->id)? $this->Update() : $this->Create();
	}
	
	public function Update(){
		
	}
	
	public function Create(){
		$query = "INSERT INTO RECIPE(name,image) ";
		$query .= "VALUES(?,?)";
		
		try{
			$sql = $this->database->Connection->prepare($query);
			$sql->bindParam(1, $this->name);
			$sql->bindParam(7, $this->image);
			$sql->execute();
			$last_id = $this->database->Connection->LastInsertId();			
			return $last_id;			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	public static function getCarousel(){
		$query = "SELECT * FROM Category WHERE image not like '' ";
			try{
				$sql = self::$database->Connection->prepare($query);
				$sql->execute();
				
				$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				return $result;
				
			}catch(PDOException $e)
			{
				echo "Query Category Failed: ".$e->getMessage();
			}
	}
	
	public static function getCategories(){
		$query = "SELECT * FROM Category";
			try{
				$sql = self::$database->Connection->prepare($query);
				$sql->execute();
				
				$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				return $result;
				
			}catch(PDOException $e)
			{
				echo "Query Category Failed: ".$e->getMessage();
			}
	}	
	
}
?>