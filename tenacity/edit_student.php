<?php
    //Start the session to see if the user is authenticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
    {
        //Connect to mysqli server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","cv_management");
        $link = mysqli_connect('localhost', 'root', '', 'cv_management');
        /*Check link to the mysqli server*/
        if(!$link)
        {
            die('Failed to connect to server: ' . mysqli_error($link));
        }
        /*Select database*/
        $db = mysqli_select_db($link,'cv_management');
        if(!$db)
        {
            die("Unable to select database");
        }
        // Code to be executed when 'Update' is clicked.
        $mid=$_SESSION['mid'];
		
		if(isset($_POST['layoutsubmit']) && $_POST['layoutsubmit'] == 'Submit')
        { 
            $layout = $_POST['layoutupdate'];
            $query="UPDATE member SET layout='$layout' WHERE mid='$mid'";
            //Execute query
            $results = mysqli_query($link,$query);
            if($results == FALSE)
                echo mysqli_error($link) . '<br>';
          
        }
		if(isset($_POST['securitysubmit']) && $_POST['securitysubmit'] == 'Submit')
        {
            if($_POST['usernameupdate'])
            {
                $username = $_POST['usernameupdate'];
                $query="UPDATE register SET username='$username' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
              
            }
            if($_POST['passwordupdate'])
            {
                $password = $_POST['passwordupdate'];
				$password = hash('sha512',$password);
                $query="UPDATE register SET password='$password' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
        }
		if(isset($_POST['generalsubmit']) && $_POST['generalsubmit'] == 'Submit')
        {
            $query="SELECT mid FROM member WHERE EXISTS '$mid'";
            $results = mysqli_query($link,$query);
            if($results == TRUE)
            {
                if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE member SET profile_pic = '$image' WHERE mid = '$mid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";
            if($_POST['nameupdatef'])
            {
                $fname = $_POST['nameupdatef'];
                $query="UPDATE member SET fname='$fname' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['nameupdatel'])
            {
                $lname = $_POST['nameupdatel'];
                $query="UPDATE member SET lname='$lname' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['dobupdate'])
            {
                $dob = $_POST['dobupdate'];
                $query="UPDATE member SET dob='$dob' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['genderupdate'])
            {
                $gender = $_POST['genderupdate'];
                if($gender==1)
                    $gender='male';
                else if($gender==2)
                    $gender='female';
                else
                    $gender='other';
                $query="UPDATE member SET gender='$gender' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['discipline'])
            {
                $discipline = $_POST['discipline'];
                $query="UPDATE member SET discipline='$discipline' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['programme'])
            {
                $programme = $_POST['programme'];
                $query="UPDATE member SET programme='$programme' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['cpiupdate'])
            {
                $cpi= $_POST['cpiupdate'];
                $query="UPDATE member SET cpi='$cpi' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['startyearupdate'])
            {
                $start_year= $_POST['startyearupdate'];
                $query="UPDATE member SET start_year='$start_year' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            }
            else
            {
                $dob = $_POST['dobupdate'];
                $cpi= $_POST['cpiupdate'];
                $discipline = $_POST['discipline'];
                $programme = $_POST['programme'];
                $gender = $_POST['genderupdate'];
                $lname = $_POST['nameupdatel'];
                $fname = $_POST['nameupdatef'];
                $start_year= $_POST['startyearupdate'];
                $query="INSERT INTO member(mid, dob, fname, lname, gender, cpi, discipline, start_year, programme) VALUES ('$mid', '$dob', '$fname', '$lname', '$gender', '$cpi', '$discipline', '$start_year', '$programme')";
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
                if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE member SET profile_pic = '$image' WHERE mid = '$mid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";
            }
        }
		if(isset($_POST['newlanguagesubmit']) && $_POST['newlanguagesubmit'] == 'Submit')
        { 
            $lname = $_POST['newlang'];
			
            $qry = "SELECT lid FROM languages WHERE lname = '$lname'";
            $result = mysqli_query($link,$qry);
			$res = mysqli_fetch_assoc($result);
            $lid = $res['lid'];
            if($result)
            {
            $query="INSERT INTO knows(mid,lid) VALUES('$mid','$lid')";
            //Execute query
            $results = mysqli_query($link,$query);
            if($results == FALSE){
			echo mysqli_error($link) . '<br>';}
            
            }
        }
		if(isset($_POST['newinterestsubmit']) && $_POST['newinterestsubmit'] == 'Submit')
	  
        {
            if($_POST['addinterest'])
            {
                $interest = $_POST['addinterest'];
                $query="INSERT INTO interests (interest,mid) VALUES('$interest','$mid')";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
        }
		if(isset($_POST['contactsubmit']) && $_POST['contactsubmit'] == 'Submit')
        {
            if($_POST['twitterhandle'])
            {
                $twitter = $_POST['twitterhandle'];
                $query="UPDATE member SET twitter='$twitter' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['facebookhandle'])
            {
                $facebook = $_POST['facebookhandle'];
                $query="UPDATE member SET facebook='$facebook' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['linkedinhandle'])
            {
                $linkedin = $_POST['linkedinhandle'];
                $query="UPDATE member SET linked_in='$linkedin' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
            if($_POST['userphone'])
            {
                $q="SELECT * FROM contacts WHERE mid='$mid'";
                $r = mysqli_query($link,$q);
                /*if($row = mysqli_fetch_assoc($r)!=NULL)
                {
                    $contact = $_POST['userphone'];
                    $query="UPDATE contacts SET contact='$contact' WHERE mid='$mid'";
                    //Execute query
                    $results = mysqli_query($link,$query);
                    if($results == FALSE)
                        echo mysqli_error($link) . '<br>';
                    else
                        echo mysqli_info($link);
                }
                else
                {*/
                    $contact = $_POST['userphone'];
                    $query="INSERT INTO contacts (mid, contact) VALUES('$mid','$contact')";
                    //Execute query
                    $results = mysqli_query($link,$query);
                    if($results == FALSE)
                        echo mysqli_error($link) . '<br>';
				//}
                
            }
			
            if($_POST['website'])
            {
                $website = $_POST['website'];
                $query="UPDATE member SET website='$website' WHERE mid='$mid'";
                //Execute query
                $results = mysqli_query($link,$query);
                if($results == FALSE)
                    echo mysqli_error($link) . '<br>';
               
            }
        }
		if(isset($_POST['newachievementsubmit']) && $_POST['newachievementsubmit'] == 'Submit')
        {
            $title = $_POST['newachievementname'];
            $date = $_POST['newachievementdate'];
            $description = $_POST['newachievementdescription'];
            //Create Insert query
            $query = "INSERT INTO achievements (mid, title, description, date) VALUES ('$mid','$title',";
            if(!$description)
                $query = $query . " NULL,";
            else
                $query = $query . " '$description',";
            $query = $query . "'$date')";
            //Execute query
            $results = mysqli_query($link,$query);
            $q = "SELECT * FROM achievements WHERE mid='$mid' AND title='$title' AND description='$description'";
            $r = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($r);
            $aid = $row['aid'];
             if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE achievements SET issuer = '$image' WHERE mid = '$mid' AND aid = '$aid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";

            
        }
		if(isset($_POST['neweducationsubmit']) && $_POST['neweducationsubmit'] == 'Submit')
       
        {
            $institute = $_POST['neweduinstitutename'];
            $degree = $_POST['newedudegree'];
            $stream = $_POST['newedustream'];
            $start_year = $_POST['newedustartyear'];
            $end_year = $_POST['neweduendyear'];
            $marksheet = $_POST['newedumarksheet'];
            //Create Insert query
            $query = "INSERT INTO education (mid, start_year, end_year, institute, stream, degree) VALUES ('$mid','$start_year','$end_year','$institute',";
			if(!$stream)
                $query = $query . " NULL)";
            else
                $query = $query . " '$stream',";
            if(!$degree)
                $query = $query . " NULL)";
            else
                $query = $query . " '$degree')";
            //Execute query
            $results = mysqli_query($link,$query); 
			 //Execute query
            $q = "SELECT * FROM education WHERE mid='$mid' AND start_year='$start_year' AND institute='$institute'";
            $r = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($r);
            $eid = $row['eid'];
             if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE education SET marksheet = '$image' WHERE mid = '$mid' AND eid = '$eid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";

        }
		if(isset($_POST['newprojectsubmit']) && $_POST['newprojectsubmit'] == 'Submit')
        {
            $pname = $_POST['newprojectname'];
            $pstatus = $_POST['newstatus'];
            $summary = $_POST['newprojectdescription'];
            $sdate = $_POST['newprojectstartyear'];
            $edate = $_POST['newprojectendyear'];
            $plink = $_POST['newprojectlink'];
            //Create Insert query
            $query = "INSERT INTO project (mid, pname, pstatus, summary, sdate, edate, plink) VALUES ('$mid', '$pname','$pstatus',";
            if(!$summary)
                $query = $query . " NULL,";
            else
                $query = $query . " '$summary',";
            $query = $query . "'$sdate',";
            if(!$edate)
                $query = $query . " NULL)";
            else
                $query = $query . " '$edate',";
            if(!$plink)
                $query = $query . " NULL)";
            else
                $query = $query . " '$plink')";
            //Execute query
            $results = mysqli_query($link,$query); 
        }
		if(isset($_POST['newcoursesubmit']) && $_POST['newcoursesubmit'] == 'Submit')

        {
            $title = $_POST['newcoursename'];
            $date = $_POST['newcoursedate'];
            $description=$_POST['newcoursedescription'];
            //Create Insert query
            $query = "INSERT INTO courses (mid, title, description, date) VALUES ('$mid','$title',";
            if(!$description)
                $query = $query . " NULL,";
            else
                $query = $query . " '$description',";
			$query = $query . " '$date')";
            //Execute query
            $results = mysqli_query($link,$query);
			 //Execute query
            $q = "SELECT * FROM courses WHERE mid='$mid' AND title='$title' AND date='$date'";
            $r = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($r);
            $cid = $row['cid'];			
			 if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE courses SET certificate = '$image' WHERE mid = '$mid' AND cid = '$cid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";

        }
		if(isset($_POST['newexperiencesubmit']) && $_POST['newexperiencesubmit'] == 'Submit')
       
        {
            $title = $_POST['newworktitle'];
            $description = $_POST['newworkdescription'];
            $location = $_POST['newworklocation'];
            $join_date = $_POST['newworkstartdate'];
            $end_date = $_POST['newworkenddate'];
            $organization = $_POST['newworkorganisation'];
            //Create Insert query
            $query = "INSERT INTO experience (mid, title, description, location, join_date, end_date, organization) VALUES ('$mid','$title',";
            if(!$description)
                $query = $query . " NULL,";
            else
                $query = $query . " '$description',";
            if(!$location)
                $query = $query . " NULL,";
            else
                $query = $query . " '$location',";
            $query = $query . "'$join_date',";
            if(!$end_date)
                $query = $query . " NULL,";
            else
                $query = $query . " '$end_date',";
            $query = $query . " '$organization')";
            //Execute query
            $results = mysqli_query($link,$query);
			 if($results == FALSE)
                echo mysqli_error($link) . '<br>';
			//Execute query
            $q = "SELECT * FROM experience WHERE mid='$mid' AND title='$title' AND organization='$organization'";
            $r = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($r);
            $exid = $row['exid'];
			 if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE experience SET validation = '$image' WHERE mid = '$mid' AND exid = '$exid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";

        }
		if(isset($_POST['newpublicationsubmit']) && $_POST['newpublicationsubmit'] == 'Submit')
      
        {
            $subject = $_POST['newpublicationsubject'];
            $date = $_POST['newpublicationdate'];
            $description=$_POST['newpublicationdescription'];
            $organization = $_POST['newpublicationorganisation'];
            $pubdate = $_POST['newpublicationdate'];
            //Create Insert query
            $query = "INSERT INTO publications (mid, subject, organization, pubdate, description) VALUES ('$mid','$subject',";
            $query = $query . "'$organization','$date',";
            if(!$description)
                $query = $query . " NULL)";
            else
                $query = $query . " '$description')";
            //Execute query
            $results = mysqli_query($link,$query); 
			
			 if($results == FALSE)
                echo mysqli_error($link) . '<br>';
			//Execute query
            $q = "SELECT * FROM publications WHERE mid='$mid' AND subject='$subject' AND organization='$organization'";
            $r = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($r);
            $pubid = $row['pubid'];
			 if (empty($_FILES['logo']['name']))
                {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
                        $db = mysqli_select_db($link,'cv_management');
                        //storind the data in your database
                        $query= "UPDATE publications SET validation = '$image' WHERE mid = '$mid' AND pubid = '$pubid'";
                        $results=mysqli_query($link,$query);
                        if($results == FALSE)
                            echo mysqli_error($link) . '<br>';
                       
                    }    
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
	           else
                   echo "No File Selected";

        }
		if(isset($_POST['newskillsubmit']) && $_POST['newskillsubmit'] == 'Submit')
        { 
            $skill = $_POST['newskill'];
            $qry = "SELECT sid FROM skills WHERE skill='$skill'";
            $result = mysqli_query($link,$qry);
			$row = mysqli_fetch_assoc($result);
            $sid=$row['sid'];
            if($result)
            {
            $query="INSERT INTO has(sid,mid) VALUES('$sid','$mid')";
            //Execute query
            $results = mysqli_query($link,$query);
            if($results == FALSE)
                echo mysqli_error($link) . '<br>';
            
            }
        }
		}
    ?>
<html>
   <head>
   
      <script type="text/javascript">
         <!--
            function Redirect() {
               window.location="studentprofileedit.php";
            }
            
           
            setTimeout('Redirect()', 0);
             </script>
      
   </head>
   
   <body>
   </body>
</html>