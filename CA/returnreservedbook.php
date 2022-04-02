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
                    <a href="index.php">Home</a>
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

                $username = $_SESSION['username'];

                if ($_GET || id['id']) 
                {
                    $id = mysqli_real_escape_string($db, $_GET['id']);
                } 
                else 
                {
                    echo 'Value was not brought over';
                }

                $sql= "DELETE FROM Reservations WHERE ISBN = '$id' AND Username = '$username'";

                $sql2 = "UPDATE Books SET Reserved = 'N' WHERE ISBN = '$id'";


                echo "<pre>\n$sql\n</pre>\n";
                echo "<pre>\n$sql2\n</pre>\n";

                mysqli_query($db,$sql);
                mysqli_query($db,$sql2);

                echo 'Success! You have returned the book. Thank You -<a href="viewreservedbooks.php">Continue...</a>';
            ?>
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>