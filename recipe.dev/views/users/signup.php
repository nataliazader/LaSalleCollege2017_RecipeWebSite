<div class="panel panel-default" style="width:400px;margin:100px auto 100px auto">
  <div class="panel-heading">
    <h3 class="panel-title">Sign Up</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<input type="text" name="name" class="form-control" placeholder="Name" />
    	</div>
    	<div class="form-group">
    		<input type="text" name="email" class="form-control" placeholder="Email" />
    	</div>
    	<div class="form-group">
    		<input type="password" name="password" class="form-control" placeholder="Password" />
    	</div>
    	<input class="btn btn-default" name="submit" type="submit" value="Sign Up" />
    </form>
  </div>
</div>