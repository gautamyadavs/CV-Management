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
	$mid = $_SESSION['mid'];
	 /*Create query*/
    $qry = 'SELECT * FROM member WHERE mid='.$mid;
	$qry12 = 'SELECT email FROM register WHERE mid='.$mid;
    $qry1 = 'SELECT * FROM project WHERE mid='.$mid;
    $qry2 = 'SELECT * FROM achievements WHERE mid='.$mid;
    //$qry3 = 'SELECT * FROM languages WHERE EXISTS (SELECT lid FROM knows WHERE mid='.$mid.')';
	$qry3 = 'SELECT * FROM languages,knows WHERE languages.lid = knows.lid AND knows.mid='.$mid;
    $qry4 = 'SELECT * FROM interests WHERE mid='.$mid;
    $qry5 = 'SELECT * FROM experience WHERE mid='.$mid;
    $qry6 = 'SELECT * FROM courses WHERE mid='.$mid;
    $qry8 = 'SELECT * FROM publications WHERE mid='.$mid;
    $qry9 = 'SELECT * FROM skills,has WHERE skills.sid = has.sid AND has.mid='.$mid;
    $qry10 = 'SELECT * FROM education WHERE mid='.$mid;
    $qry11 = 'SELECT * FROM contacts WHERE mid='.$mid;
	$qry13 = 'SELECT DISTINCT lname FROM languages';
     $qry7 = 'SELECT DISTINCT skill FROM skills';
   
    
    /*Execute query*/
    $result = mysqli_query($link,$qry);
    $result1 = mysqli_query($link,$qry1);
    $result2 = mysqli_query($link,$qry2);
    $result3 = mysqli_query($link,$qry3);
    $result4 = mysqli_query($link,$qry4);
    $result5 = mysqli_query($link,$qry5);
    $result6 = mysqli_query($link,$qry6);
    $result8 = mysqli_query($link,$qry8);
    $result9 = mysqli_query($link,$qry9);
    $result10 = mysqli_query($link,$qry10);
    $result11 = mysqli_query($link,$qry11);
	$result12 = mysqli_query($link,$qry12);
	$result13 = mysqli_query($link,$qry13);
    $result7 = mysqli_query($link,$qry7);
	 
	$row = mysqli_fetch_assoc($result);
	$row12 = mysqli_fetch_assoc($result12);
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section id="ext_menu-t">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="#" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="Logo"></a>
                        
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="studentprofile.php">Dashboard</a></li><li class="nav-item"><a class="nav-link link" href="logout.php">Logout</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="mbr-section article mbr-after-navbar" id="msg-box8-l" style="background-image: url('assets/images/dbms/cv6.jpg'); padding-top: 120px; padding-bottom: 40px;">

    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 style="color:white" class="mbr-section-title display-2">Edit your Profile</h3><br>
                <div class="lead"><p style="color:white" >You can add or remove details here.</p>
                    <a href="studentprofile.php" ><button type="button" class="btn btn-default btn-white">Done Editing</button></a>
                </div>
                
            </div>
        </div>
    </div>

</section>

	
    

    <div class="row"><div class="btn-group btn-xs">
              <a href="#security" class="btn btn-xs btn-primary" >Security</a>
              <a href="#general" class="btn btn-xs btn-primary" >General</a>
              <a href="#social" class="btn btn-xs btn-primary" >Social</a>
              <a href="#achievement" class="btn btn-xs btn-primary" >Achievements</a>
              <a href="#education" class="btn btn-xs btn-primary" >Education</a>
              <a href="#projects" class="btn btn-xs btn-primary" >Projects</a>
              <a href="#courses" class="btn btn-xs btn-primary" >Courses</a>
              <a href="#work" class="btn btn-xs btn-primary" >Work</a>
              <a href="#pub" class="btn btn-xs btn-primary"  >Publications</a>
              <a href="#skills" class="btn btn-xs btn-primary"  >Skills</a>
            </div></div>

<section style="background:white" class="mbr-section mbr-section--relative mbr-section--fixed-size" id="layoutchoose" style="background-color: rgb(41, 105, 176);"> 

    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"><form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Form Name -->
    <legend><h1 style="color:#3d3d3d"><center>CV Layout</center></h1></legend>
    <hr>

<!-- Multiple Radios (inline) -->
<p>
  </p><div class="col-md-12"> <center>
    <label class="radio-inline" for="layoutupdate-0">
      <input type="radio" name="layoutupdate" id="layoutupdate-0" value="1" checked="checked">
      <img height=200px src="assets/images/cv/layout1.png"/>
    </label> 
    <label class="radio-inline" for="layoutupdate-1">
      <input type="radio" name="layoutupdate" id="layoutupdate-1" value="2">
      <img height=200px src="assets/images/cv/layout2.png"/>
    </label>
    </center>
  </div>
    <div><p><br><br></p><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><br><input type="submit" id="layoutsubmit" name="layoutsubmit" class="btn btn-primary" value="Submit"></center>
  </div>
</div>
    
<p></p>

</fieldset>
</form>
               
</div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="security" style="background-color: rgb(255, 255, 255);"> 
		
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1></h1><h1><fieldset><legend><center><h1>Security</h1></center></legend></fieldset></h1><form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<hr>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usernameupdate">Username</label>  
  <div class="col-md-4">
  <input id="usernameupdate" name="usernameupdate" type="text" placeholder="Enter New Username" class="form-control input-md">
    
  </div>
</div>
    
<div><p><br><br></p></div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordupdate">Password</label>  
  <div class="col-md-4">
  <input id="passwordupdate" name="passwordupdate" type="text" placeholder="Enter New Password" class="form-control input-md">
    
  </div>
</div>

<div><p><br><br></p></div>    
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="securitysubmit"></label>
  <div class="col-md-4">
    <input type="submit" id="securitysubmit" name="securitysubmit" class="btn btn-primary" value="Submit">
  </div>
</div>

</fieldset>
</form>
</div>
        </div>
    </div>
   
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="general" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"><form class="form-horizontal" action="edit_student.php" enctype="multipart/form-data" method="post">
<fieldset>
<?php
echo '<!-- Form Name -->
    <legend><center><h1>General</h1></center></legend>
    <hr>
    
    <!-- Profile Pic input--> 
    <div class="form-group">';
    if($row['profile_pic']!=NULL)
        echo '<center><img width=100px height=100px src="uploads/'.$row['profile_pic'].'.jpg" class="avatar img-circle" alt="avatar"/></center>';
    else
        echo '<center><img width=100px height=100px src="uploads/profilepic.jpg" class="avatar img-circle" alt="avatar"/></center>';
    echo '<div><p><br></p></div>
  <label class="col-md-4 control-label" for="photoupdate">Profile Picture</label>  
  <div class="col-md-4">
        <input type="file" name="image" class="form-control">
  </div>
</div>
    
    <div><p><br><br></p></div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nameupdate">Name</label>  
  <div class="col-md-4">
  <input id="nameupdatef" name="nameupdatef" type="text" required="required" value="'.$row['fname'].'" class="form-control input-md"><br>
  <input id="nameupdatel" name="nameupdatel" type="text" value="'.$row['lname'].'" class="form-control input-md">
    
  </div>
</div>

    <div><p><br><br></p></div><br><br><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dobupdate">Date of Birth</label>  
  <div class="col-md-4">
  <input id="dobupdate" name="dobupdate" type="date" required="required" value="'.$row['dob'].'" class="form-control input-md">
    
  </div>
</div>

     <div><p><br><br></p></div>
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="genderupdate">Gender</label>
  <div class="col-md-8">
  <div class="radio">
    <label for="genderupdate-0">';
	
	if($row['gender'] == 'male'){
	echo '<input type="radio" name="genderupdate" id="genderupdate-0" value="1" checked="checked">';}
	else{
	echo'<input type="radio" name="genderupdate" id="genderupdate-0" value="1">';}
      echo 'Male
    </label>
	</div>
  <div class="radio">
    <label for="genderupdate-1">';
      if($row['gender'] == 'female'){
	echo '<input type="radio" name="genderupdate" id="genderupdate-1" value="2" checked="checked">';}
	else{
	echo'<input type="radio" name="genderupdate" id="genderupdate-1" value="2">';}
      echo 'Female
    </label>
	</div>
    <div class="radio">
    <label for="genderupdate-2">
      <input type="radio" name="genderupdate" id="genderupdate-2" value="3">
      Other
    </label>
	</div>
  </div>
</div>

     <div><p><br><br></p></div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="discipline">Discipline</label>  
  <div class="col-md-4">
  <input id="discipline" name="discipline" type="text" required="required" value="'.$row['discipline'].'" class="form-control input-md">
    
  </div>
</div>

     <div><p><br><br></p></div><br><br>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="programme">Programme</label>  
  <div class="col-md-4">
  <input id="programme" name="programme" type="text" required="required" value="'.$row['programme'].'" class="form-control input-md">
    
  </div>
</div>

     <div><p><br><br></p></div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpiupdate">CPI</label>  
  <div class="col-md-4">
  <input id="cpiupdate" name="cpiupdate" type="text" value="'.$row['cpi'].'" class="form-control input-md">
    
  </div>
</div>

     <div><p><br><br></p></div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startyearupdate">Start Year</label>  
  <div class="col-md-4">
  <input id="startyearupdate" name="startyearupdate" type="text" value="'.$row['start_year'].'" class="form-control input-md">
    
  </div>
</div>
    

     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="generalsubmit"></label>
  <div class="col-md-4">
    <input type ="submit" id="generalsubmit" name="generalsubmit" class="btn btn-primary" value = "Submit">
  </div>
</div>

</fieldset>
</form>
</div>
        </div>
    </div>

</section>
     <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="language" style="background-color: rgb(255, 255, 255);"> 
        
		
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Languages</center><br></h1><hr>';
                
   
    while ($row3 = mysqli_fetch_assoc($result3))
    {
    echo '   
        <div>
        <div class="col-md-2">
            <h5 ><center><ul><li>'
        .$row3['lname'].
        '</li></ul></center></h5>
          </div>
                <div class="col-xs-1"> </div>
        </div>
        <div><p><br><br></p></div>';
    }
                
            
                
            echo '<center><button href="#lang" name="newlanguage" class="btn btn-primary" data-toggle="modal">New Language</button></center>
			
           </div>
  
        </div>
      </div>
</section>';

echo '<!-- modal-->
<div class="donate-modal modal fade" id="lang" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>Add a language that you know.</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="newlang">Choose the language</label>
  <div class="col-md-4">
    <select id="newlang" name="newlang" class="form-control">';
                        
   
    while ($row13 = mysqli_fetch_assoc($result13))
    {
      echo '<option value="'.$row13['lname'].'">'.$row13['lname'].'</option>';
    }
        
    echo '</select>
  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newlanguagesubmit" name="newlanguagesubmit" class="btn btn-primary" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal">Close</button><br>
  </div>
</div>

</fieldset>
</form>
                                
					</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="interest" style="background-color: rgb(255, 255, 255);"> 
        
		
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Interests and Hobbies</center><br></h1><hr>';
        
   
    while ($row4 = mysqli_fetch_assoc($result4))
    {
        
    echo '   
        <div>
        <div class="col-md-4">
            <h5 ><ul><li>'
        .$row4['interest'].
        '</li></ul></h5>
          </div>
                <div class="col-xs-1"> </div>
        </div>
        <div><p><br><br></p></div>';
    }
                
            
            
            echo '<center><button href="#hobby" name="newinterest" class="btn btn-primary" data-toggle="modal">New Interest</button></center>
                     
           </div>
  
        </div>
      </div>
</section>';

echo '<!--interest modal-->
<div class="donate-modal modal fade" id="hobby" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>What do you like to do?</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Add Interest</label>  
  <div class="col-md-6">
  <input id="addinterest" name="addinterest" type="text" placeholder="Enter a new Interest" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button type="submit" id="newinterestsubmit" name="newinterestsubmit" class="btn btn-primary" value="Submit">Save</button>
      <button type="submit" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="social" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"><form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Form Name -->
    <legend><center><h1>Contact Information</h1></center></legend>
    <hr>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twitterhandle">Twitter Handle</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input id="twitterhandle" name="twitterhandle" class="form-control" placeholder="'.$row['twitter'].'" type="text">
    </div>
    
  </div>

    <div><p><br><br></p></div>
<!-- Prepended text-->

  <label class="col-md-4 control-label" for="facebookhandle">Facebook Handle</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input id="facebookhandle" name="facebookhandle" class="form-control" placeholder="'.$row['facebook'].'" type="text">
    </div>
    
  </div>

   <div><p><br><br></p></div>
<!-- Prepended text-->

  <label class="col-md-4 control-label" for="linkedinhandle">LinkedIn Handle</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input id="linkedinhandle" name="linkedinhandle" class="form-control" placeholder="'.$row['linked_in'].'" type="text">
    </div>
    
  </div>

   <div><p><br><br></p></div>
<!-- Text input-->

  <label class="col-md-4 control-label" for="userphone">Phone Number</label>  
  <div class="col-md-4">';
    echo '<input id="userphone" name="userphone" type="text" class="form-control input-md">	</div>

   <div><p><br><br></p></div>';
    $i=0;
	while ($row11 = mysqli_fetch_assoc($result11)){
  echo '
  <label class="col-md-4 control-label" for="userphone'.$i.'">Phone Number</label>  
  <div class="col-md-4"><input id="userphone'.$i.'" name="userphone'.$i.'" type="text" placeholder="'.$row11['contact'].'" class="form-control input-md">
	</div>

   <div><p><br><br></p></div>';
        $i=$i+1;
	}
echo '<!-- Text input-->

  <label class="col-md-4 control-label" for="website">Website</label>  
  <div class="col-md-4">
  <input id="website" name="website" type="text" placeholder="'.$row['website'].'" class="form-control input-md">
    
  </div>

   <div><p><br><br></p></div>
<!-- Button -->

  <label class="col-md-4 control-label" for="contactsubmit"></label>
  <div class="col-md-4">
    <input type="submit" id="contactsubmit" name="contactsubmit" class="btn btn-primary" value="Submit">
  </div>
</div>

</fieldset>
</form>
</div>
        </div>
    </div>

</section>
    
    <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="achievement" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
<div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Achievements</center><br></h1>';
			
   
    while ($row2 = mysqli_fetch_assoc($result2))
    {
    echo '               
    <div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <h2 style="color:white"><br><center>'
        .$row2['title'].
        '</center></h2>
            
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">Date</h6> <h6 style="color:white">'
        .$row2['date'].
        '</h6>
            <br>  <h6 style="font-size:20px ;color:white">
                
        </h6> <h6 style="color:white">
        </h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p>'.$row2['description'].'</p><a href="#issuercertificate" data-toggle="modal">IssuerCertificate</a>'.
            '</div>
          </div>
        </div>
      </div>
	  <!--certificate for achievements modal-->
       <div class="donate-modal modal fade" id="issuercertificate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <p class="item-intro text-muted">
                                <br><h1><center>Certificate</center></h1><br>
                            <center>'.'<img src="uploads/'.$row2['issuer'].'" width="750" height="750">'.'</center>
                                
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
             echo '<center><button href="#achieve" name="newachievement" class="btn btn-primary" data-toggle="modal">New Achievement</button></center>
                     

  
        </div>
      </div>
    </div>

</section>

<!--Achievement Modal-->

 <div class="donate-modal modal fade" id="achieve" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Achievement</center></h2>
                            <p class="item-intro text-muted">
                                <form class="form-horizontal" action="edit_student.php" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newachievementname">Achievement Name</label>  
  <div class="col-md-6">
  <input id="newachievementname" name="newachievementname" type="text" placeholder="Name of the achievement" class="form-control input-md" required="required">
    
  </div>
</div>

    <div><p><br></p></div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newachievementdate">Achievement Date</label>  
  <div class="col-md-6">
  <input id="newachievementdate" name="newachievementdate" type="date" placeholder="Enter date of achievement" class="form-control input-md" required="required">
    
  </div>
</div>

     <div><p><br><br></p></div>
    <!-- File input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="fileToUpload">Upload Your Certificate</label>  
  <div class="col-md-6">
  <input type="file" name="image" class="form-control" />
    
  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="newachievementdescription">Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="newachievementdescription" name="newachievementdescription" placeholder="Describe your Achievement Briefly."></textarea>
  </div>
</div>

     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newachievementsubmit" name="newachievementsubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>

 <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="education" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
<div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Education</center><br></h1>';
               

   
    while ($row10 = mysqli_fetch_assoc($result10))
    {
    echo '<div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <h2 style="color:white"><br><center>'
        .$row10['degree'].
        '</center></h2>
             <h6 style="font-size:20px ;color:white"><center>Timeline</center></h6>
            
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">Start Year</h6> <h6 style="color:white">'
        .$row10['start_year'].
        '</h6>
            <br>  <h6 style="font-size:20px ;color:white">End Year</h6> <h6 style="color:white">'
        .$row10['end_year'].
        '</h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p><h6 style="font-size:20px ;color:black">'
        .$row10['stream'].
        '<p><h6 style="font-size:20px ;color:black">'
        .$row10['institute'].
        '<p><h6 style="font-size:20px ;color:black">'
        .'<a href="#educertificate" data-toggle="modal">Marksheet</a>
            </div>
          </div>

        </div>
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
	</div>'; }
	
	
            
            echo '<center><button href="#educate" name="neweducation" class="btn btn-primary" data-toggle="modal">New Education Qualification</button></center>
                     

  
        </div>
      </div>
    </div>

</section>

<!--Education Modal-->

 <div class="donate-modal modal fade" id="educate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Education</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="neweduinstitutename">Institute Name</label>  
  <div class="col-md-6">
  <input id="neweduinstitutename" name="neweduinstitutename" type="text" placeholder="Name of the Institute" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newedudegree">Degree</label>  
  <div class="col-md-6">
  <input id="newedudegree" name="newedudegree" type="text" placeholder="Enter Degree" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
     <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newedustream">Stream</label>  
  <div class="col-md-6">
  <input id="newedustream" name="newedustream" type="text" placeholder="Enter Stream" class="form-control input-md">
    
  </div>
</div>

    <div><p><br><br></p></div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newedustartyear">Start Year</label>  
  <div class="col-md-6">
  <input id="newedustartyear" name="newedustartyear" type="text" placeholder="Enter Start Year" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="neweduendyear">End Year</label>  
  <div class="col-md-6">
  <input id="neweduendyear" name="neweduendyear" type="text" placeholder="Enter End Year / Leave Empty if still enrolled" class="form-control input-md">
    
  </div>
</div>
    
    <div><p><br><br></p></div>
    <!-- File input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newedumarksheet">Upload Your Marksheet</label>  
  <div class="col-md-6">
      <input type="file" name="image" class="form-control" />

  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">

    <button id="neweducationsubmit" name="neweducationsubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>


 <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="projects" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
		

     <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Projects</center><br></h1>';
			
    while ($row1 = mysqli_fetch_assoc($result1))
    {
    echo '               
    <div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <h2 style="color:white"><br><center>'
                .$row1['pname'].
                '</center></h2>
             <h6 style="font-size:20px ;color:white"><center>'
        .$row1['pstatus'].
        '</center></h6>
            
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">Start Date</h6> <h6 style="color:white">'
        .$row1['sdate'].
        '</h6>
            <br>  <h6 style="font-size:20px ;color:white">End Date</h6> <h6 style="color:white">'
        .$row1['edate'].
        '</h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p>'
        .$row1['summary'].
        '</p>
                <p><a href="'.$row1['plink'].'">'
        .$row1['plink'].
        '</a></p>
            </div>
          </div>

        </div>
      </div>';
	}
	  
            
            echo '<center><button href="#proj" name="newproject" class="btn btn-primary" data-toggle="modal">New Project</button></center>
                     
  
        </div>
      </div>
    </div>
</section>

<!--Project Modal-->

 <div class="donate-modal modal fade" id="proj" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Project</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newprojectname">Project Name</label>  
  <div class="col-md-6">
  <input id="newprojectname" name="newprojectname" type="text" placeholder="Name of the Project" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br></p></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="newstatus">Status</label>
  <div class="col-md-4">
    <select id="newstatus" name="newstatus" class="form-control">
      <option value="Running">Running</option>
      <option value="Completed">Completed</option>
    </select>
  </div>
</div>

    
        <div><p><br><br></p></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="newprojectdescription">Summary</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="newprojectdescription" name="newprojectdescription">Describe your Project Briefly.</textarea>
  </div>
</div>

    <div><p><br><br></p></div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newprojectstartyear">Start Date</label>  
  <div class="col-md-6">
  <input id="newprojectstartyear" name="newprojectstartyear" type="date" placeholder="Enter Start Date" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newprojectendyear">End Date</label>  
  <div class="col-md-6">
  <input id="newprojectendyear" name="newprojectendyear" type="date" placeholder="Enter End Date / Leave Empty if still running" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newprojectlink">Project Link</label>  
  <div class="col-md-6">
  <input id="newprojectlink" name="newprojectlink" type="text" placeholder="Enter Link" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newprojectsubmit" name="newprojectsubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>

 <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="courses" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
		

    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Courses</center><br></h1>'; 
   
    while ($row6 = mysqli_fetch_assoc($result6))
    {
    echo '    <div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <h2 style="color:white"><br><center>'
        .$row6['title'].
        '</center></h2>
             
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">'
        .$row6['date'].
        '</h6> <h6 style="color:white">00/00/00</h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p>'
        .$row6['description'].
        '</p>
                <p>'.'<a href="#certificate" data-toggle="modal">Issuer Certificate</a>'.
                        
'</p>
            </div>
          </div>

        </div>
      </div>';
	
	  
	  echo '<!--certificate for course modal-->
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
            echo '<center><button href="#course" name="newcourse" class="btn btn-primary" data-toggle="modal">New Course</button></center>
                     
  
        </div>
      </div>
    </div>

</section>

<!--Courses Modal-->

 <div class="donate-modal modal fade" id="course" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Course</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newcoursename">Course Name</label>  
  <div class="col-md-6">
  <input id="newcoursename" name="newcoursename" type="text" placeholder="Name of the Course" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br></p></div>
    <!-- Date input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newcoursedate">Date</label>  
  <div class="col-md-6">
  <input id="newcoursedate" name="newcoursedate" type="Date" class="form-control input-md">
    
  </div>
</div>
    
        <div><p><br><br></p></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="newcoursedescription">Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="newcoursedescription" name="newcoursedescription">Describe your Course Briefly.</textarea>
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- File input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newcoursecertificate">Course Certificate</label>  
  <div class="col-md-6">
  <input type="file" name="image" class="form-control" />
    
  </div>
</div>
    
 
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newcoursesubmit" name="newcoursesubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="work" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>

    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Work Experience</center><br></h1>';
    
    while ($row5 = mysqli_fetch_assoc($result5))
    {
    echo '       
    <div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <h2 style="color:white"><br><center>'
        .$row5['title'].
        '</center></h2>
            <br> <h5 style="color:white">'
        .$row5['organization'].
        '</h5>
            <br> <h5 style="color:white">Status</h5>
             
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">Join Date</h6> <h6 style="color:white">'
        .$row5['join_date'].
        '</h6>
            <br> <h6 style="font-size:20px ;color:white">End Date</h6> <h6 style="color:white">'
        .$row5['end_date'].
        '</h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p>'
        .$row5['location'].
        '<p>
                <p><h6>Validated</h6> '
                .'<a href="#workcertificate" data-toggle="modal">Issuer Certificate</a>'.
        '</p>
                <p><h6>'
        .$row5['description'].
        '</h6></p>
            </div>
          </div>

        </div>
      </div>';
	
			echo '<!--certificate for work modal-->
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
				
	
 
            echo '<center><button href="#workex" name="newworkex" class="btn btn-primary" data-toggle="modal">New Work</button></center>
                     
</div>
  
        </div>
      </div>
    </div>

</section>

<!--Work Modal-->

 <div class="donate-modal modal fade" id="workex" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Work</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworktitle">Work Title</label>  
  <div class="col-md-6">
  <input id="newworktitle" name="newworktitle" type="text" placeholder="Enter Work Title" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworkorganisation">Organisation Name</label>  
  <div class="col-md-6">
  <input id="newworkorganisation" name="newworkorganisation" type="text" placeholder="Enter Organisation Name" class="form-control input-md">
    
  </div>
</div>
    
    <div><p><br><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworklocation">Enter City and Country</label>  
  <div class="col-md-6">
  <input id="newworklocation" name="newworklocation" type="text" placeholder="Enter City and Country" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Date input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworkstartdate">Start Date</label>  
  <div class="col-md-6">
  <input id="newworkstartdate" name="newworkstartdate" type="Date" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Date input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworkenddate">End Date</label>  
  <div class="col-md-6">
  <input id="newworkenddate" name="newworkenddate" type="Date" class="form-control input-md">
    
  </div>
</div>
    
        <div><p><br><br></p></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworkdescription">Work Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="newworkdescription" name="newworkdescription">Describe your Course Briefly.</textarea>
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- File input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newworkletter">Validation Record</label>  
  <div class="col-md-6">
  <input type="file" name="image" class="form-control" />
    
  </div>
</div>
    
 
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newexperiencesubmit" name="newexperiencesubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>


<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="pub" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
		
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Publications</center><br></h1>';
               
    while ($row8 = mysqli_fetch_assoc($result8))
    {
    echo ' 
    <div class="card">
      <div class="row ">
        <div class="col-md-3" style="background:#3d8eb9;">
            <br> <h5 style="color:white">'
        .$row8['organization'].
        '</h5>
            <br> <h5 style="color:white">'
        .$row8['subject'].
        '</h5>
             
            <br>
            
            <p>
            
            <h6 style="font-size:20px ;color:white">Date</h6> <h6 style="color:white">'
        .$row8['pubdate'].
        '</h6>
            
            </p>
        
          </div>
          <div class="col-md-4 ">
            <div class="card-block ">
              <p>'
        .$row8['description'].
        '</p>
                <p><h6>'
        .$row8['validation'].'</h6> 
        </p>
            </div>
          </div>

        </div>
      </div>';
	}
	
            
            echo '<center><button href="#publication" name="newpublication" class="btn btn-primary" data-toggle="modal">New Publication</button></center>
                     

        </div>
      </div>
    </div>

</section>

<!--publications Modal-->

 <div class="donate-modal modal fade" id="publication" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Publication</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationtitle">Publication Title</label>  
  <div class="col-md-6">
  <input id="newpublicationtitle" name="newpublicationtitle" type="text" placeholder="Enter Publication Title" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationorganisation">Organisation Name</label>  
  <div class="col-md-6">
  <input id="newpublicationorganisation" name="newpublicationorganisation" type="text" placeholder="Enter Organisation Name" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationsubject">Subject</label>  
  <div class="col-md-6">
  <input id="newpublicationsubject" name="newpublicationsubject" type="text" placeholder="Enter Subject of publication" class="form-control input-md">
    
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- Date input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationdate">Publication Date</label>  
  <div class="col-md-6">
  <input id="newpublicationdate" name="newpublicationdate" type="Date" class="form-control input-md">
    
  </div>
</div>
    
    <div><p><br><br></p></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationdescription">Publication Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="newpublicationdescription" name="newpublicationdescription">Describe your Publication Briefly.</textarea>
  </div>
</div>
    
     <div><p><br><br></p></div>
    <!-- File input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="newpublicationletter">Validation Record</label>  
  <div class="col-md-6">
  <input type="file" name="image" class="form-control" />
    
  </div>
</div>
    
 
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newpublicationsubmit" name="newpublicationsubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>


 <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="skills" style="background-color: rgb(255, 255, 255);"> 
        
<style>

    .col-adj-20{width:20%;}
.donate-modal .modal-content {
  border-radius: 0px;
  background-clip: border-box;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  height:auto;
  padding: 40px;
  text-align: center;
}
.donate-modal .modal-content h2 {
  margin-bottom: 15px;
  font-size: 1em;
}
.donate-modal .modal-content p {
  margin-bottom: 30px;
}
.donate-modal .modal-content p.item-intro {
  margin: 20px 0 30px;
  font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-style: italic;
  font-size: 16px;
}
.donate-modal .modal-content ul.list-inline {
  margin-bottom: 30px;
  margin-top: 0;
}
.donate-modal .modal-content img {
  margin-bottom: 30px;
}
.donate-modal .close-modal {
  position: absolute;
  width: 75px;
  height: 75px;
  background-color: transparent;
  top: 25px;
  right: 25px;
  cursor: pointer;
}
.donate-modal .close-modal:hover {
  opacity: 0.3;
}
.donate-modal .modal-backdrop {
  opacity: 0;
  display: none;
  width:80%;
}
.popupwind{
top:80px;
max-width:1000px;
margin-left:auto;
margin-right:auto;
}
.popupcontainer{
max-width:950px;
margin-left:auto;
margin-right:auto;
}

</style>
		
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
            <div class="tiny"><h1><center>Skills</center><br></h1><hr>';
        
    

    while ($row9 = mysqli_fetch_assoc($result9))
    {
        
    echo '     
        <div>
    <div class="col-md-2">
            <h6 ><center><ul><li>'
        .$row9['skill'].
        '</li><br></ul></center></h6>
          </div>
                <div class="col-xs-1"> </div>
				</div>
				<div><p><br><br></p></div>';
	}
        
            
                
                echo ' <br><br>   
            <center><button href="#skill" name="newskill" class="btn btn-primary" data-toggle="modal">New Skill</button></center>
                     
           </div>
  
        </div>
      </div>
</section>

<div class="donate-modal modal fade" id="skill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content popupwind">
            <div class="container popupcontainer">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="font-size:30px"><center>New Skill</center></h2>
                            <p class="item-intro text-muted">
                                
                                <form class="form-horizontal" action="edit_student.php" method="post">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="newskill">Add skill</label>
  <div class="col-md-4">
    <select id="newskill" name="newskill" class="form-control">';
      
   
    while ($row7 = mysqli_fetch_assoc($result7))
    {
      echo '<option value="'.$row7['skill'].'">'.$row7['skill'].'</option>';
    }
        
    echo '</select>
  </div>
</div>
    
     <div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="newskillsubmit" name="newskillsubmit" class="btn btn-primary" type="submit" value="Submit">Save</button>
      <button type="button" class="btn mbr-editable-button btn-success" data-dismiss="modal"> Close </button><br>
  </div>
</div>

</fieldset>
</form>

                                
							</p>
                             
                       </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>';
?>


<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-1" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container"> 
        <p class="text-xs-center">Tenacity 2017</p>
    </div>
    
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>

  
  
  <input name="animation" type="hidden">
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>