<!DOCTYPE html>
<html>

    <head>
        <title>READERON:</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="image/png" href="img/r_icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Oswald:300,400,500,600" rel="stylesheet">
    </head>

    <body>

    <?php include('config.php');?>

    <?php include('header.php');?>

    <div id="contact">

        <form id="browse_form_container">
            <input type="text" id="contact_form" name="contact_name" placeholder="Name, Surname">
            <input type="text" id="contact_form" name="contact_email" placeholder="example@gmail.com">
            <textarea id="contact_form" name="message" placeholder="Your message ..." rows="7"></textarea><br>
            <input type="submit" id="send" value="SEND">
        </form> 
        
    </div>

    <?php include('footer.php');?>

    </body>

</html>