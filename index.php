<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$clean_page = str_replace("php://filter", "", $page); // Uber Anti php://filter Filter
		include($clean_page);
	}
	else
		include('menu.html');
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Site projet tutoré LPRESIR</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<p style="text-align:center"><img src="images/logo.jpg" alt="logo" height="100" width="230"></p>
<p style="text-align:center;color:green;text-decoration:underline;font-size:25px;">Bienvenue sur la page d'accueil</p>
<br /><br />
<dd><dd>Cette page permet d'annoncer les articles
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

</body>
</html>

