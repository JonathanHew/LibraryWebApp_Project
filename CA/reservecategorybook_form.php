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
                $sql = "select * from Categories";
                $result = $db->query($sql);

                echo '<table border="1">'."\n";

                if($result->num_rows > 0)
                {
                    echo "<tr><th>CategoryID</th> 
                          <th>CategoryDesc</th>
                          <th>Search</th></tr>";
                    while ($row = mysqli_fetch_array($result)) 
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row["CategoryID"]));
                        echo("</td><td>");
                        echo(htmlentities($row["CategoryDesc"]));
                        echo("</td><td>");
                        echo('<a href="reservecategorybook_result.php?id='.htmlentities($row[0]).'">Search</a> ');
                        

                    }//end while 
                }//end if
            ?>
        </table><a href="reservebook.php">Back</a>
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>