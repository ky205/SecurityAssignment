<?php

 // Check verification code
if (isset($_REQUEST['authcode'])) {
    session_start();
    if (strtolower($_REQUEST['authcode']) == $_SESSION['authcode']) {
       
    } else {
        echo "<script>alert('Please enter verification code again');location.href='Login.html'</script>";
    }
    
}

?>



<?php
//Prevent attack from csrf
$csrf = base64_encode(openssl_random_pseudo_bytes(32));
$_SESSION['csrf'] = $csrf;
// server and db connection values
 $servername = "localhost";
 $rootUser="root";
 $db="security";
 $rootPassword ="";

// Create connection
$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

// Prevent attack
$username =htmlentities($_POST['txtUsername'],ENT_QUOTES);
$password =htmlentities($_POST['txtPassword'],ENT_QUOTES);




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
			//Count == 3 means user login failed 3 times. Lock his account for 60 minutes
			if ($userRow['count'] == 3){
				$currentTime = microtime(true);
				if ($currentTime-$_SESSION["start"]>600) {
					mysqli_query($conn,"UPDATE security SET count=0
				WHERE Username='$username'");

				}
				else{			
				echo "<script>alert('Your account has been locked,Please wait 10 minutes');history.back();</script>";
				}
			}
			$userFound = 1; 
			
			
			$getPassword = strval($userRow['Password']);
			
			echo "<br/>";
		

			if (password_verify($password, $getPassword))	
			{
				echo "<center>Hi " .$username. " Welcome to Pizza King!</center>";
			}
			
			else
			{	
				//If login failed, newsession++, until newsession = 3
				if(isset($_SESSION["newsession"]))
					{
  						$_SESSION["newsession"]++;
  							echo "<script>alert('Your account will be lock 10 min if you failed three times');history.back()</script>";
    					
					}
				else
					{
    					$_SESSION["newsession"]=1;
    					echo "<script>alert('Your account will be lock 10 min if you failed three times');history.back()</script>";
    					
					}

	//If user failed three time, set count = 3 in database
	if($_SESSION["newsession"] == 3)
				{
					mysqli_query($conn,"UPDATE security SET count=3
				WHERE Username='$username'");
					
					echo $_SESSION["newsession"];
					$_SESSION["start"] = microtime(true);
					$_SESSION["newsession"] = 0;
					
				    
					
					echo "<script>alert('Your account has been locked,please wait 10 min ');history.back()</script>";
				}






			}
			
		}
	}
}
if ($userFound == 0)
{
	echo "<script>alert('The user was not found in our database');history.back()</script>";
}
 
 ?>
