<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
        <title>Jonathans Library ||Home</title>
	</head>
	<body>
		<div id ="main">
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
			<h1>Please Log In</h1>
			<?php 
				if ( isset($_SESSION["error"]) ) 
				{
					echo('<p style="color:red">Error:'.
					$_SESSION["error"]."</p>\n");
					unset($_SESSION["error"]);
				}//end if
			?>
			<form method="post">
				<p>Username: <input type="text" name="account" value=""></p>
				<p>Password: <input type="text" name="pw" value=""></p>
				<p><input type="submit" value="Log In" name="submit_clicked" id="submit_clicked"></p>
			</form>
			<p> Dont have an account?</p> 
			<a href= "register.php">Register here!</a>
			 
			<?php
				require_once "db.php";
				session_start();    
				unset($_SESSION["account"]);    
				if(isset($_POST['submit_clicked']))
				{    
					$username = mysqli_real_escape_string($db,$_POST['account']);
				    $password = mysqli_real_escape_string($db,$_POST['pw']);

					if ($username != "" && $password != "")
				    {
						$sql_query = "select count(*) as cntUser from users where username='".$username."' and password='".$password."'";
						$result = mysqli_query($db,$sql_query);          
						$row = mysqli_fetch_array($result);

						$count = $row['cntUser'];

						if($count > 0)
						{
				            $_SESSION['username'] = $username;
				            header('Location: index.php');
				        }//end if
				        else
				        {
				        	echo "Invalid username and/or password";
				        }//end else
					}//end if
				} //end if
			?>
			<footer>
                Site by: Jonathan Hew &copy; 2020
            </footer>
		</div>
	</body>
</html>