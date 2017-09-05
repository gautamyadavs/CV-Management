<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <title>CV</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
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
	
echo '<body style="background=#3d3d3d">
    
    <div class="col-md-12"><p><br><br></p></div>
    
<div class="col-md-8 col-md-offset-2" style="background:#f3f3f3 ;color:#5d5d5d; box-shadow: 0px 0px 200px #888888;">    
    
<section class="mbr-section mbr-section-hero mbr-section-full header2 mbr-after-navbar" id="header2-1" style=";">

    

    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">

            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up">
                        
                        <div class="mbr-table-cell col-md-5 content-size text-xs-center text-md-right">

                            <h3 class="mbr-section-title display-2" style="color:#3d3d3d ;color:#5d5d5d">'.$row['fname'].' '.$row['lname'].'</h3>

                            <div class="mbr-section-text">
                                <p><h3 style="color:#5d5d5d">'.$row['gender'].'  <br>  '.$row['dob'].'</h3></p>
                            </div>

                        </div>
                        <div class="mbr-table-cell mbr-valign-top mbr-left-padding-md-up col-md-7 image-size" >';
                        if($row['profile_pic']!=NULL)
                            echo '<div class="mbr-figure"><img src="uploads/'.$row['profile_pic'].'.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" /></div>';
                        else
                            echo '<div class="mbr-figure"><img src="uploads/profilepic.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" /></div>';
                        echo '</div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mbr-section article mbr-section__container" id="content1-7" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>WORK EXPERIENCE</center></h4><hr>';
             while($row5 = mysqli_fetch_assoc($result5)){
             echo '<div class="item"><hr>
                    <div class="meta">
                        <div class="upper-row">
                            <h3>'.$row5['title'].'</h3>
                            <div><h5>'.$row5['join_date'].' - '.$row5['end_date'].'</h5></div>
                        </div><!--//upper-row-->
                        <div><h5>'.$row5['organization'].', '.$row5['location'].'</h5></div>
                    </div><!--//meta-->
                    <div>
                        <p>'.$row5['description'].'<br> <a href="#workcertificate" data-toggle="modal">IssuerCertificate</a>.</p>  
                        
                    </div><!--//details-->
                </div><!--//item-->';
			 }
			 echo '
            
            </div>
        </div>
    </div>

</section>
    
	<!--certificate for work modal-->
       <div class="donate-modal modal fade" id="workcertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center>'.'<img src="uploads/'.$row5['validation'].'" width="250" height="250">'.'</center>
                                
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button></center><br>
  </div>
</div>
                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
				
				
echo '<section class="mbr-section article mbr-section__container" id="content1-7" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>ACHIEVEMENTS</center></h4><hr>';
            while($row2 = mysqli_fetch_assoc($result2)){
             echo '<div class="item"><hr>
                    <div class="meta">
                        <div class="upper-row">
                            <h3>'.$row2['title'].'</h3>
                            <div><h5>'.$row2['date'].'<br> <a href="#issuercertificate" data-toggle="modal">Issuer Certificate</a></h5></div>
                        </div><!--//upper-row-->
                    </div><!--//meta-->
                    <div>
                        <p>'.$row2['description'].'.</p>  
                        
                    </div><!--//details-->
                </div><!--//item-->';
			}
				echo '
            
            </div>
        </div>
    </div>

</section> 
    
        <div class="donate-modal modal fade" id="issuercertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center><img src="uploads/'.$row2['issuer'].'" width="250" height="250"></center>
                                
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button></center><br>
  </div>
</div>
                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
			


    
    echo '<section class="mbr-section article mbr-section__container" id="content1-7" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>PROJECTS</center></h4><hr>';
            while($row1 = mysqli_fetch_assoc($result1)){
                echo '<div class="item"><h3>'.$row1['pname'].'</h3>
                    
                    <p><div><h5>'.$row1['sdate'].' - '.$row1['edate'].' <br>'.$row1['pstatus'].' <br><a target="blank" href="'.$row1['plink'].'">Link to Project</a></h5></div></p><br>
                    <span>'.$row1['summary'].'.</span>
                    
                    
                </div><!--//item-->';
			}
				echo '
            
            </div>
        </div>
    </div>';
			

echo '</section>  

<section class="mbr-section article mbr-section__container" id="content1-6" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>EDUCATION</center></h4><hr>';
            while($row10 = mysqli_fetch_assoc($result10)){
             echo '<div class="item">
                    <h4>'.$row10['degree'].', '.$row10['stream'].'<br><a href="#educertificate" data-toggle="modal">Certificate</a></h4>
                    <h5>'.$row10['institute'].'</h5>
                    <div>'.$row10['start_year'].' - '.$row10['end_year'].'</div>
                </div>';
			}
				echo '
            </div>
        </div>
    </div>

</section>

    <div class="donate-modal modal fade" id="educertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro">
                                <br><h1 style="color:#3d3d3d"><center>Certificate</center></h1><br>
                            <center><img src="uploads/'.$row10['marksheet'].'" width="250" height="250"></center>
                                
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button></center><br>
  </div>
</div>
                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
			


    
    echo '<section class="mbr-section article mbr-section__container" id="content1-6" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>COURSES</center></h4><hr>';
            while($row6 = mysqli_fetch_assoc($result6)){
              echo '<div class="item">
                    
                  <span><h3>'.$row6['title'].'</h3></span>
                    <p><div>'.$row6['date'].'<br><a href="#certificate" data-toggle="modal">Certificate</a></div></p><br>
                    <span>'.$row6['description'].'.</span>
                    
                </div><!--//item-->';
			}
     echo '       </div>
        </div>
    </div>

</section>

    <div class="donate-modal modal fade" id="certificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center>src="uploads/'.$row6['certificate'].'" width="250" height="250"></center>
                                
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button></center><br>
  </div>
</div>
                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
			



echo '<section class="mbr-section article mbr-section__container" id="content1-6" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>PUBLICATIONS</center></h4><hr>';
			 while($row8 = mysqli_fetch_assoc($result8)){
             echo ' <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3>'.$row8['subject'].'</h3>
                            <div><H5>'.$row8['pubdate'].' , <a href="#publicationcertificate" data-toggle="modal">Certificate</a></H5></div>
                        </div><!--//upper-row-->
                        <div><H5>'.$row8['organization'].', Subject:'.$row8['subject'].'</H5></div>
                    </div><!--//meta-->
                    <div>
                        <p>'.$row8['description'].'.</p>  
                        
                    </div><!--//details-->
                </div><!--//item-->';
			 }
            echo '</div>
        </div>
    </div>

</section>

  <div class="donate-modal modal fade" id="publicationcertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center><img src="uploads/'.$row8['profile_pic'].'" width="250" height="250"></center>
                                
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button></center><br>
  </div>
</div>
                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
	  



echo '<section class="mbr-section article mbr-section__container" id="content1-8" style="; padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><h4><center>PERSONAL INTERESTS</center></h4><hr>
                <p>
                
				<ul class="list-unstyled interests-list">';
					while($row4 = mysqli_fetch_assoc($result4)){
                    echo '<li>'.$row4['interest'].'</li><br>';}
                    
               echo ' </ul>
                </p>
            </div>
        </div>
    </div>

</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-f" style="; padding-top: 90px; padding-bottom: 90px;">
    
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><span class="mbri-info mbr-iconfont mbr-iconfont-contacts1"></span></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-4">
                
                <p style="color:#3d3d3d"><strong>Contacts</strong><br>
                    
                    Email:' .$row12['email'].'<br>';
                    if($row['website']!=NULL)
                    echo 'Website: <a href="#" target="_blank">'.$row['website'].'</a><br>';
                    if($row['linked_in']!=NULL)
                    echo 'LinkedIn: <a href="#" target="_blank">'.$row['linked_in'].'</a><br>';
                    if($row['facebook']!=NULL)
                    echo 'Facebook: <a href="#" target="_blank">'.$row['facebook'].'</a><br>';
                    if($row['twitter']!=NULL)
                    echo 'Twitter: <a href="#" target="_blank">'.$row['twitter'].'</a><br>';
                    echo 'Phone:';  while($row11 = mysqli_fetch_assoc($result11)){echo $row11['contact'].'<br>';}
                echo '</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-5">
                <p style="color:#3d3d3d"><strong>Languages Known</strong><br>
                     <ul class="list-unstyled interests-list">';
                while($row3 = mysqli_fetch_assoc($result3)){
                echo '<li>'.$row3['lname'].'</li>';}
                    
                echo'</ul>  
                </p>
            </div>

        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  
  
  
  <input name="animation" type="hidden">

</div>

 <div class="col-md-12"><p><br><br></p></div>
  </body>
</html>';
?>