<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Website</title>
  </head>
  <body>
    <h1>Welcome to My Website</h1>
    
    <a href="/vullfi/index2.php">Home</a> |
    <a href="/vullfi/index2.php/<?php echo base64_encode('page1');?>">Page 1</a> |
    <a href="/vullfi/index2.php/<?php echo base64_encode('page2');?>">Page 2</a> |
    <a href="/vullfi/index2.php/<?php echo base64_encode('page3');?>">Page 3</a>
    
    <hr/>
    
    <?php 
	
	$whitelist = array('page1','page2','page3');
	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));    
    if (isset($uriSegments[3])) 
    {   
        $halaman=base64_decode(filter_var($uriSegments[3],FILTER_SANITIZE_STRING));
        if (!in_array($halaman,$whitelist)) {
			die('Invalid Page !');echo "<script>window.location.href='/vullfi/index2.php';</script>";
		} else {			
			include 'pages/'.$halaman.'.php'; 
		}
    } 
    else 
    {
        echo "<p>This is the front page.</p>";
    }
    
    ?>
    
  </body>
</html>


