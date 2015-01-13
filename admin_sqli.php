<?php
	// Reporte toutes les erreurs PHP
	//error_reporting(-1);
	error_reporting(E_ALL);
	require('config.php');
	include('menu.html');
	//session_start();
	mysql_connect($mysql_host,$mysql_user,$mysql_pass);
	mysql_select_db($mysql_db) or die();
?>

<!DOCTYPE html>
<html>
<body>
<h1>Restricted Access</h1>

<?php
	if (isset($_POST['username']) && isset($_POST['passwd'])){
		//SetCookie("galerie", $username.":".base64_encode($passwd));
		$login=$_POST['username'];
		$password=$_POST['passwd'];
		$sql = "SELECT * FROM users WHERE login='".$login."' AND password='".$password."'";
		//$sql = "SELECT * FROM users WHERE login='".$login."' AND passwd='" .utf8_decode(mysql_real_escape_string($password)) . "' LIMIT 1";
		$user = @mysql_fetch_array(mysql_query("SELECT '".$login."' FROM users"));
		$req = mysql_query($sql);
		if (@mysql_num_rows($req)){
			echo "Bienvenu $user[0] ! \n
Voice la liste des utilisateurs ainsi que leurs données personnelles.
Toutefois, les infos sensibles ne sont pas affichées ici, elles ne sont consultables qu'à partir de la base de données mysql sur phpmyadmin !";
			while($data = mysql_fetch_array($req)) {
				echo '<p style="text-align:center;"><b style="color:red";>'.$data['0'].'-->'.$data['login'].'</p>';
      			}
		}
		else{
			echo '<p style=text-align:center"><b style="color:red"> Bad users/passwd</b></p>';
		}
	}
?>

<p style="text-align:center;color:green;text-decoration:underline;font-size:25px;">Page d'authentification admin</p>
<br /><br />
<form action="admin_sqli.php" method="post">
	<dd><label for="login">Login : </label><br /><input type="text" name="username"/><br /><br />
	<label for="password">Password : </label><br /><input type="password" name="passwd"/><br /><br />
	<input type="submit" value="Connect to admin page"><br /></dd>
</form>
</body>
</html>
