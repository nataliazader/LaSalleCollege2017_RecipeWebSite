<?php 
	include "Classes/Database.php";
	include "Classes/Category.php";
	include "Classes/Type.php";
	include "Classes/Recipe.php";
	include "Classes/User.php";
	
	$database = new Database();
	$category = new Category($database);
	$type = new Type($database);
	$recipe = new Recipe($database);
	 
	
	$carousel = $category->getCategories();
	$categories = $category->getCategories('none'); 
	$types = $type->getTypes(); 
	
	$user_email='';
	$user_pass='';
	
	if(isset($_POST['email']) && isset($_POST['password'])){
		$user_email = $_POST['email'];
		$user_pass = $_POST['password'];
		$user = new	User($database);
		$_SESSION['user'] = $user->Verify($user_email,$user_pass);
	}
	
	if(isset($_GET)&&!empty($_GET)){
		$search = $_GET;
		if(!empty($_GET['category'])){
			$cat = $category->getCategories($_GET);
			$header = $cat[0]['name']." recipes";
		}
			
		if(!empty($_GET['type'])){
			$typ = $type->getTypes($_GET);
			$header = $typ[0]['name']." recipes";			
		}
		
		if(!empty($_GET['find'])){
			$header = "Search for ".$_GET['find'];			
		}		
		$recipes = $recipe->getRecipes($search);
	}
	else{
		$header = "TOP Rating recipes";
		$recipes = $recipe->getRecipes();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="icon" href="public/img/recipe.ico">

		<title>The best recipes</title>

		<link href="public/css/bootstrap.min.css" rel="stylesheet">
		<link href="public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="public/css/carousel.css" rel="stylesheet">
		<script src="public/js/ie-emulation-modes-warning.js.download"></script>
	</head>