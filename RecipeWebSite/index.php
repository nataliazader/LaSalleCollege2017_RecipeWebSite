<?php require "includes/header.php"?>
<body>
	<?php require "includes/navbar.php"?>
	<?php require "includes/carousel.php"?>
	<h2 style="text-align:center;margin-bottom:30px;"><?php echo $header; ?></h2>

	<div class="container marketing">	    
		
			<?php 
				$i=1;
				foreach($recipes as $value) {
					if(empty($_GET))
						if($i == 4)
							break;
			
				echo ($i%3==0) ?  "<div class='row'>" :  "";
			?>
			<div class="col-lg-4">
			  <img class="img-responsive center-block" src="public/img/recipe/<?php echo $value['image']; ?>" alt="Generic placeholder image" width="140" height="140">
			  <h2><?php echo $value['name']?></h2>
			  <p><?php echo $value['description']; ?></p>
			  <p style="font-size:bold">Rating <<< <?php echo $value['rating']; ?> </p>
			  <p><a class="btn btn-default" href="includes/recipe.php?recipe=<?php echo $value['id']; ?>" role="button">View recipe</a></p>
			</div>
			
			<?php 
			echo ($i%3==0) ?  "</div>" : "";
				$i++;
				}
			echo (($i-1)%3!=0)?  "</div>" : "";	
			?>		
		
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
						<h4 class="modal-title">Please, enter email and password.</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="email">Email address or username</label>
								<input type="text" class="form-control" name="email" placeholder="Email address or username" required>
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
	
	<div id="myModalSignUp" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form class="form-group" action="index.php" method="post">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Please, enter name, email and password.</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="email">Name</label>
								<input type="text" class="form-control" name="nameReg" placeholder="Name" required>
							</div>						
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="emailReg" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="passwordReg" placeholder="Password" required>
							</div>
						</div>
						<div class="modal-footer">
						<button type="submit" class="btn btn-default">Sign Up</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>