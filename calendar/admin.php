<form action="/" method="post">
  <label for="username">User Name</label>
  <input type="text" name="username" value="<?php if(isset($username)){ echo $username;} ?>">
  <label for="password">Password</label>
  <input type="password" name="password" value="<?php if(isset($password)){ echo $password;} ?>">
  <input type="submit" name="action" value="Submit">
</form>
