<?php
 echo "<h1><center>Reset Your Password</center></h1>";
 echo "<form action='resetPasswordCode.php' method='POST'>";
 
 echo "<center>Username</center>";
 echo "<center><input name='txtUsername' type='text'/></center>";

 echo "<br/>";
 echo "<center>OldPassword</center>";
 echo "<center><input name='txtOldPassword' type='password'/></center>";


 echo "<br/><center>New Password</center>";
 echo "<center><input name='txtNewPassword' type='password'/></center>";

 echo "<br/><center>Verify New Password</center>";
 echo "<center><input name='txtNewPassword2' type='password'/></center>";
 
 echo "<br/><center>Security question</center>";
 echo "<center><input name='txtSecure' type='password'/></center>";
 

 echo "<br/><center><input type='submit' value='ok'/></center>";
  echo "<br/>";
 echo "<center><a href='login.php'> <input type='button'    value='back'></a></center>";
 echo "</form>";
?>