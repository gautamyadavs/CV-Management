<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
<link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/animate.css/animate.min.css">
<link rel="stylesheet" href="assets/dropdown/css/style.css">
<link rel="stylesheet" href="assets/theme/css/style.css">
<link rel="stylesheet" href="assets/mobirise-gallery/style.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



</head>
<body>
<?php
    //Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
        //Connect to @mysql server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","cv_management");
        $link = mysqli_connect('localhost', 'root', '', 'cv_management');
        /*Check link to the @mysql server*/
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
    ?>

<section id="ext_menu-t">

<nav class="navbar navbar-dropdown">
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

<ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="logout.php">Log out</a></li></ul>
<button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
<div class="close-icon"></div>
</button>

</div>
</div>

</div>
</nav>

</section>
<?php
    $mid= $_SESSION['mid'];
    /*Create query*/
    $qry = 'SELECT * FROM member WHERE mid='.$mid;
    $qry1 = 'SELECT * FROM project WHERE mid='.$mid;
    $qry2 = 'SELECT * FROM achievements WHERE mid='.$mid;
    $qry3 = 'SELECT * FROM languages,knows WHERE languages.lid = knows.lid AND knows.mid='.$mid;
    $qry4 = 'SELECT * FROM interests WHERE mid='.$mid;
    $qry5 = 'SELECT * FROM experience WHERE mid='.$mid;
    $qry6 = 'SELECT * FROM courses WHERE mid='.$mid;
    $qry8 = 'SELECT * FROM publications WHERE mid='.$mid;
    $qry9 = 'SELECT * FROM skills,has WHERE skills.sid = has.sid AND has.mid='.$mid;
    $qry10 = 'SELECT * FROM education WHERE mid='.$mid;
    $qry11 = 'SELECT * FROM contacts WHERE mid='.$mid;
    
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
    
    $row = mysqli_fetch_assoc($result);
    
        echo '<section class="mbr-section mbr-after-navbar" id="msg-box5-d" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
        
        
        <div class="container">
        <div class="row">
        <div class="mbr-table-md-up">
        
        <div class="mbr-table-cell mbr-right-padding-md-up mbr-valign-top col-md-7 image-size" style="width: 35%;">';
        if($row['profile_pic']!=NULL)
        {
        echo '<div class="mbr-figure">'
        .'<img src="uploads/'.$row['profile_pic'].'.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" />'.
        '</div>';
        }
        else
        {
            echo '<div class="mbr-figure">'
        .'<img src="uploads/profilepic.jpg" class="profile"  width="100px" style="border-radius:200px" alt="profile picture" />'.
        '</div>';
        }
        echo '</div>
        
        
        
        
        <div class="mbr-table-cell col-md-5 text-xs-center text-md-left content-size">
        <h3 class="mbr-section-title display-2">'
        .$row['fname'].' '.$row['lname'].
        '</h3>
        <div class="lead">';
        if($row['gender']!=NULL)
        {
        echo '<p>Gender: '
        .$row['gender'].'';
        }
        echo '<br>'
        .$row['summary'].
        '</p>
        
        </div>
        
        </div>
        </div>
        </div>
        </div>
        
        </section>
        
        <section class="mbr-section mbr-section__container" id="buttons1-c" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
        
        <div class="container">
        <div class="row">
        <div class="col-xs-12">';
        if($row['layout']!=NULL)
        {
        echo '<div class="text-xs-center"> <a class="btn btn-black btn-black-outline" href="studentprofileedit.php">Edit Your Profile</a><a class="btn btn-black btn-black-outline" href="layout'.$row['layout'].'.php">See your CV</a></div>';
        }
    else
        echo '<div class="text-xs-center"> <a class="btn btn-black btn-black-outline" href="studentprofileedit.php">Edit Your Profile</a><a class="btn btn-black btn-black-outline" href="layout1.php">See your CV</a></div>';
        echo '</div>
        </div>
        </div>
        
        </section>
        
        
        <section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="false" id="slider-k">
        <div>
        <div>
        <div>
        
        <div class="carousel-inner" role="listbox">
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full active" data-bg-video-slide="false" style="background-image: url(assets/images/man-back.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(0, 0, 0);"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Present Position</h2>
        <p class="mbr-section-lead lead">
        
        <h1 style="color:white">'
        .$row['programme'].
        '<br>'
        .$row['discipline'].
        '<br>'
        .$row['cpi'].
        '<br>
        </h1><h6 style="color:white">';
        if($row['start_year']!=NULL)
        {
        echo 'Since'
        .$row['start_year'].'';
        }
        
        echo
        '<br><br></h6>
        
        </p>
        
        
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">General Information</h2>
        <p class="mbr-section-lead lead">
        
        <h3 style="color:white">
        <p><b>Date of Birth</b> '
        .$row['dob'].
        '<br>
        <b>'
        .$row['gender'].
        '</b> , 
        <br><b>Speaks</b><br> ';
        while ($row3 = mysqli_fetch_assoc($result3))
        {
            echo '<h3 style="color:white">'.$row3['lname'].'</h3><br>';
        }
        echo '</p>
        </h3>
        </p>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Education</h2>
        <p class="mbr-section-lead lead">';
        while ($row = mysqli_fetch_assoc($result10))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">'
            .$row['degree'].
            '</h3>
            </div>
            <div class="panel-body">
            Institute'
            .$row['institute'].
            '<br>'
            .$row['start_year'].'-'.$row['end_year'].
            '<br>Stream '
            .$row['stream'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Projects</h2>
        <p class="mbr-section-lead lead">';
        while ($row1 = mysqli_fetch_assoc($result1))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">'
            .$row1['pname'].
            '</h3>
            </div>
            <div class="panel-body">Status '
            .$row1['pstatus'].
            '<br>'
            .$row1['sdate'].'-'.$row1['edate'].
            '<br>Summary - '
            .$row1['summary'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</p>
        
        
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Achievements</h2>
        <p class="mbr-section-lead lead">';
        
        while ($row = mysqli_fetch_assoc($result2))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">'
            .$row['title'].
            '</h3>
            </div>
            <div class="panel-body">'
            .$row['date'].
            '<br>'
            .$row['description'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</p>
        
        
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Publications</h2>
        <p class="mbr-section-lead lead">';
        
        while ($row8 = mysqli_fetch_assoc($result8))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">
            </h3>
            </div>
            <div class="panel-body">'
            .$row8['pubdate'].
            '<br>Subject '
            .$row8['subject'].
            '<br>Organization '
            .$row8['organization'].
            '<br>'
            .$row8['description'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Courses</h2>
        <p class="mbr-section-lead lead">';
        
        while ($row = mysqli_fetch_assoc($result6))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">'
            .$row['title'].
            '</h3>
            </div>
            <div class="panel-body">'
            .$row['date'].
            '<br>'
            .$row['description'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Work Experience</h2>
        <p class="mbr-section-lead lead">';
        
        
        while ($row = mysqli_fetch_assoc($result5))
        {
            echo '<div style="border:2px solid white ; border-radius:20px; color:white" class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">'
            .$row['title'].
            '</h3>
            </div>
            <div class="panel-body">Company - '
            .$row['organization'].
            '<br>'
            .$row['join_date'].'-'.$row['end_date'].
            
            '<br>Location '
            .$row['location'].
            '<br>'
            .$row['description'].
            '</div>
            </div>
            <div><p><br></p></div>';
        }
        
        echo '</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Skills</h2>
        
        <p class="mbr-section-lead lead">';
        
        while ($row = mysqli_fetch_assoc($result9))
        {
            echo '<h3 style="color:white">'.$row['skill'].'</h3> <br>';
        }
        echo '</p>
        
        
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/bridge.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0.8;"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Interests</h2>
        <p class="mbr-section-lead lead">I am interested in.</p>';
        
        while ($row = mysqli_fetch_assoc($result4))
        {
            echo '<h3 style="color:white">'.$row['interest'].'</h3> <br>';
        }
        
        echo '</div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/sparklers.jpg);">
        <div class="mbr-table-cell">
        <div class="mbr-overlay"></div>
        <div class="container-slide container">
        
        <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
        <h2 class="mbr-section-title display-1">Contact Information</h2>
        <p style ="color:white " class="mbr-section-lead lead">';
        
        while ($row = mysqli_fetch_assoc($result11))
        {
            echo '<h2> <b>'.$row['contact'].'</b></h2>';
        }
        echo '<p> <b>'
        .$row['facebook'].
        '</b></p>
        <p> <b>'
        .$row['linked_in'].
        '</b></p>
        <p> <b>'
        .$row['twitter'].
        '</b></p>
        <p> <b>'
        .$row['website'].
        '</b></p>
        
        </p>
        
        
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>';
    
    
    echo '<a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-k">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-k">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
    </div>
    </div>
    </section>';
    ?>


<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-1" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

<div class="container">
<p class="text-xs-center">Tenacity 2017.</p>
</div>
</footer>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/smooth-scroll.js"></script>
<script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
<script src="assets/masonry/masonry.pkgd.min.js"></script>
<script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/mobirise-gallery/player.min.js"></script>
<script src="assets/mobirise-gallery/script.js"></script>


<input name="animation" type="hidden">
</body>
</html>
