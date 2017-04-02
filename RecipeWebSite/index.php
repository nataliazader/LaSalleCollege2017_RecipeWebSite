<?php require "includes/header.php"?>
<body>
	<?php require "includes/navbar.php"?>
	<?php require "includes/carousel.php"?>
	<h2 style="text-align:center;margin-bottom:30px;"><?php echo $header; ?></h2>

	<div class="container marketing">	    
		<div class="row">
			<?php 
				$i=0;
				foreach($recipes as $value) {
					if(!isset($_GET['category'])||!isset($_GET['type']))
						if($i == 3)
							break;
			?>
			<div class="col-lg-4">
			  <img class="img-responsive center-block" src="public/img/recipe/<?php echo $value['image']; ?>" alt="Generic placeholder image" width="140" height="140">
			  <h2><?php echo $value['name']?></h2>
			  <p><?php echo $value['description']; ?></p>
			  <p><a class="btn btn-default" href="includes/recipe.php?recipe=<?php echo $value['id']; ?>" role="button">View recipe</a></p>
			</div>
			
			<?php 
				$i++;
				}
			?>		
		</div>
		<hr class="featurette-divider">
		<?php require "includes/footer.php"?>
	</div>
    <script src="public/js/jquery.min.js.download"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="public/js/bootstrap.min.js.download"></script>
    <script src="public/js/holder.min.js.download"></script>
    <script src="public/js/ie10-viewport-bug-workaround.js.download"></script>
  
	<div id="myModalSignIn" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form class="form-group" action="index.php" method="post">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Enter email and password</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="email" placeholder="Email" required>
							  </div>
							  <div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							  </div>
						</div>
						<div class="modal-footer">
						<button type="submit" class="btn btn-default">Sign In</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>