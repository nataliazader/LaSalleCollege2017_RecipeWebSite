<?php 

class Type{
	private $id;
	private $name;
	private $image;	
	private $description;

	private static $database;
	
	function __construct($database , $name=null, $image=null, $id=null ,$description = null ){
		$this->id = $id;
		$this->name = $name;
		$this->image = $image;	
		$this->description = $description;
		self::$database = $database;
	}
	
	
	public function Save(){
		return isset($this->id)? $this->Update() : $this->Create();
	}
	
	public function Update(){
		
	}
	
	public function Create(){
		$query = "INSERT INTO Type(name,image,description) ";
		$query .= "VALUES(?,?,?)";

		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->bindParam(1, $this->name);
			$sql->bindParam(7, $this->image);
			$sql->bindParam(7, $this->description);
			$sql->execute();
			$last_id = self::$database->Connection->LastInsertId();			
			return $last_id;			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	public static function getTypes(){
		$query = "SELECT * FROM type";

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