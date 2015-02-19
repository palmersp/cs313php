<form action="/" method="post">
  <input type="text" name="username" value="<?php if(isset($username)){ echo $username;} ?>">
  <input type="password" name="password" value="<?php if(isset($password)){ echo $password;} ?>">
  <input type="submit" name="action" value="Submit">
</form>
