<?php 

class User{
	private $id;
	private $role;
	private $name;	
	private $email;
	private $status;
	private $password;

	private static $database;
	
	function __construct($database , $id=null, $name=null , $email = null, $password = null ){
		$this->id = $id;
		$this->role = $role;
		$this->name = $name;
		$this->email = $email;	
		$this->status = $status;
		$this->password = $password;
		self::$database = $database;
	}	
	
	public function Save(){
		return isset($this->id)? $this->Update() : $this->Create();
	}
	
	public function Update(){
		
	}	
		
	public function Create(){
		$query = "INSERT INTO User(name ,email ,password) ";
		$query .= "VALUES(?,?,?)";

		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->bindParam(1, $this->name);
			$sql->bindParam(7, $this->email);
			$sql->bindParam(7, $this->password);
			$sql->execute();
			$last_id = self::$database->Connection->LastInsertId();			
			return $last_id;			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	public static function Verify( $email, $password){
		$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' " ;
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