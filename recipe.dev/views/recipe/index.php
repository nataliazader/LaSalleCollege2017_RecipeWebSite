<div class="container marketing" style="margin-top: 20px">	
<?php foreach($viewmodel['recipes'] as $value) {?>
    <div class="row featurette">
    	<div class="col-md-7 col-md-push-5">
		<?php if(isset($_SESSION['is_logged_in'])) : ?>
			<div class="stars">
				<form action="#" method="post">
				    <input class="star star-5" id="star-5" type="radio" name="star" checked/>
				    <label class="star star-5" for="star-5"></label>
				    <input class="star star-4" id="star-4" type="radio" name="star"/>
				    <label class="star star-4" for="star-4"></label>
				    <input class="star star-3" id="star-3" type="radio" name="star"/>
				    <label class="star star-3" for="star-3"></label>
				    <input class="star star-2" id="star-2" type="radio" name="star"/>
				    <label class="star star-2" for="star-2"></label>
				    <input class="star star-1" id="star-1" type="radio" name="star"/>
				    <label class="star star-1" for="star-1"></label>
				</form>
			
			</div>
		<?php endif; ?>		        
		<h2 class="featurette-heading"><?php echo $value['name']?></h2>
		<p class="lead"><?php echo $value['description']?></p>
		<h2 class="featurette-heading">Ingridients</h2>
		<p>
		<?php
		$i=1;
		foreach ($viewmodel['ingridients']  as $val) {
		echo $i.". ".$val['quantity']." ".$val['name'].",".$val['description']."<br/>";
		$i++;
		}
		?>
		</p>
		</div>
	<div class="col-md-5 col-md-pull-7">
		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="<?php echo ROOT_URL; ?>public/img/recipe/<?php echo $value['image']; ?>">
	</div>
	</div>
	<?php }?>
	<div style="margin-top: 20px">
	<h2 class="featurette-heading">Directions</h2>
		<?php
			foreach ($viewmodel['steps']  as $val) {
				echo "<p>".$val['step'].". ".$val['description']."</p>";
				$i++;
			}
      	?>
	</div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
		<div class="panel" style="width:600px">
			 <div class="panel-body">
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			    	<button type="submit" class="btn btn-default" name="favorite" ><span class="glyphicon glyphicon-heart" aria-hidden="true" ></span><?php
			    	echo (isset($_SESSION['favorite'])) ? " Delete from favorites" : " Add to favorites" ; ?></button>
			    </form>			 
			    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			    	<div class="form-group">
			    		<label>Leave comments</label>
			    		<textarea name="comments" class="form-control"></textarea>
			    	</div>
			    	<input class="btn btn-default" type="submit" value="Comment" />
			    </form>
			</div>
		</div>
	<?php endif; ?>		
</div>