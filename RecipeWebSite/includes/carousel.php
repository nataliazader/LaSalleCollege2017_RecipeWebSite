<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php
			$active="class='active'";
			for( $i = 0; $i < count($carousel); $i++){ 
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
			foreach($carousel as $value){
				if($i==1)
					$active="";
				$i++;
		?>
		<div class="item <?php echo $active; ?>">
		  <img src="public/img/category/<?php echo $value['image']; ?>" alt="">
		  <div class="container">
			<div class="carousel-caption">
			  <h1><?php echo $value['name']; ?> category</h1>

			  <p><a class="btn btn-lg btn-default" href="<?php echo 'index.php?category='.$value['id'];?>" role="button">Search <?php echo $value['name']; ?></a></p>
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

