<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
        <title>Jonathans Library ||Home</title>
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
                require_once "db.php";

                if ( isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Firstname']) && isset($_POST['Surname']) && isset($_POST['Addresline1']) && isset($_POST['Addressline2']) && isset($_POST['City']) && isset($_POST['Telephone']) && isset($_POST['Mobile']) )
                {
                    $u = $_POST['Username'];
                    $p = $_POST['Password'];
                    $rp = $_POST['RePassword'];
                    $f = $_POST['Firstname'];
                    $s = $_POST['Surname'];
                    $a1 = $_POST['Addresline1'];
                    $a2 = $_POST['Addressline2'];
                    $c = $_POST['City'];
                    $t = $_POST['Telephone'];
                    $m = $_POST['Mobile'];

                    $error_count = 0;

                    $sql = "SELECT * FROM Users WHERE Username = '$u'";
                    $result = mysqli_query($db, $sql);
                    $username_count = mysqli_num_rows($result);

                    if ($username_count  > 0)
                    {
                        echo "Error. This username already exists.\n";
                        $error_count = $error_count + 1;
                    }//end if

                    if ($u == '' || $p == '' || $f == '' || $s == '' || $a1 == '' || $a2 == ''|| $c == '' || $t == '' || $m == '')
                    {
                        echo "Error. Please dont leave any details blank.\n";
                        $error_count = $error_count + 1;
                    }

                    if (!(strlen($p) == 6))
                    {
                        echo "Error. Password should be 6 charachters long only.\n";
                        $error_count = $error_count + 1;

                    }//end if
                    if (! ($p == $rp))
                    {
                        echo "Error. Passwords did not match\n";
                        $error_count = $error_count + 1;
                    }//end else if
                    if (!(is_numeric($m) == 1))
                    {
                        echo "Error. Mobile number should only contain numbers\n";
                        $error_count = $error_count + 1;
                    }//end else if
                    if (!(strlen($m) == 10))
                    {
                        echo "Error. Mobile number should be 10 digits long\n";
                        $error_count = $error_count + 1;
                    }//end else if


                    if ($error_count == 0)
                    {
                        $sql = "INSERT INTO Users ( Username, Password, Firstname, Surname, Addresline1, Addressline2, City, Telephone, Mobile ) VALUES ( '$u', '$p', '$f', '$s', '$a1', '$a2', '$c', '$t', '$m')";
                        echo "<pre>\n$sql\n</pre>\n";
                        mysqli_query($db,$sql);
                        echo 'Success -<a href="index.php">Continue...</a>';
                    }
                    else
                    {
                        echo 'Please try again -<a href="register.php">Here</a>';
                    }//end else
                    return;
                }//end if 
            ?>

            <p> Register a new account </p>
            <form method ="post">
            <p> Username:
                <input type ="text" name = "Username">
            </p>
            <p> Password:
                <input type ="text" name = "Password">
            </p>
            <p> Re-enter Password:
                <input type ="text" name = "RePassword">
            </p>
            <p> Firstname:
                <input type ="text" name = "Firstname">
            </p>
            <p> Surname:
                <input type ="text" name = "Surname">
            </p>
            <p> Addressline1:
                <input type ="text" name = "Addresline1">
            </p>
            <p> Addressline2:
                <input type ="text" name = "Addressline2">
            </p>
            <p> City:
                <input type ="text" name = "City">
            </p>
            <p> Telephone:
                <input type ="text" name = "Telephone">
            </p>
            <p> Mobile:
                <input type ="text" name = "Mobile">
            </p>
            <p><input type ="submit" value = "Register"/><a href="index.php">Cancel</a></p>
        </form>
            <footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
        </div>
    </body>
</html>