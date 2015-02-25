<form action="/" method="post">
  <label for="username">User Name</label><br>
  <input type="text" name="username" value="<?php if(isset($username)){ echo $username;} ?>" REQUIRED><br>
  <label for="password">Password</label><br>
  <input type="password" name="password" value="<?php if(isset($password)){ echo $password;} ?>" REQUIRED><br>
  <input type="submit" name="action" value="Submit">
</form>
