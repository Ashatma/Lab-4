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

        <br>

        <div class="container">

            <?php

                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); 

                if ($db->connect_error) {
                    echo "Error! Could not connect: " . $db->connect_error;
                    printf("<br><a href=home.php>Return to Home Page </a>");
                    exit();
                }

                $sql = "SELECT bookid, title, author FROM books WHERE reserved=1";
                $result = $db->query($sql);

                if ($result!= true){
                    echo "Error: $sql </br> $db->error";
                }
                echo '<table cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Return</td> </b> </tr>';

                while ($book = $result->fetch_assoc()) {
                    $bookid = $book['bookid'];
                    echo "<tr>";
                    echo "<td>" .$book["title"] . "</td><td>" . $book["author"] . "</td>";
                    echo '<td><a href="returnBook.php?return=' . urlencode($title) . '&bookid=' . urlencode($bookid) . '"> Return </a> </td>';
                    echo "</tr>";
                 }
                 echo "</table>";
            ?>

            <br>

            <?php include("footer.php"); ?>

            
        </div>

    </body>

</html>