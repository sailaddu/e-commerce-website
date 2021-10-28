
<?php 

session_start();


?>



?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="  https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="  https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> ecommerce website</a>  
            </div>
            <ul class="nav navbar-nav">
                <li> <a href="#">HOME</a></li> 
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
          
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
            </ul>
            
           
        </div>
    </nav>
    <div>
      <h2 class="text-center text-sucess"> Welcome<?php echo $_SESSION['username'];?></h2>

    </div>
    <script>

  /*setTimeout('alert("your session is logout");',3000 );*/
    
</script>
</body>

<style>
    body{
        background:#f2f2f2;
    }
    .navbar-inverse{
        background:#050a2e;
        padding:8px;
        font-size:17px;
    }
    .navbar-nav{
        padding:0 0 0 20px;
    }
    .navbar-right{
        margin-right: 100px;
    }
   
  
    
</style>
</html>
