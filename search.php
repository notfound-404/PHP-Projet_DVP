<?php
     include('menu.html');
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Site projet tutoré LPRESIR</title>
</head>
<body>


<?php
	if(isset($_GET['recherche']))
		echo "Recherche effecutee: ".$_GET['recherche'];
	echo '<form method="GET"><input type="text" name="recherche" /> <input type="submit" value="rechercher" /></form>';
?>

<p style="text-align:center"><img src="images/logo.jpg" alt="logo" height="100" width="230"></p>
<p style="text-align:center;color:green;text-decoration:underline;font-size:25px;">Bienvenue sur la page d'accueil</p>
<br /><br />

<dd><dd>
* Faites vos recherches sur cette page
</dd>
<br /><br /><br />
</body>
</html>
