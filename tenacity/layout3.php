<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resume</title>
<link type="text/css" rel="stylesheet" href="assets/layoutnew/css/green.css" />
<link type="text/css" rel="stylesheet" href="assets/layoutnew/css/print.css" media="print"/>
</head>
<?php
    //Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
        //Connect to mysqli server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","cv_management");
        $link = mysqli_connect('localhost', 'root', '', 'cv_management');
        /*Check link to the mysqli server*/
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
   if(isset($_POST['seecv']))
	   	$mid= $_POST['seecv'];
else
    $mid = $_SESSION['mid'];
	
    /*Create query*/
    $query = 'SELECT * FROM member WHERE mid='.$mid;
	$query12 = 'SELECT email FROM register WHERE mid='.$mid;
    $query1 = 'SELECT * FROM project WHERE mid='.$mid;
    $query2 = 'SELECT * FROM achievements WHERE mid='.$mid;
    $query3 = 'SELECT * FROM languages,knows WHERE languages.lid = knows.lid AND knows.mid='.$mid;
    $query4 = 'SELECT * FROM interests WHERE mid='.$mid;
    $query5 = 'SELECT * FROM experience WHERE mid='.$mid;
    $query6 = 'SELECT * FROM courses WHERE mid='.$mid;
    $query8 = 'SELECT * FROM publications WHERE mid='.$mid;
    $query9 = 'SELECT skill FROM skills,has WHERE skills.sid = has.sid AND has.mid='.$mid;
    $query10 = 'SELECT * FROM education WHERE mid='.$mid;
    $query11 = 'SELECT * FROM contacts WHERE mid='.$mid;
    /*Execute query*/
    $result=mysqli_query($link,$query);	
    $result1=mysqli_query($link,$query1);	
    $result2=mysqli_query($link,$query2);	
    $result3=mysqli_query($link,$query3);	
    $result4=mysqli_query($link,$query4);	
    $result5=mysqli_query($link,$query5);	
    $result6=mysqli_query($link,$query6);	
    $result8=mysqli_query($link,$query8);	
    $result9=mysqli_query($link,$query9);	
    $result10=mysqli_query($link,$query10);	
    $result11=mysqli_query($link,$query11);	
    $result12=mysqli_query($link,$query12);	
	$row = mysqli_fetch_assoc($result);
	$row12 = mysqli_fetch_assoc($result12);
	
echo '<body>
<!-- Begin Wrapper -->
<div id="wrapper" >
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid"  style="color:#5d5d5d; background: white; box-shadow: 0px 0px 50px #888888;">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="uploads/'.$row['profile_pic'].'.jpg" alt="Profile picture" width="200px" style="border-radius:20px"/>
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 >'.$row['fname'].  '<br /><br />'.$row['lname'].'<br/><br><br>
              <span>Gender: '.$row['gender'].'<br /><br> '.$row['dob'].'</span></h1><br/>
            <ul>
                <li><b>Email:</b>'.$row12['email'].'</li>';
            if($row['linked_in']!=NULL)
              echo '<li><b>Phone:</b> phone number</li>';
            if($row['website']!=NULL)
                echo '<li><b>Website:</b>'.$row['website'].'</li>';
            if($row['linked_in']!=NULL)
                echo '<li><b>Linked In:</b>'.$row['linked_in'].'</li>';
            if($row['facebook']!=NULL)
                echo '<li><b>Facebook:</b>'.$row['facebook'].'</li>';
            if($row['twitter']!=NULL)
                echo '<li><b>Twitter:</b>'.$row['twitter'].'</li>
            </ul>
          </div>
          <!-- End Personal Information -->
          
        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2>ACHIEVEMENT</h2>
          <div class="content">
            <h3>date</h3>
            <p>Achievement title<br />
              <em>Description</em></p>
          </div>
        </div>
        <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2>EDUCATION</h2>
          <div class="content">
            <h3>st year - end yr</h3>
            <p>Organisation<br />
                <em>Degree , Stream , <a href="certificate.html">Certificate</a></em></p>
          </div>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>EXPERIENCE</h2>
          <div class="content">
            <h3>st date - end date</h3>
            <p>job position<br />
              <em>organisation, status </em></p>
            <ul class="info">
              <li>location.</li>
              <li>job description.</li>
            </ul>
          </div>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <ul class="skills">
              <li>Photoshop</li>
              <li>Illustrator</li>
              <li>InDesign</li>
              <li>Flash</li>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
        <div class="entry">
        <h2>PROJECTS</h2>
        	  <div class="content">
            <h3>st date - end date</h3>
            <p>project name<br />
              </p>
            <ul class="info">
                <li><em><a href="certificate.html">Link</a></em></li>
              <li>project description.</li>
            </ul>
          </div>
        </div>
           <div class="entry">
        <h2>COURSES</h2>
        	  <div class="content">
            <h3>DATE</h3>
            <p>course name<br />
              </p>
            <ul class="info">
                <li><em><a href="certificate.html">Certificate link</a></em></li>
              <li>course description.</li>
            </ul>
          </div>
        </div>
          <div class="entry">
        <h2>PUBLICATIONS</h2>
        	  <div class="content">
            <h3>PUB DATE</h3>
            <p>PUBLICATION NAME, SUBJECT<br />
              </p>
            <ul class="info">
                <li><em><a href="certificate.html">Link</a></em></li>
              <li>description.</li>
            </ul>
          </div>
        </div>
          <div class="entry">
          <h2>LANGUAGES KNOWN</h2>
          <div class="content">
            <ul class="skills">
              <li>ENGLISH</li>
              <li>HINDI</li>
            </ul>
          </div>
        </div>
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<!-- End Wrapper -->
</body>';
?>
</html>
