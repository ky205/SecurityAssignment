<?php

session_start();
$csrf = base64_encode(openssl_random_pseudo_bytes(32));
$_SESSION['csrf'] = $csrf;
// server and db connection values
 $servername = "localhost";
 $rootUser="root";
 $db="security";
 $rootPassword ="";

// Create connection
$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

// values come from user entry in webform
$username =htmlentities($_POST['txtUsername'],ENT_QUOTES);
$oldPassword =htmlentities($_POST['txtOldPassword'],ENT_QUOTES);
$newPassword =htmlentities($_POST['txtNewPassword'],ENT_QUOTES);
$newPassword2 =htmlentities($_POST['txtNewPassword2'],ENT_QUOTES);
$security =htmlentities($_POST['txtSecure'],ENT_QUOTES);

if($newPassword != $newPassword2){
	{
 echo "<script>alert('Please check your password');history.back();</script>";
 exit();
}}


$hash = password_hash ($newPassword , PASSWORD_BCRYPT);

// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
// query
$userQuery = "SELECT * FROM security";
$userResult = $conn->query($userQuery);

// flag type variable 
$userFound = 0;

echo "<table border='1'>";
if ($userResult->num_rows > 0)
{
  while($userRow = $userResult->fetch_assoc()) 
    {
		if ($userRow['Username'] == $username)
		{
			if($userRow['Security']!=$security){
				echo "<script>alert('Invalid security answer');history.back();</script>";
 				exit();
			}
			$userFound = 1; 
			
			
			$getPassword = strval($userRow['Password']);
			echo $getPassword;
			echo "<br/>";
		
			   echo "<br/>";
			   // If the password verify is either printing wrong or success all the time
			   // check the length of the password in the database. It will not be storing all 
			   // the hashes characters. Change it to something like 200 characters





			if (password_verify($oldPassword, $getPassword))	
			{
				mysqli_query($conn,"UPDATE security SET Password='$hash'
				WHERE Username='$username'");
				echo "<script>alert('You have changed your password');location.href='Login.php'</script>";
			}
			else
			{
				echo "<script>alert('The old password is incorrect');history.back()</script>";
			}
			
		}
	
	}
}
if ($userFound == 0)
{
	echo "This user was not found in our Database";
}
 
 ?>

