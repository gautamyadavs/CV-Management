<?php
    //Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
    {
        //Connect to mysql server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","cv_management");
        $link = mysqli_connect('localhost', 'root', '', 'cv_management');
        /*Check link to the mysql server*/
        if(!$link)
        {
            die('Failed to connect to server: ' . mysqli_error());
        }
        /*Select database*/
        $db = mysqli_select_db($link,'cv_management');
        if(!$db)
        {
            die("Unable to select database");
        }
    }
   if(isset($_SESSION['shortlist']))
	$rid= $_SESSION['shortlist'];
			else
				$rid= $_SESSION['rid'];    
			$mid=$_POST['remove'];
    $query = 'DELETE FROM shortlist WHERE rid='.$rid.' AND mid='.$mid;
    $result = mysqli_query($link,$query);
?>
<html>
<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="companyshortlisted.php";
            }
            
            setTimeout('Redirect()', 1);
         //-->
      </script>
    </html>