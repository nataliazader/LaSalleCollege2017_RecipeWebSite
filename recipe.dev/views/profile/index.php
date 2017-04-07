<div class="container">
<div class="jumbotron">
<?php
echo "<p>Your name : ".$_SESSION['user_data']['name']."</p>";
echo "<p>Your email : ".$_SESSION['user_data']['email']."</p>";

?>
<p>
  <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  		<button class="btn btn-default" type="submit" name="favorite" >My favorites</button>
  </form>
</p>
</div>
</div>
<?php if(isset($_POST['favorite'])) {?>

<div class="container marketing" style="margin-top: 20px">	
	<h2 style="text-align: center;margin-bottom: 20px;">My favorite recipes.</h2>    
	<?php 
		$i=1;
		foreach($viewmodel['recipes'] as $value) {
			echo ($i%3==0) ?  "<div class='row'>" :  "";
	?>
	<div class="col-lg-4">
	  <img class="img-responsive center-block" src="<?php echo ROOT_URL; ?>public/img/recipe/<?php echo $value['image']; ?>" alt="Generic placeholder image" width="140" height="140">
	  <h2><?php echo $value['name']?></h2>
	  <p><?php echo $value['description']; ?></p>
	  <p><a class="btn btn-default" href="<?php echo ROOT_URL; ?>recipe/index?id=<?php echo $value['id']; ?>" role="button">View recipe</a></p>
	</div>
	
	<?php 
	echo ($i%3==0) ?  "</div>" : "";
		$i++;
		}
	echo (($i-1)%3!=0)?  "</div>" : "";	
	?>		
</div>
<?php }?>