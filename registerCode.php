<?php
//Prevent attack from csrf
session_start();
$csrf = base64_encode(openssl_random_pseudo_bytes(32));
$_SESSION['csrf'] = $csrf;
 $servername = "localhost";
 $rootuser="root";
 $db="security";
 $rootpassword ="";
// Create connection
$conn = new mysqli($servername, $rootuser, $rootpassword, $db);
// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

//Prevent attack
$username= htmlentities($_POST['txtUsername'],ENT_QUOTES);
$birth =htmlentities($_POST['txtBirth'],ENT_QUOTES);
$address = htmlentities($_POST['txtAddress'],ENT_QUOTES);
$email = htmlentities($_POST['txtEmail'],ENT_QUOTES);
$security = htmlentities($_POST['txtSecurity'],ENT_QUOTES);
$password =htmlentities( $_POST['txtPassword'],ENT_QUOTES);
$password2 = htmlentities($_POST['txtPassword2'],ENT_QUOTES);

if($password != $password2){
	{
 echo "<script>alert('Please check your password');history.back();</script>";
 exit();
}

}

// Hash password use BCRYPT
// for Argon2i you will just need to repalce BCRYPT with Argon2i
$hash = password_hash ($password , PASSWORD_BCRYPT);
//  INSERT query   , check hash variable in the Values statement 
$userQuery = "INSERT INTO security (Username, Password, Birth, Address, Email,Security) Values('$username', '$hash', '$birth', '$address', '$email', '$security')";

if ($conn->query($userQuery) == TRUE)
{
 echo "<script>alert('Insert done');location.href='login.php';</script>";
}
else
{
	echo "not successfull";
}
?>

