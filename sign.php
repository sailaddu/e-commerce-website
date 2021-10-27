<?php
include 'connection.php';

session_start();
if (isset($_SESSION['username'])) {
    header("Location:login.php");
   
}

if (isset($_POST['submit'])) {
	$username = $_POST['user'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['confirmpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM signin WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO signin (name, email, password ,confirmpassword)
					VALUES ('$username', '$email', '$password','$cpassword')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "Wow! User Registration Completed";
				$user = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                $_SESSION['username']=$name;
                header('location:login.php');
			} else {
				echo "Woops! Something Wrong Went";
			}
		} else {
			echo "Woops! Email Already Exists";
		}
		
	} else {
		echo "Password Not Matched";
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
                   url:"sign.php",
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
    <script type="text/javascript">
        function checkEmail(){
            var email= document.getElementById("txtemail");
            var filter=/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/
            if(!filter.test(email.value)){
                alert("plz enter a valid email")
                email.focus;
                return false;
            }else{
                alert(" email success")
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row centered-form">
            <div class="col-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-4">
                    <div>
                        <form class="box" action=""method="post"  id="form">
                        <h2 class="text-center">Signup</h2>
                            <div class="form-group col-12 col-md-12 ">
                                  
                                <input type="text"name="user"class="form-control" placeholder="user"required>
                            </div>
                            <div class="form-group col-12 col-md-12">
                               
                                <input type="text" id="txtemail"name="email"class="form-control"placeholder="email"required>
                            </div>
		
                            <div class="form-group col-12 col-md-12">
                                
                                <input type="text"name="password"class="form-control"placeholder="password"required>
                            </div>
                            <div class="form-group col-12 col-md-12">
                                
                                <input type="password"name=" confirmpassword"class="form-control"placeholder="confirmpassword"required>
                            </div>
                            <button onclick="javascript:checkEmail()" name="submit"  id="submitbtn"type="submit"class="btn btn-primary text-center">SIGN UP</button>
			    		</form>
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

.box h2 {
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




               

