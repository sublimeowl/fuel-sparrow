<?= (isset($errors))?$errors:'' ?>
<form method="post" action="" />
<b>Username</b><br /><input type="text" name="username" id="username"  value="<?= isset($username)?$username:'' ?>"/><br />
<b>Password</b><br /><input type="password" name="password" id="password" /><br />
<input type="submit" value="Login" />
</form>
