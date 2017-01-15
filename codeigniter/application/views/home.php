<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
 <div class = 'container-float'>
 	<div class="panel panel-default">
  <div class="panel-body"><strong>Welcome <?php echo $username?></strong></div>

</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home"><strong style="color:#3399ff">Test Websight</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../test"><strong>Start Test</strong></a></li>
      <li><a href="#"><strong>Evaluate</strong></a></li> 
     </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="logout"><span class="glyphicon glyphicon-log-out" style="color: #ff9999">logout</span></a></li> 
    </ul>
  </div>
</nav>
</div>





</body>