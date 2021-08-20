<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<div class="container" id="ribbon" class="container-fluid">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">User Login</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" />
    	</div>
    	
    
	<div id="separator-ribbon">
    <div class="content bg-warning"></div>
	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
	</form>
	</div>
  </div>
</div>
</body>
</html>

