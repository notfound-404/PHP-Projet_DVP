<?php
     // Reporte toutes les erreurs PHP
	error_reporting(-1);
	include('menu.html');
	//session_start();

	$header = "<html><head><title>Projet tuteuré XPATH injection</title></head><body><div>";
	$footer = "</div></body></html>";
	if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
		$xml = simplexml_load_file('xpath_username.xml');
		$xpath = "//user[username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "']";

		$element = $xml->xpath($xpath);
		$user = $element[0]->username;
		if( count($element) > 1 ){
			echo $header;
			echo "<h1>User:".$user.", vous etes authentifie</h1>";
			echo $footer;
		} else {
			echo $header;
			echo "<h1>Authentification impossible. Username/password incorrect !</h1><br />";
?>
<form action="" method="POST">
	<label for="username">Username</label>
	<input type="text" id="username" name="username" />
	<br />
	<label for="password">Password</label>
	<input type="password" id="password" name="password" />
	<br />
	<input type="submit" value="Login" />
</form>
<?php
		echo $footer;
		}
	}else{
		echo $header;
?>
			<form action="" method="POST">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" />
				<br />
				<label for="password">Password</label>
				<input type="password" id="password" name="password" />
				<br />
				<input type="submit" value="Login" />
			</form>
<?php
		echo $footer;
	}
?>
