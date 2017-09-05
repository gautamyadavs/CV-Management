<!DOCTYPE html>
<head>
    <title>CV</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CV">
    <link rel="shortcut icon" href="../assets/images/logo-128x128.png">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    
    <link id="theme-style" rel="stylesheet" href="assets/css/1.css"><!--you just need to vary number from 1.css to 6.css for diff. layouts-->
</head> 
<?php
    //Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
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
	//$time=strtotime($row['dob']);
	
	//$year=date("Y",$time);
	
	//$y=year(date)-$year;
	
	
	echo '<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">';
            if($row['profile_pic']!=NULL)
			 echo '<img src="uploads/'.$row['profile_pic'].'.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" />';
            else
                echo '<img src="uploads/profilepic.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" />';
                echo '<h1 class="name">'.$row['fname'].' '.$row['lname'].'
				</h1>
                <h3 class="tagline">'.$row['gender'].'-'.$row['dob'].'</h3>
            </div>
			
			
			<!--//profile-container-->
			
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href=#>'.$row12['email'].'</a></li>';
					while($row11 = mysqli_fetch_assoc($result11)){
                    echo '<li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789">'.$row11['contact'].'</a></li>';}
                    if($row['website']!=NULL)
                        echo '<li class="website"><i class="fa fa-globe"></i><a href="#" target="_blank">'.$row['website'].'</a></li>';
                    if($row['linked_in']!=NULL)
                        echo '<li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">'.$row['linked_in'].'</a></li>';
                    if($row['facebook']!=NULL)
                        echo '<li class="facebook"><i class="fa fa-facebook"></i><a href="#" target="_blank">'.$row['facebook'].'</a></li>';
                    if($row['twitter']!=NULL)
                        echo '<li class="twitter"><i class="fa fa-twitter"></i><a href="#" target="_blank">'.$row['twitter'].'</a></li>';
                echo '</ul>
            </div><!--//contact-container-->
			
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>';
					while($row10 = mysqli_fetch_assoc($result10)){
						echo '<div class="item">
                    <h4 class="degree">'.$row10['degree'].', '.$row10['stream'].'<a href="#educertificate" data-toggle="modal">Marksheet</a></h4>
                    <h5 class="meta">'.$row10['institute'].'</h5>
                    <div class="time">'.$row10['start_year'].' - '.$row10['end_year'].'</div>
                </div>
			
              <!--certificate for education modal-->
       <div class="donate-modal modal fade" id="educertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro">
                                <br><h1 style="color:#3d3d3d"><center>Certificate</center></h1><br>
                            <center>'        .'<img src="uploads/'.$row10['marksheet'].'" width="250" height="250">'.
'</center>
                                
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
					}
					echo '</div>';
					
			echo '<div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">';
				
					while($row3 = mysqli_fetch_assoc($result3)){
             
                    echo '<li>'.$row3['lname'].'</li>';}
                    
                echo'</ul>
            </div><!--//languages-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests (Hobbies)</h2>
                <ul class="list-unstyled interests-list">';
					while($row4 = mysqli_fetch_assoc($result4)){
                    echo '<li>'.$row4['interest'].'</li>';}
                echo '</ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section achievements-section">
                <h2 class="section-title"><i class="fa fa-star"></i>Achievements</h2>'; 
				
				while($row2 = mysqli_fetch_assoc($result2)){
                echo'<div class="item"><hr>
                    
                    <span class="job-title">'.$row2['title'].'</span><br>
                    <p><div class="company">'.$row2['date'].', <a href="#issuercertificate" data-toggle="modal">IssuerCertificate</a></div></p><br>
                    <span class="project-tagline">'.$row2['description'].'</span>
                    
                </div>
				<!--//item--> 
            </section><!--//achievements-section-->
        
         <!--certificate for achievements modal-->
       <div class="donate-modal modal fade" id="issuercertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center>'.'<img src="uploads/'.$row2['issuer'].'" width="250" height="250">'.'</center>
                                
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
				}
				



            
            
            echo '<section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Work</h2>';
                while($row5 = mysqli_fetch_assoc($result5)){
                echo'<div class="item"><hr>
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">'.$row5['title'].'</h3>
                            <div class="time">'.$row5['join_date'].' - '.$row5['end_date'].' , </div>
							
                        </div><!--//upper-row-->
                        <div class="company">'.$row5['organization'].'<br>'.$row5['location'].'<br> <a href="#workcertificate" data-toggle="modal">IssuerCertificate</a></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>'.$row5['description'].'</p>  
                        
                    </div><!--//details-->
                </div><!--//item-->
                
            </section><!--//work section-->
			
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
				}
				

            
            echo '<section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>';
				while($row1 = mysqli_fetch_assoc($result1)){
                echo '<div class="item"><hr>
                    
                    <span class="job-title">'.$row1['pname'].'<br><a href="'.$row1['plink'].'" target="blank">'.$row1['plink'].'.</a></span><br>
                    <p><div class="company">'.$row1['sdate'].' - '.$row1['edate'].', '.$row1['pstatus'].'</div></p><br>
                    <span class="project-tagline">'.$row1['summary'].'.<br></span>
                    
                </div>
				 </section> <!--//project section-->';
				}
           
        
        echo '<section class="section courses-section">
                <h2 class="section-title"><i class="fa fa-key"></i>Courses</h2>';
				while($row6 = mysqli_fetch_assoc($result6)){
                echo '<div class="item"><hr>
                    
                    <span class="job-title">'.$row6['title'].'</span><br>
                    <p><div class="company">'.$row6['date'].', <a href="#certificate" data-toggle="modal">Certificate</a></div></p><br>
                    <span class="project-tagline">'.$row6['description'].'</span>
                    
                </div><!--//item-->
            </section><!--//course section-->

       <!--certificate for course modal-->
       <div class="donate-modal modal fade" id="certificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center>'.'<img src="uploads/'.$row6['certificate'].'" width="250" height="250">'.'</center>
                                
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
				}
	  



        echo '<section class="section publications-section">
                <h2 class="section-title"><i class="fa fa-book"></i>Publication</h2>';
				
                while($row8 = mysqli_fetch_assoc($result8)){
                echo '<div class="item"><hr>
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">'.$row8['subject'].'</h3>
                            <div class="time">'.$row8['pubdate'].' , <a href="#publicationcertificate" data-toggle="modal">'.$row8['validation'].'</a></div>
                        </div><!--//upper-row-->
                        <div class="company">'.$row8['organization'].'</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>'.$row8['description'].'</p>  
                        
                    </div><!--//details-->
                </div><!--//item-->
                
            </section><!--//publication section-->

  <!--certificate for publication modal-->
       <div class="donate-modal modal fade" id="publicationcertificate" tabindex="-1" role="dialog" aria-hidden="true">
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
	  
				}
				


            
            
            echo '<section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">';
					 while($row9 = mysqli_fetch_assoc($result9)){
				
                    echo '<div class="item">
                        <h3 class="level-title">'.$row9['skill'].'</h3>                              
                    </div>'; 
					 }
                   ?>
                </div>  
            </section><!--//skills-section-->
            
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
               
                <small class="copyright">Tenacity 2017</small>
        </div>
    </footer>
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 

