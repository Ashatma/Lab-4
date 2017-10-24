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


    $bookid = trim($_GET['bookid']);
    echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

    $bookid = trim($_GET['bookid']);      // From the hidden field
    $bookid = addslashes($bookid);

    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

        if ($db->connect_error) {
            echo "Error! Could not connect: " . $db->connect_error;
            printf("<br><a href=index.php>Return to Home Page </a>");
            exit();
        }
        
       echo "Book with the ID $bookid reserved!";

        // Prepare an update statement and execute it
        $stmt = $db->prepare("UPDATE books SET reserved=1 WHERE bookid = ?");
        $stmt->bind_param('i', $bookid);
        $stmt->execute();
        printf("<br><br><a href=browse.php>Browse more books</a>");
        printf("<br><a href=books.php>Return to My Books </a>");
        printf("<br><a href=index.php>Return to Home Page </a>");
        exit;
    ?>

<?php include("footer.php"); ?>

</html>
