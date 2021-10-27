<?php
 
 $server="localhost";
 $user="root";
 $password="";
$db="sessionpractical";
$con=mysqli_connect($server,$user,$password,$db);
if($con){
    echo "connected";
}else{
    echo "notconnected";
}
?>