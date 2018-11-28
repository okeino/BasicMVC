<!doctype html>

<html>
	<head>
		<title>MVC app</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/images-grid.css">
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
	</head>

	<body>

    <nav class=" navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">BACIS MVC</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            
            
            
              <?php 
                
                if(isset($_SESSION['is_logged_in'])):?> 
                <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo ROOT_URL; ?>">Welcome: <?php echo $_SESSION['user_data']['name']; ?></a></li>
                
                <li><a href="<?php echo ROOT_URL; ?>admin/logout">Logout</a></li>
                </ul>
            
             <?php endif; ?>
  
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="wrapper">

      
        <?php Messages::display(); ?>
        <?php  require($view);  ?>
        
        </div>

    <!-- /.container -->
          
    <?php require('views/footer.inc') ;?>
        <script src="<?php echo ROOT_PATH; ?>assets/js/myScript.js" type="text/javascript"></script>   
   
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        
   
	</body>
</html>