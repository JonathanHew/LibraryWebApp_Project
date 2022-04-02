$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
            $password = isset($_SESSION['Password']) ? $_SESSION['Password'] : '';
            $firstname = isset($_SESSION['Firstname']) ? $_SESSION['Firstname'] : '';
            $surname = isset($_SESSION['Surname']) ? $_SESSION['Surname'] : '';
            $addressline1 = isset($_SESSION['Addresline1']) ? $_SESSION['Addresline1'] : '';
            $addressline2 = isset($_SESSION['Addressline2']) ? $_SESSION['Addressline2'] : '';
            $city = isset($_SESSION['City']) ? $_SESSION['City'] : '';
            $telephone = isset($_SESSION['Telephone']) ? $_SESSION['Telephone'] : '';
            $mobile = isset($_SESSION['Mobile']) ? $_SESSION['Mobile'] : '';





<?php  
            if ( isset($_SESSION["error"]) ) 
            {
                echo('<p style="color:red">Error:'.$_SESSION["error"]."</p>\n");
                unset($_SESSION["error"]);
            }//end if
            /* if ( isset($_SESSION["success"]) ) 
            {
                echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");unset($_SESSION["success"]);
            }//end if
            */
            if ( ! isset($_SESSION["account"]) ) 
            { 
?>



 if ( isset($_POST["Firstname"]) && isset($_POST["Surname"]) && isset($_POST["Addresline1"]) && isset($_POST["Addressline2"]) &&isset($_POST["City"]) && isset($_POST["Telephone"]) &&isset($_POST["Mobile"])  ) 
                {
                    $_SESSION['firstname'] = $_POST['Firstname'];
                    $_SESSION['surname'] = $_POST['Surname'];
                    $_SESSION['addressline1'] = $_POST['Addresline1'];
                    $_SESSION['addressline2'] = $_POST['Addressline2'];
                    $_SESSION['city'] = $_POST['City'];
                    $_SESSION['telephone'] = $_POST['Telephone'];
                    $_SESSION['mobile'] = $_POST['Mobile'];
                    echo 'success';
                    //header( 'Location: index.php' ) ;
                    //return;
                } 
                else //if ( count($_POST) > 0 ) 
                {
                    $_SESSION["error"] = "Missing Required Information";
                    echo 'error';
                    //header( 'Location: index.php' ) ;
                    return;
                }
                