<?php
     include('menu.html');
     //session_start();
	define('INCLUDEOK', true);

	/******** AUTHENTICATION *******/
	// login / passwords in a PHP array (sha256 for passwords) !
	require_once('./cookie_username.php');

	if(!isset($_SESSION['login']) || !$_SESSION['login']) {
		$_SESSION['login'] = "";
		// form posted ?
		if($_POST['login'] && $_POST['password']){
			$data['login'] = $_POST['login'];
			$data['password'] = hash('sha256', $_POST['password']);
		}
		// autologin cookie ?
		else if($_COOKIE['autologin']){
			$data = unserialize($_COOKIE['autologin']);
			echo $data;
			$autologin = "autologin";
		}
		// check password !
		if ($data['password'] == $user_auth[ $data['login'] ] ) {
			$_SESSION['login'] = $data['login'];
		// set cookie for autologin if requested
			if($_POST['autologin'] === "1"){
				setcookie('autologin', serialize($data));
			}
		}
		else {
			// error message
			$auth_fail = "Error : $autologin authentication failed !";
		}
	}
?>



<html>
<head>
<style>
label {
    display: inline-block;
    width:150px;
    text-align:right;
}
</style>
</head>
<body>

<?php

	// message ?
	if(!empty($auth_fail))
		echo "<p><em>$auth_fail</em></p>";

	// admin ?
	if($_SESSION['login'] === "admin_cookie"){
		echo "<h1> Welcome admin</h1>";
	}
	// user ?
	elseif (isset($_SESSION['login']) && $_SESSION['login'] !== ""){
		echo "<h1> Welcome guest</h1>";
	}
	// not authenticated ?
	else {
?>
<h1>Restricted Access</h1>

<p>Demo mode with test / test !</p>

<form name="authentification" action="admin_cookie.php" method="post">
<fieldset style="width:400px;">
<p>
    <label>Login :</label>
    <input type="text" name="login" value="" />
</p>
<p>
    <label>Password :</label>
    <input type="password" name="password" value="" />
</p>
<p>
    <label>Remember me :</label>
<input type="checkbox" name="autologin" value="1" />
</p>
<p style="text-align:center;">
    <input type="submit" value="Authenticate" />
</p>
</fieldset>
</form>
<?php
	}

	if(isset($_SESSION['login']) && $_SESSION['login'] !== ""){
		echo "<p><a href='disconnect.php'>Disconnect</a></p>";
	}
?>
</body>
</html>
