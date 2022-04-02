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
                    <a href="reservesearchbook_form.php">Search by Book or Author to Reserve </a>
                    <br><br>
                    <a href="reservecategorybook_form.php">Search by Category to Reserve </a>
            <?php
                }
            ?>
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>