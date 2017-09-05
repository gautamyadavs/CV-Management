<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<?php 
	session_start();
		
	
	if(!isset($_SESSION['IS_ADMIN'])){
		header('Location: index.html');
		
	}
	$aid = $_SESSION['sess_user_id'];
		
   /* session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role != 'admin'){
      header('Location: index.html');
    }*/
?>
<body>
<section id="ext_menu-t">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="#" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="logo"></a>
                        
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="logout.php" aria-expanded="false">Logout</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

    <section class="mbr-section article mbr-after-navbar" id="messagebox" style="color:white; background-color: rgb(61, 142, 185); padding-top: 120px; padding-bottom: 40px;">

    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
				<?php 
				/*Connect to mysql server*/ 
				define("DB_SERVER","localhost");
				define("DB_USER","root");
				define("DB_PASSWORD","");
				define("DB_DATABASE","cv_management");
				$link = mysqli_connect('localhost', 'root', '','cv_management');
	
				/*Check link to the mysql server*/ 
				if(!$link){ 
				die('Failed to connect to server: ' . mysqli_error());
				} 
				else{
				/*Select database*/ 
        $db = mysqli_select_db($link,'cv_management');
					if(!'cv_management'){
					die("Unable to select database"); 
					}
				else{
					
                echo '<h3 class="mbr-section-title display-2" style="font-size:50px">Welcome'.'  '.$_SESSION['sess_username'].'</h3>
                <div class="lead"><p>Manage the Neccessary.</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section mbr-section__container article" id="header" style="color:white;background-color: rgb(55, 114, 145); padding-top: 14px; padding-bottom: 14px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">';
				
				
				$qry="SELECT count('mid') as count FROM register";
					//Execute query 
                $result=mysqli_query($link,$qry);	
					
					//Check whether the query was successful or not 
					$row = mysqli_fetch_assoc($result);
					
				
				
                echo '<center><h3 style="font-size:20px" class="mbr-section-title display-2">Total Users Count :'.''. $row['count'].'</h3></center>';
				}}
            echo '</div>
        </div>
    </div>
</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="options" style="background-color: rgb(239, 239, 239);">

    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
              <div class="card cart-block">
                  <div class="card-img"><a href="#companybucket" class="mbri-shopping-basket mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                  <div class="card-block">
                    <h4 class="card-title">Check Company Buckets</h4>
                    
                    <p class="card-text">See the Shortlisted candidates of company.</p>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#addskill" class="mbri-idea mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Update Skills&nbsp;</h4>
                        
                        <p class="card-text">Add new skills to the database.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#addcompany" class="mbri-smile-face mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">New Company</h4>
                        
                        <p class="card-text">Register a new Company.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#deletestudent" class="mbri-user mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Delete Student</h4>
                        
                        <p class="card-text">Delete account of Student&nbsp;</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#addlang" class="etl-icon icon-quote mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Update Languages</h4>
                        
                        <p class="card-text">Add new languages to the database.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-2" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#deletecompany" class="mbri-sad-face mbr-iconfont mbr-iconfont-features3" style="color: rgb(61, 142, 185);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Delete Company</h4>
                        
                        <p class="card-text">Delete account of Company</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="addlang" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"> <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                      
                            <h2 style="font-size:30px"><center>Add a language to the database.</center><hr></h2>
                          
                            <form class="form-horizontal" action="updation.php" method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-12">
      <center><input id="langadd" name="langadd" type="text" placeholder="Enter Language Name" class="form-control input-md"></center>
  </div>
</div>
    
<div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><input type="submit" id="langaddsubmit" name="langaddsubmit" class="btn btn-primary" value= "Add"></center>
  </div>
</div>

</fieldset>
</form> 
                     
                    </div>
                </div></div>
        </div>
    </div>

</section>
    
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="addskill" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"> <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       
                            <h2 style="font-size:30px"><center>Add a Skill to the database.</center><hr></h2>
                          
                            <form class="form-horizontal" method = "post" action="updation.php">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-12">
      <center><input id="skilladd" name="skilladd" type="text" placeholder="Enter Skill" class="form-control input-md"></center>
  </div>
</div>
    
<div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
      <center><input type="submit" id="skilladdsubmit" name="skilladdsubmit" class="btn btn-primary" value="Add"></center>
  </div>
</div>

</fieldset>
</form> 
                   
                    </div>
                </div></div>
        </div>
    </div>

</section> 
    
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="addcompany" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny"> <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       
                            <h2 style="font-size:30px"><center>Add a New Company.</center><hr></h2>
                          
                            <form class="form-horizontal" action="updation.php" method="post">
<!-- Text input-->
<div class="form-group">
  <div class="col-md-12">
      <center><input id="compusernameadd" name="compusernameadd" type="text" placeholder="Enter Company Username" class="form-control input-md"></center>
  </div>
</div>
    
    <div><p><br></p></div>
<!-- Text input-->
<div class="form-group">
  <div class="col-md-12">
      <center><input id="comppasswordadd" name="comppasswordadd" type="password" placeholder="Enter Password" class="form-control input-md"></center>
  </div>
</div>    
    
<div><p><br><br></p></div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
  <center><input type="submit" name="companyaddsubmit" id="companyaddsubmit" tabindex="4" value="Add" class="btn btn-primary"></center>
  <!--<center><button id="companyaddsubmit" name="companyaddsubmit" class="btn btn-primary">Add</button></center>-->
  </div>
</div>
</form> 
                   
                    </div>
                </div></div>
        </div>
    </div>

</section> 
    
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="deletestudent" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">      
			<div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       
                            <h2 style="font-size:30px"><center>Delete any student.</center><hr></h2>
                          
                            <form class="form-horizontal" action="adminprofile.php" method="post">
<fieldset>

<!-- Text input-->
<div class="col-md-9">    
<div class="form-group">
  
      <center><input id="studentnamesearch" name="studentnamesearch" type="text" placeholder="Enter Student Name" class="form-control input-md"></center>
  </div>
</div> 
    
<!-- Button -->
<div class="col-md-3">
<div class="form-group">
	
      <center><button id="studentnamesubmit" name="studentnamesubmit" class="btn btn-primary" href="adminprofile.php">Search</button></center>
	  
  </div>
</div>

</fieldset></form>
 
                    </div>
            </div>';
       
       if(isset($_POST['studentnamesubmit']))
	   {
		   $name=$_POST['studentnamesearch'];
		   $query1 = "SELECT * FROM member WHERE fname LIKE '%".$name."%' OR lname LIKE '%".$name."%'";
                $result1=mysqli_query($link,$query1);	
        while ($row1 = mysqli_fetch_assoc($result1))
		{
        echo '<div class="col-lg-8 col-lg-offset-2">
            <div class="row"><hr>
                <div class="col-md-6"><b>'.$row1['fname'].' '.$row1['lname'].'</b></div>
                <div class="col-md-3"><form class="form-horizontal" action="layout.php" method="post"><button type="submit" style="border-radius:30px" class="btn btn-xs btn-info" name="seecv" value="'.$row1['mid'].'">View CV</button></form></div>
                <div class="col-md-3"><form class="form-horizontal" action="updation.php" method="post"><button type="submit" style="border-radius:30px" name="deletestudent" id="deletestudent" class="btn btn-xs btn-danger" value="'.$row1['mid'].'">Delete</button></form></div>
            </div>
        </div>';
		}		
	   }
 
    echo '</div>

</section>     

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="deletecompany" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">      
			<div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       
                            <h2 style="font-size:30px"><center>Delete any Company.</center><hr></h2>
                          
                            <form class="form-horizontal" action="adminprofile.php" method="post">
<fieldset>

<!-- Text input-->
<div class="col-md-9">    
<div class="form-group">
  
      <center><input id="company" name="company" type="text" placeholder="Enter Company Username" class="form-control input-md"></center>
  </div>
</div> 
    
<!-- Button -->
<div class="col-md-3">
<div class="form-group">
  
      <center><button id="companyusersubmit" name="companyusersubmit" class="btn btn-primary">Search</button></center>
  </div>
</div>

</fieldset>

                    </div>
            </div></form>';
        if(isset($_POST['companyusersubmit']))
	   {
		   $username=$_POST['company'];
		   $query1 = "SELECT * FROM recruiters WHERE username LIKE '%".$username."%'";
                $result1=mysqli_query($link,$query1);	
        while ($row1 = mysqli_fetch_assoc($result1))
		{
        echo '<div class="col-lg-8 col-lg-offset-2">
            <div class="row"><hr>
                <div class="col-md-8"><b>'.$row1['username'].'</b></div>                
                <div class="col-md-4"><form class="form-horizontal" action="updation.php" method="post"><button type="submit" style="border-radius:30px" name="companydelete" id="companydelete" class="btn btn-xs btn-danger" value="'.$row1['rid'].'">Delete</form></div>
            </div>
        </div>';
		}
	   }		
    echo '</div>

</section>     
  
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="companybucket" style="background-color: rgb(255, 255, 255);"> 
		
<style></style>
    <div class="mbr-section__container mbr-section__container--isolated container">      
			<div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                       
                            <h2 style="font-size:30px"><center>See companys bucket.</center><hr></h2>
                          
                            <form class="form-horizontal" action="adminprofile.php" method="post">
<fieldset>

<!-- Text input-->
<div class="col-md-9">    
<div class="form-group">
  
      <center><input id="companybucketsearch" name="companybucketsearch" type="text" placeholder="Search Company" class="form-control input-md"></center>
  </div>
</div> 
    
<!-- Button -->
<div class="col-md-3">
<div class="form-group">
  
      <center><button id="companybucketsubmit" name="companybucketsubmit" class="btn btn-primary">Search</button></center>
  </div>
</div>

</fieldset>
</form> 
                    </div>
            </div>';
               if(isset($_POST['companybucketsubmit']))
	   {
		   $username=$_POST['companybucketsearch'];
		   $query1 = "SELECT * FROM recruiters WHERE username LIKE '%".$username."%'";
		$result1 = mysqli_query($link,$query1);
        while ($row1 = mysqli_fetch_assoc($result1))
		{
        echo '<div class="col-lg-8 col-lg-offset-2">
            <div class="row"><hr>
                <div class="col-md-8"><b>'.$row1['username'].'</b></div>                
                <div class="col-md-4"><form class="form-horizontal" action="companyshortlisted.php" method="post"><button style="border-radius:30px" type="submit" class="btn btn-xs btn-danger" name="shortlist" value="'.$row1['rid'].'">Shortlisted Candidates</button></form></div>
            </div>
        </div> ';   
        }
	   }
echo '    </div></section>     
  
    
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Tenacity 2017.</p>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
    
    <input name="animation" type="hidden">
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
    
  </body>
</html>';
?>