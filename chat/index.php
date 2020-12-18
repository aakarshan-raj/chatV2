

<?php 
include "db.php";
include "functions.php";
global $connection;
session_start();

if(isset($_POST['submit'])){
	$username  = clean($connection,$_POST['name']);
	$password = clean($connection,$_POST['password']);
	validator($username,$password);
    $one = $_POST['one'];
	$two = $_POST['two'];
	$three = $_POST['three'];
	$four = $_POST['four'];

	$five = $_POST['five'];

	$six = $_POST['six'];

	$seven = $_POST['seven'];
	$code = $one.$two.$three.$four.$five.$six.$seven;
	$status_code = user_check($username,$password);
    if($status_code == 0){
    	 header("Location:action.php?status_code=0");

    }if($status_code == 1){
    	header("Location:chat.php");
    	$_SESSION['name'] = $username;
   }
    if($status_code == 2){
    	
    	$code_status = code_check($code,$username,$password);

       if($code_status == 1){
       
        header("Location:chat.php");
    	$_SESSION['name'] = $username;

       }
       if($code_status == 0 ){ header("Location:action.php?code_status=0"); }
       if($code_status == 2 ){ header("Location:action.php?code_status=2"); }


    }

}


?>
<link rel="stylesheet" type="text/css" href="style/index_style.css">

<div>
<form action="index.php" method="post">
	<input type="text" name="name" placeholder="Alias/Aka">
	<input type="password" name = "password" placeholder="password">
	<p id="bar"><?php include "bar.php"; ?></p>
	<input type="submit" name="submit" value = "Enter the chat">
	<br>
	


</form>

</div>