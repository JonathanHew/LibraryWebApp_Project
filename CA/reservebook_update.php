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
                require_once "db.php";

                $id = mysqli_real_escape_string($db, $_GET['id']);
                $dt1=date("Y-m-d");
                $username = $_SESSION["username"];

                
                $sql = "UPDATE Books SET Reserved = 'Y' WHERE ISBN = '$id'";

                $sql2 = "INSERT INTO Reservations (ISBN, Username, ReservedDate) VALUES ('$id', '$username', '$dt1' )";

                echo "<pre>\n$sql\n</pre>\n";
                echo "<pre>\n$sql2\n</pre>\n";

                mysqli_query($db,$sql);
                mysqli_query($db,$sql2);

                echo 'Updated! You have reserved this book. Enjoy -<a href="reservebook.php">Continue...</a>';


            ?>
            

            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>