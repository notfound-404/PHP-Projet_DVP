<?php
	include("menu.html");

?>
<form method="post" enctype="multipart/form-data" action="upload.php">
<p>
<input type="file" name="image" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>

<?php
if( isset($_POST['upload']) ){ 				// Si formulaire upload

	$content_dir = 'upload/'; 				// Dossier contenant les images
	$tmp_file = $_FILES['image']['tmp_name']; 	// Nom de l'image
	$size = filesize($_FILES['image']['tmp_name']);// Taille de l'image
	$size_max = 100000;						// Taille max autorisee

	if( !is_uploaded_file($tmp_file) ){
		exit("Le fichier est introuvable.");
	}

	if($taille>$taille_maxi){
		exit("Le fichier est trop gros.");
     }

	$type_file = $_FILES['image']['type'];		// Ici, on check l'extension via le type MIME

	if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') ){
		echo "Type :".$type_file;
		exit("Le fichier n'est pas une image");
	}

    	// on copie le fichier dans le dossier de destination
    $name_file = $_FILES['image']['name'];	//Si extension OK, on déplace l'image

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

	echo "Le fichier a bien été uploadé\n";
	$path_to_file = "http://".$_SERVER[HTTP_HOST]."/upload/".$name_file;
	echo "Vous pouvez le consulter ici : <a href=".$path_to_file."> Image uploadée</a>";
}

?>
