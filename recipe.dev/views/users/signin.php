<div class="panel panel-default" style="width:400px;margin:50px auto 50px auto">
  <div class="panel-heading">
    <h3 class="panel-title">Sign In</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<input type="text" name="email" class="form-control" placeholder="Email or Username" />
    	</div>
    	<div class="form-group">
    		<input type="password" name="password" class="form-control" placeholder="Password" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Sign In" />
    </form>
  </div>
</div>