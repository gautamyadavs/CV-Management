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
$rid= $_SESSION['rid'];
echo '<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
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

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        
                        <li class="nav-item">
                            <a class="nav-link link" href="companyshortlisted.php" aria-expanded="false"><span class="mbri-features mbr-iconfont mbr-iconfont-btn"></span>Shortlisted</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="logout.php" aria-expanded="false">Logout</a>
                        </li>
                    
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-14" style="background-image: url(assets/images/fast.jpg); padding-top: 120px; padding-bottom: 80px;">

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">';
                $query = 'SELECT * FROM recruiters WHERE rid = '.$rid;
                $result=mysqli_query($link,$query);	
				while($row = mysqli_fetch_assoc($result))
                {
                echo '<h3 class="mbr-section-title display-2" style="color:white">'.$row['username'].'</h3>';
                }
                echo '<div class="lead"><p style="color:white">You can shortlist the suitable candidates according to your requirements.</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="filter" style="background-color: rgb(255, 255, 255);"> 
		
<style>
.panel.panel--styled {
    background: #F4F2F3;
}
.panelTop {
    padding: 30px;
}

.panelBottom {
    border-top: 1px solid #e7e7e7;
    padding-top: 20px;
}
.btn-add-to-cart {
    background: #FD5A5B;
    color: #fff;
}
.btn.btn-add-to-cart.focus, .btn.btn-add-to-cart:focus, .btn.btn-add-to-cart:hover  {
	color: #fff;   
    background: #FD7172;
	outline: none;
}
.btn-add-to-cart:active {
	background: #F9494B;
	outline: none;
}


span.itemPrice {
    font-size: 24px;
    color: #FA5B58;
}

.stars {
    padding-top: 10px;
	width: 100%;
	display: inline-block;
}
span.glyphicon {
    padding: 5px;
}
.glyphicon-star-empty {
    color: #9d9d9d;
}
.glyphicon-star-empty, .glyphicon-star { 
    font-size: 18px;
}
.glyphicon-star {
    color: #FD4;
    transition: all .25s;
}   
.glyphicon-star:hover { 
    transform: rotate(-15deg) scale(1.3); 
}


</style>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row block">
			<div class="tiny">  
                <div class="container">

        <div class="row">

            <div class="col-md-4">
                  <form action="companyprofile.php" method="post">
                  <fieldset>
                      
                      <p class="lead"></p><h2><center>Filter List</center></h2><p></p>
                <div class="list-group"><hr>
                  
                          <div class="form-group">  
                          <div class="col-md-6">
                          <input id="candfname" name="candfname" type="text" placeholder="First Name" class="form-control input-md">
                          </div>
                          </div>
                    
                           <div class="form-group">  
                          <div class="col-md-6">
                          <input id="candlname" name="candlname" type="text" placeholder="Last Name" class="form-control input-md">
                          </div>
                          </div>
                    
                          <div><p><br></p></div><hr>
                          <div class="form-group">  
                          <div class="col-md-12">
                          <input id="candmincpi" name="candmincpi" type="text" placeholder="Enter Minimum CPI" class="form-control input-md">
                          </div>
                          </div>
                     
                          <div><p><br></p></div><hr>
                          <div class="form-group">  
                          <div class="col-md-12">
                          <input id="candgender" name="candgender" type="text" placeholder="Enter Gender" class="form-control input-md">
                          </div>
                          </div>
                    
                          <div><p><br></p></div><hr>
                          <div class="form-group">
                              <div class="col-md-6">
							  
							  
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="canddiscipline[]" value="CSE">
												CSE
                                            </label>
	                               </div>
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="canddiscipline[]" value="ME">
                                                    ME
                                            </label>
	                               </div>
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="canddiscipline[]" value="ECE">
                                                    ECE
                                            </label>
	                               </div>
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="canddiscipline[]" value="Design">
                                                Design
                                            </label>
	                               </div>
                                   
                                </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-6">
                              
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="BDes">
                                                B.Des
                                            </label>
	                               </div>
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="MDes">
                                                M.Des
                                            </label>
	                               </div>
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="BTech">
                                                B.Tech
                                            </label>
	                               </div>
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="MTech">
                                                M.Tech
                                            </label>
	                               </div>
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="Phd">
                                                Phd
                                            </label>
	                               </div>
                                   <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="candprogramme[]" value="Mechatronics">
                                                Mechatronics
                                            </label>
	                               </div>
                                </div>
                        </div>
                    
                          <div><p><br></p></div><hr>
                          <div class="form-group">
                                 <div class="col-md-12">
                                    <select id="candskill" name="candskill[]" class="form-control" multiple="multiple" size="1" style="font-size:15px">';
                                $qry7 = 'SELECT skill FROM skills';
                                 $result7 = mysqli_query($link,$qry7);
                                 while ($row7 = mysqli_fetch_assoc($result7))
                                    {
                                      echo '<option value="'.$row7['skill'].'">'.$row7['skill'].'</option>';
                                 }
                                  echo '  </select>
                                 </div>
                          </div>
                                              
                    
                    <div><p></p></div>
                    <div class="form-group">
                            <div class="col-md-12">
                                <hr>
                                <center><input type="submit" id="candapplyfilter" name="candapplyfilter" class="btn btn-primary btn-add-to-cart" value="Submit"></center>
                            </div>
                    </div>
                    
                </div>
                      
                  </fieldset>
                  </form>      
            </div>

            <div class="col-md-8">

                <div class="row">

               <div class="container">';
if(isset($_POST['candapplyfilter']))
{   
    if($_POST['candfname'] || $_POST['candlname'] || $_POST['candmincpi'] ||  $_POST['candgender'] || isset($_POST['canddiscipline']) || isset($_POST['candskill']) || isset($_POST['candprogramme']) || isset($_POST['candskill']))
    {
    $counter = 0;
	$rid = $_SESSION['rid'];
    $fname = $_POST['candfname'];
    $lname = $_POST['candlname'];
    $cpi = $_POST['candmincpi'];
    $gender = $_POST['candgender'];
    $query = "SELECT * FROM member WHERE mid NOT IN (SELECT mid FROM shortlist WHERE rid=".$rid.")";
    if($_POST['candfname'])
        $query = $query." AND fname = '".$fname."'";
    if($_POST['candlname'])
        $query = $query." AND lname = '".$lname."'";
    if($_POST['candmincpi'])
        $query = $query." AND cpi >= ".$cpi;
    if($_POST['candgender'])
        $query = $query." AND gender = '".$gender."'";
	if (isset($_POST['canddiscipline']))
    {
        $array = $_POST['canddiscipline'];
        $tosql = implode("','", $array);
        $query = $query ." AND discipline IN ('$tosql')";
	}
    if (isset($_POST['candprogramme']))
    {
        $array = $_POST['candprogramme'];
        $tosql = implode("','", $array);
        $query = $query ." AND programme IN ('$tosql')";
	}
    if (isset($_POST['candskill']))
    {
        $array = $_POST['candskill'];
        foreach ($array as $x => $x_value )
            $query = $query ." AND mid IN (SELECT mid FROM has WHERE sid = (SELECT sid FROM skills WHERE skill = '".$x_value."'))";
        //$count = count ($array);
        //for($i = 0; $i< $count; $i++)
        //{
          //  echo $array[$i]
            //$query = $query ." AND mid = ANY(SELECT mid FROM has WHERE sid = (SELECT sid FROM skills WHERE skill = '".$array[$i]."'))";
        //}
	} 
    $result = mysqli_query($link,$query);
    }
    else
    {
        $query = 'SELECT * FROM member WHERE mid NOT IN (SELECT mid FROM shortlist WHERE rid='.$rid.')';
        $result = mysqli_query($link,$query);
    }
}

else
{
    $query = 'SELECT * FROM member WHERE mid NOT IN (SELECT mid FROM shortlist WHERE rid='.$rid.')';
    $result = mysqli_query($link,$query);
}
        while ($row = mysqli_fetch_assoc($result))
        {
		
        echo '<div class="row">
			<div class="col-md-12">				
				<div class="panel panel-default  panel--styled">
					<div class="panel-body"><hr>
						<div class="col-md-12 panelTop">	
							<div class="col-md-4">';
                            if($row['profile_pic']!=NULL)
                            echo ''.'<img src="uploads/'.$row['profile_pic'].'.jpg" style="border-radius:200px; width:200px; overflow: hidden;" class="img-responsive">'.'';
                            else
                                echo ''.'<img src="uploads/profilepic.jpg" style="border-radius:200px; width:200px; overflow: hidden;" class="img-responsive">'.'';
							echo '</div>
							<div class="col-md-8">	
								<h2>'
                                .$row['fname'].' '.$row['lname'].
                                '</h2>
                                <p><b>CPI</b> '
                                .$row['cpi'].
                                ', '
                                .$row['discipline'].
                                '</p>
                                <p><b>'
                                .$row['gender'].
                                ', '
                                .$row['dob'].
                                '</b></p>
                                <p>'
                                .$row['summary'].
                                '</p>
							</div>
						</div>
						
						<div class="col-md-12">
							
								 <form method="post" action="shortlist.php"> <button class="btn btn-xs btn-add-to-cart" style="border-radius:35px; color:white" id="shortlist" name="shortlist" type="submit" value="'.$row['mid'].'">Shortlist</button></form>
								
                                <form method="post" action="layout'.$row['layout'].'.php"> <button class="btn btn-xs" style="border-radius:35px; background:grey; color:white" id="seecv" name="seecv" value="'.$row['mid'].'">See CV</button></form>
							
						</div>
					</div>
				</div>
			</div>
		</div>';
        }
            ?>
                   
                   
    </div>

                </div>
                
                
                <hr>


            </div>

        </div>

    </div></div>
        </div>
    </div>

</section>

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
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>