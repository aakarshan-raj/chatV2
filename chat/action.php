<link rel="stylesheet" type="text/css" href="style/action_style.css">
<div id="action">
<?php

if(isset($_GET['validator'])){

if($_GET['validator'] == 1){
	echo "<p>Are you a retard, write something in username</p>";
}
if($_GET['validator'] == 2){
	echo "<p>How can you imagine to login without a password huh?</p>";
    }
if($_GET['validator'] == 3){
	echo "<p>Username cannot be less than 3</p>"; 
	}
if($_GET['validator'] == 4){
echo "<p>Password cannot be less than 6</p>";	
}

}

if(isset($_GET['status_code'])){

echo "<p>wrong password</p>";

}

elseif(isset($_GET['code_status'])){

	if($_GET['code_status'] == 0){

echo "<p>wrong code, contact gh07t for the code</p>";
}

if($_GET['code_status'] == 2){

echo "</p>code exhausted</p>";
}

}


?>
</div>
