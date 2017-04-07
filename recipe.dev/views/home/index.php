<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 50px">
	<ol class="carousel-indicators">
		<?php
			$active="class='active'";
			for( $i = 0; $i < count($viewmodel['carousel']); $i++){ 
				if($i==1)
					$active="";
		?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php echo $active; ?> ></li>
		<?php
			} 
		?>	
    </ol>
	<div class="carousel-inner" role="listbox">
		<?php 
			$i=0;
			$active="active";
			foreach($viewmodel['carousel']as $value){
				if($i==1)
					$active="";
				$i++;
		?>
		<div class="item <?php echo $active; ?>">
		  <img style="width:100%" src="<?php echo ROOT_URL; ?>public/img/category/<?php echo $value['image']; ?>" alt="">
		  <div class="container">
			<div class="carousel-caption">
			  <h1><?php echo $value['name']; ?> category</h1>

			  <p><a class="btn btn-lg btn-default" href="<?php echo ROOT_URL; ?>home/index?category=<?php echo$value['id'];?>" role="button">Search <?php echo $value['name']; ?></a></p>
			</div>
		  </div>
		</div>
		<?php 
			}
		?>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="container marketing" style="margin-top: 20px">
	<h2 style='text-align: center;margin-bottom: 40px'><?php echo ($viewmodel['header']);?></h2>	    
	<?php 
		$i=1;
		foreach($viewmodel['recipes'] as $value) {
			echo ($i%3==0) ?  "<div class='row'>" :  "";
	?>
	<div class="col-lg-4">
	  <img class="img-responsive center-block" src="<?php echo ROOT_URL; ?>public/img/recipe/<?php echo $value['image']; ?>" alt="Generic placeholder image" width="140" height="140">
	  <h2><?php echo $value['name']?></h2>
	  <p><?php echo $value['description']; ?></p>
	  <p style="font-size:bold">			
	  	<div class="stars">
				<form action="#" method="post">
				    <input class="star star-5"  type="radio" name="star" <?php echo ($value['rating'] >= 4.5 ) ? 'checked' : '' ;?>/>
				    <label class="star star-5" for="star-5" style="font-size:15px"></label>
				    <input class="star star-4"  type="radio" name="star" <?php echo ($value['rating'] < 4.5 && $value['rating']>=3.5) ? 'checked' : '' ;?>/>
				    <label class="star star-4" for="star-4" style="font-size:15px"></label>
				    <input class="star star-3"  type="radio" name="star" <?php echo ($value['rating'] < 3.5  && $value['rating']>=2.5) ? 'checked' : '' ;?>/>
				    <label class="star star-3" for="star-3" style="font-size:15px"></label>
				    <input class="star star-2"  type="radio" name="star" <?php echo ($value['rating'] < 2.5 && $value['rating']>=1.5 ) ? 'checked' : '' ;?>/>
				    <label class="star star-2" for="star-2" style="font-size:15px"></label>
				    <input class="star star-1"  type="radio" name="star" <?php echo ($value['rating'] < 1.5 ) ? 'checked' : '' ;?>/>
				    <label class="star star-1" for="star-1" style="font-size:15px"></label>
				</form>			
		</div>
	</p>
	<p><a class="btn btn-default" href="<?php echo ROOT_URL; ?>recipe/index?id=<?php echo $value['id']; ?>" role="button">View recipe</a></p>
	</div>
	
	<?php 
	echo ($i%3==0) ?  "</div>" : "";
		$i++;
		}
	echo (($i-1)%3!=0)?  "</div>" : "";	
	?>		
</div>
