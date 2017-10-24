<!DOCTYPE html>
<html>

    <head>
        <title>READERON:</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Oswald:300,400,500,600" rel="stylesheet">
    </head>

    <body>

    	<div id="moto">FUEL YOUR CURIOSITY</div>
    	<div id="header">
    	</div>
    	<div id="menu">
    		<ul>
    			<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">HOME</a></li>
    			<li><a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>" href="about.php">ABOUT US</a></li>
    			<li><a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>" href="browse.php">BROWSE BOOKS</a></li>
    			<li><a class="<?php echo ($current_page == 'books.php') ? 'active' : NULL ?>" href="books.php">MY BOOKS</a></li>
    			<li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">CONTACT</a></li>
                <li><a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">GALLERY</a></li>
    		</ul>
    	</div>
    </body>

</html>
