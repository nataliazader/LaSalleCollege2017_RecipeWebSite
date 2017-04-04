<html>
<head>
	<title>The best recipes</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>public/css/bootstrap.css">
  <link href="<?php echo ROOT_PATH; ?>public/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo ROOT_PATH; ?>public/js/jquery-3.2.0.min.js"></script>
  <script src="<?php echo ROOT_PATH; ?>public/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" style="margin-bottom: 0!important">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">The Best recipe</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php foreach($viewmodel['categories'] as $value){?>
                  <li><a href="<?php echo ROOT_URL; ?>home/index?category=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                <?php } ?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Types<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php foreach($viewmodel['types'] as $value){?>
                  <li><a href="<?php echo ROOT_URL; ?>home/index?type=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" action="<?php echo ROOT_URL; ?>home/index" method="get">
            <div class="form-group">
              <input type="text" class="form-control" name="find" placeholder="Find a recipe" required>
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </form> 
          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
          <?php else : ?>
            <button type="button" class="btn btn-default navbar-btn" onclick="location.href='<?php echo ROOT_URL; ?>users/signin'">Sign in</button>
            <button type="button" class="btn btn-default navbar-btn" onclick="location.href='<?php echo ROOT_URL; ?>users/signup'">Sign up</button>            
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
      <?php Messages::display(); ?>
     	<?php require($view); ?>
    <div class="container marketing">
      <footer>
        <p class="pull-right"><a href="<?php echo ROOT_URL; ?>">Back to top</a></p>
        <p>© 2017 The Best Recipe, Inc.</p>
      </footer>
    </div>
</body>
</html>