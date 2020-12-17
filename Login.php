
<?php



 echo "<h1><center>Welcome to Pizza King</center></h1>";
 echo "<h3><center> Login </center></h3>";
 echo "<form action='loginCode.php' method='POST'>";
 echo "<center>Username</center>";
 echo "<center><input name='txtUsername' type='text'/></center>";
 echo "<br/>";
 echo "<center>Password</center>";
 echo "<center><input name='txtPassword' type='password'/></center>";
 echo "<br/>";
 echo "<br/>";
 ?>



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>Enter correct characters</title>
</head>
<body>
<form method="post" action="./form.php">
    <p>
        <center><img id="captcha_img" border="1" src="./captcha.php?r=<?php echo rand(); ?>" width=100 height=30></center>
        <a href="javascript:void(0)"
           onClick="document.getElementById('captcha_img').src='./captcha.php?r='+Math.random()"><center>Change</center></a>
    </p>
    <p><center>Enter correct characters：</br><input type="text" name="authcode" value=""/><center></p>
    
</form>
</body>
</html>
<?php


 echo "<center><br/><input type='submit' value='Login'/></center>";
 echo "<br/>";
 echo "<center><a href='register.php'> <input type='button'    value='register'></a></center>";
 echo "<br/>";
  echo "<center><a href='rePassword.php'> <input type='button'    value='Updating password'></a></center>";


 echo "</form>";
?>




