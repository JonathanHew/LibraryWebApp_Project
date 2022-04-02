<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
        <title>Jonathans Library ||Reserve</title>
	</head>
	<body>
        <div id="main">
            <header>
                <div id ="logo"></div>
                <nav>
                    <a href="index.php">Home </a>
                    <a href="search.php">Search </a>
                    <a href="reservebook.php">Reserve a Book </a>
                    <a href="viewreservedbooks.php">View Reserved Books </a>
                </nav>
            </header>
            <h1>Jonathans Library</h1>
            <br>
             <?php
                session_start();
                if (!isset($_SESSION["username"]) ) 
                {
            ?>      
                    Please <a href="login.php">Log In</a> to start.
            <?php 
                }
                else
                {
            ?>
                <?php
                require_once "db.php";

                $username = $_SESSION['username'];

                echo '<table border ="1">'."\n";
                $sql = "SELECT ISBN, BookTitle, Author, ReservedDate FROM Reservations JOIN Books USING (ISBN) WHERE Username = '$username' ";
                $result = mysqli_query($db,$sql);
                $foundnum = mysqli_num_rows($result);

                echo "Hello ";
                echo $username;
                echo ". You have ";
                echo $foundnum;
                echo " books reserved. You can return them here.";

                if ($foundnum > 0) 
                {
                    echo "<tr><th>ISBN</th> 
                          <th>BookTitle</th>
                          <th>Author</th>
                          <th>ReservedDate</th></tr>";
                    while ($row = mysqli_fetch_array($result) )
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row["ISBN"]));
                        echo("</td><td>");
                        echo(htmlentities($row["BookTitle"]));
                        echo("</td><td>");
                        echo(htmlentities($row["Author"]));
                        echo("</td><td>");
                        echo(htmlentities($row["ReservedDate"]));
                        echo("</td><td>");
                        echo('<a href="returnreservedbook.php?id='.htmlentities($row[0]).'">Return It</a>');
                        echo("</td></tr>\n");
                    }//end while
                }//end if
                else
                {
                    echo "No reservations found";
                }//end else
            ?>
        </table><a href="index.php">Back</a>
            <?php
                }
            ?>
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>