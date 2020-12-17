<?php
 echo "<h2><center>Customer Register</center></h2>";

 echo "<form action='registerCode.php' method='POST'>";
 
 echo "<b><center>Username</center></b>";
 echo "<center><input name='txtUsername' type='text'/></center>";
 
 echo "<br/><center>Password</center>";
 echo "<center><input name='txtPassword' type='password'/></center>";
 
 echo "<br/><center>Verify your Password</center>";
 echo "<center><input name='txtPassword2' type='password'/></center>";
 echo "<br/><center>Address</center>";

 echo "<center><input name='txtAddress' type='text'/></center>";
 
 echo "<br/><center>Date of birth </center>";
 echo "<center><input name='txtBirth' type='text'/></center>";
 
 echo "<br/><center>Email</center>";
 echo "<center><input name='txtEmail' type='text'/></center>";
 
  echo "<br/><center>Security Question</center>";
  echo "<center>Where is your hometown</center>";
 echo "<center><input name='txtSecurity' type='text'/></center>";

 echo "<br/><center><input type='submit' value='Register'/></center>";

 echo "<br/>";
  echo "<center><a href='login.php'> <input type='button'    value='Back'></a></center>";


 echo "</form>";
?>