
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

    <div id="browse">

        <form action="browse.php" id="browse_form_container" method="GET">
            <input type="text" id="browse_form" name="searchauthor" placeholder="Search by author...">
            <input type="text" id="browse_form" name="searchtitle" placeholder="...or title">
            <input type="submit" id="submit" value="SEARCH">
        </form> 

        <div id="page_break">
        </div>

        <div id="search_results">

            <?php

                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
                    echo "Error! Could not connect: " . $db->connect_error;
                    printf("<br><a href=index.php>Return to Home Page </a>");
                    exit();
                }

                $searchtitle = "";
                $searchauthor = "";

                if (isset($_GET) && !empty($_GET)) {
                    $searchtitle = trim($_GET['searchtitle']);
                    $searchauthor = trim($_GET['searchauthor']);
                }

                $searchtitle = addslashes($searchtitle);
                $searchauthor = addslashes($searchauthor);

                # The query. Users are allowed to search on title, author, or both

                $query = "SELECT * FROM books";
                if ($searchtitle && !$searchauthor) { // Title search only
                    $query = $query . " where title like '%" . $searchtitle . "%'";
                }
                if (!$searchtitle && $searchauthor) { // Author search only
                    $query = $query . " where author like '%" . $searchauthor . "%'";
                }
                if ($searchtitle && $searchauthor) { // Title and Author search
                    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'";
                }

                 

                $stmt = $db->prepare($query);
                $stmt->bind_result($bookid, $title, $author, $reserved);
                $stmt->execute();

                echo '<table bgcolor="#dddddd" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserved ?</td> <td>Reserve</td> </b> </tr>';
                while ($stmt->fetch()) {
                    if($reserved == 0)
                        $reserved = 'NO';
                    else $reserved = 'YES';

                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td><td> $reserved </td>";
                    echo '<td><a href="reserveBook.php?reservation=' . urldecode($title) . '&bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            ?>

        </div>

    </div>

    <?php include('footer.php');?>

    </body>

</html>
