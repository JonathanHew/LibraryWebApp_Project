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
                require_once "db.php";
                $query = $_GET['query'];

                

                echo '<table border ="1">'."\n";
                $sql = "SELECT * from Books 
                WHERE 
                Reserved = 'N'
                AND
                (BookTitle LIKE ('%". $query . "%' )
                OR
                Author LIKE ('%". $query . "%' ))";
                
                $run = mysqli_query($db,$sql);
                $foundnum = mysqli_num_rows($run);

                echo $foundnum;
                echo " search result/s for ";
                echo ' " ';
                echo $query;
                echo ' " ';


                if ($foundnum > 0)
                {
                    echo "<tr><th>ISBN</th> 
                          <th>BookTitle</th>
                          <th>Author</th>
                          <th>Edition</th>
                          <th>Year</th>
                          <th>CategoryID</th>
                          <th>Reserved</th></tr>";

                    while ($row = mysqli_fetch_array($run) )
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row["ISBN"]));
                        echo("</td><td>");
                        echo(htmlentities($row["BookTitle"]));
                        echo("</td><td>");
                        echo(htmlentities($row["Author"]));
                        echo("</td><td>");
                        echo(htmlentities($row["Edition"]));
                        echo("</td><td>");
                        echo(htmlentities($row["Year"]));
                        echo("</td><td>");
                        echo(htmlentities($row["CategoryID"]));
                        echo("</td><td>");
                        echo(htmlentities($row["Reserved"]));
                        echo("</td><td>");
                        echo('<a href="reservebook_update.php?id='.htmlentities($row[0]).'">Reserve</a> ');
                        echo("</td></tr>\n");
                    }//end while
                }//end if
                else
                {
                    echo "no matches found";
                }
            ?>
            </table><a href="reservebook.php">Back</a>
            
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>