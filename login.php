<?php
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location:home.php");
   
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM  signin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $_SESSION['username']=$name;
        header('location:home.php');
    }else{
        echo "Woops! Email or Password is Wrong";
    }
}

      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <script>
        $(document).ready(function(){
            $("#submitbtn").click(function(){
               $.ajax({
                   url:"login.php",
                   type:"post",
                   data:$("#form").serialize(),
                   sucess:function(cbf){
                       alert(cbf);
                       $("#form")[0].reset();
                   }
               })
            })
        })
        
    </script>
</head>
<body>
    <div class="container">
        <div class="row centered-form">
            <div class="col-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-6">
                    <div>
                      <form  id="form"action=" login.php"method="post"class="box">
                                <h3 class="text-center">LOGIN FORM</h3>
                                <div class="form-group col-12 col-md-12">
                                    <input type="text"name="email" id="email"placeholder="email"class="form-control"required>
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    <input type="text"name="password" id="password"placeholder="password"class="form-control"required>
                                </div>
                                <button name="submit" id="submitbtn"type="submit"data-toggle="modal" data-target="#myModal"class="submitbtn btn btn-primary text-center">LOGIN </button>
                            </form>
                    </div>
            </div>
    </div>
     
<div class="container">
 
 <!-- Button to Open the Modal -->


 <!-- The Modal -->
 <div class="modal" id="myModal">
   <div class="modal-dialog">
     <div class="modal-content">
     
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Modal Heading</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       
       <!-- Modal body -->
       <div class="modal-body">
         login sucessfully
       </div>
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
       
     </div>
   </div>
 </div>
 
</div>
    
</body>


<style>
    body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #22613b, #310c1b)
}
.box {
    width:60%;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 85%;
    background: #191919;
    text-align: center;
    transform: translateX(-50%);
    margin-top: 50px;
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 15px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 150px;
   color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h3 {
    color: white;
    text-transform: uppercase;
  
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 200px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}


@media (min-width:320px) and (max-width:575px){
h2{
   font-size:20px;
 }

.box{
    width:75%;
    padding:40px;
    position: absolute;
    top:50%;
    left:50%;
    background: #191919;
    text-align: center;
    transform: translateX(-50%);
    margin-top: 50px;
}
   
}
@media (min-width:576px) and (max-width:767px){
    .box{
    width:90%;
    padding:40px;
    position: absolute;
    top:50%;
    left:75%;
    background: #191919;
    text-align: center;
    transform: translateX(-50%);
    margin-top: 50px;
}

}
@media (min-width:768px) and (max-width:991px){

    .box{
    width:90%;
    padding:40px;
    position: absolute;
    top:50%;
    left:90%;
    background: #191919;
    text-align: center;
    transform: translateX(-50%);
    margin-top: 50px;
}
}

</style>
</html>




               

