<?php 
include "db.php";

function code_check($code,$username,$password){
global $connection;
$code_check = "SELECT * FROM codes";
$code_result = mysqli_query($connection,$code_check);
	while($row_code = mysqli_fetch_array($code_result)){

   $code_from_db = $row_code['code'];
   $time = $row_code['times_used'];
   if($code === $code_from_db && $time<5){
    $update_time = "UPDATE codes SET times_used = $time+1 WHERE code=$code";
   	$update_result = mysqli_query($connection,$update_time);
    $insert = "INSERT INTO login(username,password,code) VALUES('$username','$password','$code')";
    $result = mysqli_query($connection,$insert);
    return 1;
    break;
   }
   if($code == $code_from_db && $time == 5){
   	return 2;
   	break;
   } 
}
   
return 0;   
}

function user_check($username,$password){
global $connection;
$user_query = "SELECT * FROM login";
$user_result = mysqli_query($connection,$user_query);
while($user_data = mysqli_fetch_array($user_result)){

        $id = $user_data['id'];
		$user_username = $user_data['username'];
		$user_password = $user_data['password'];

		if($user_username == $username && $user_password == $password){
            return 1;
		}
		if($user_username == $username && $user_password !== $password){
			return 0;	
		}
		else{
			return 2;
		}
		
}

}


function clean($connection,$words){

  return strip_tags(mysqli_real_escape_string($connection,$words));

}


function delete_user($user){
    global $connection;
	$query = "DELETE FROM users WHERE username = '$user'";
	$result = mysqli_query($connection,$query);
	if(!$result){ echo "User not deleted"; }
	}

function boom($number_of_messages){
global $connection;
$query_to_get_number_of_messages = "SELECT count(*) FROM chat_data";
$result = mysqli_query($connection,$query_to_get_number_of_messages);
while($row = mysqli_fetch_assoc($result)){
	$nom = $row['count(*)'];
}
$nom =  $nom-$number_of_messages;
return $nom;
}
  function current_time(){
 $hour = getdate(time())['hours'];
$min = getdate(time())['minutes'];

if(strlen($hour)<2){
	$hour = "0".$hour;
}
if(strlen($min)<2){
	$min = "0".$min;
}
$current_time = $hour.":".$min;

return $current_time;
  }

function validator($username,$password){


if (strlen($username) == 0) {
header("Location:action.php?validator=1");
	die();

}
if (strlen($password) == 0) {
header("Location:action.php?validator=2");
	die();

}
if(strlen($username)<3){
	header("Location:action.php?validator=3");
	die();
}

elseif(strlen($password)<6){
	header("Location:action.php?validator=4");
		die();

}


}

?>