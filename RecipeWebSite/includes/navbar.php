<div class="navbar-wrapper" ">
	<div class="container" >
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">The Best Recipes </a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php foreach($categories as $value){?>
									<li><a href="<?php echo 'index.php?category='.$value['id'];?>"><?php echo $value['name'];?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Types<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php foreach($types as $value){?>
									<li><a href="<?php echo 'index.php?type='.$value['id'];?>"><?php echo $value['name'];?></a></li>
								<?php } ?>
							</ul>
						</li>						
					</ul>
					<form class="navbar-form navbar-left" action="index.php" method="get">
						<div class="form-group">
						  <input type="text" class="form-control" name="find" placeholder="Find a recipe" required>
						</div>
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					</form>					
					<ul class="nav navbar-nav navbar-right">
						<?php if(empty($_SESSION['user']))
						{?>
						<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModalSignIn">Sign in</button>
						<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModalSignUp">Sign up</button>
						<?php  } else  
						{?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your account<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">My profile</a></li>
									<li><a href="#">My recipes</a></li>
									<li><a href="includes/logout.php">Log Out</a></li>
								</ul>			  
							</li>
						<?php }?>	
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>