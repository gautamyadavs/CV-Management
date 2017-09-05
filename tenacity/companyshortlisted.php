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

                    <div class="navbar-brand">';
                    if(isset($_POST['shortlist']) || isset($_SESSION['shortlist']))
                        echo '<a href="adminprofile.php" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="logo"></a>';
                    else
                        echo '<a href="companyprofile.php" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="logo"></a>';

                    echo '</div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        
                        <li class="nav-item">';
								   if(isset($_POST['shortlist']) || isset($_SESSION['shortlist']))
									 echo '<a class="nav-link link" href="adminprofile.php" aria-expanded="false">Dashboard</a>';
							else
                            echo '<a class="nav-link link" href="companyprofile.php" aria-expanded="false">Dashboard</a>';
                        echo '</li>
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

<section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-14" style="background-image: url(assets/images/dbms/cv1.jpeg); padding-top: 120px; padding-bottom: 40px;">

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2" style="color:white">Shortlisted Candidates</h3>
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
        <div class="col-md-12">';
		   if(isset($_POST['shortlist']))
		   {
				$rid= $_POST['shortlist'];
				$_SESSION['shortlist']=$rid;
		   }
		   else if(isset($_SESSION['shortlist']))
		   {
			   				$rid= $_SESSION['shortlist'];
		   }
			else
				$rid= $_SESSION['rid'];
            $query = 'SELECT * FROM member WHERE mid IN (SELECT mid FROM shortlist WHERE rid='.$rid.')';
            //$query = 'SELECT * FROM member WHERE EXISTS (SELECT * FROM shortlist WHERE rid='.$rid.')';
            $result = mysqli_query($link,$query);
            while($row = mysqli_fetch_assoc($result))
            {
            echo '<div class="row">                                                           <!--repeat this for multiple students-->
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
                                ' , '
                                .$row['discipline'].
                                '</p>
                                <p><b>'
                                .$row['gender'].
                                ', '
                                .$row['dob'].
                                '</b></p>
                                <p>'
                                .$row['programme'].
                                '</p>
							</div>
						</div>
						
						<div class="col-md-12 panelBottom">
							<div class="col-md-12 text-center">
                                <form action="removestudent.php" method="post">
								<button type="submit" name="remove" class="btn btn-xs btn-add-to-cart" style="border-radius:35px" value="'.$row['mid'].'">Remove</button>
                                </form>
                                <form action="layout'.$row['layout'].'.php" method="post">
                                <button type="submit" name="seecv" class="btn btn-xs" style="border-radius:35px; background:grey; color:white" value="'.$row['mid'].'">See CV</button></form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
                }
  ?>

                
                
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