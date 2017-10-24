<!DOCTYPE html>
<html>

    <head>
        <title>READERON:</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="image/png" href="img/r_icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900|Oswald:300,400,500,600" rel="stylesheet">
    </head>

    	<?php

	    include ("config.php");

	    include('header.php');

    	?>

    <body>

    <div id="upload_container">	

	    <?php

		$dirname = "uploadedfiles/";
		$images = glob($dirname."*.*");

		foreach($images as $image) {
		    echo '<img id="upload" src="'.$image.'" /><br />';
		}

		?>

	</div>

	<?php
		include ("footer.php")
	?>

	</body>

</html>