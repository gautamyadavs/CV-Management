
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
			$count=0;
			if ($_POST['login-submit'] == 'Login'){ 
			//Collect POST values 
				$username = $_POST['username']; 
				$password = $_POST['password']; 
				if($username && $password){ 
					$password = hash('sha512',$password);
                    
					//Create query (if you have a Logins table the you can select login id and password from there)
					$qry="SELECT * FROM recruiters WHERE username = '$username' AND password = '$password'";
					//Execute query 
					$result=mysqli_query($link,$qry); 
					//Check whether the query was successful or not 
					while ($row = mysqli_fetch_assoc($result)){ 
						if($row['username']==$username && $row['password']==$password)
							$count=1;
					}
					
				}
				else{
					//Login failed 
					include('passwordincorrect.html');
					echo '<center>Incorrect Username or Password !!!</center>'; 
					exit(); 
				}
			}
			
			//if query was successful it should fetch 1 matching record from the table. 
			if( $count == 1){ 
			
				//Login successful set session variables and redirect to main page. 
				session_start(); 
				$_SESSION['IS_AUTHENTICATED'] = 1;
				$qry="SELECT * FROM recruiters WHERE recruiters.username = '$username'";
				$result=mysqli_query($link,$qry);	
				$row = mysqli_fetch_assoc($result);
				$_SESSION['rid'] = $row['rid'];
                header('location: companyprofile.php');
				
			} 
			else{ 
				//Login failed 
				include('passwordincorrect.html'); 
				echo '<center>Incorrect Username or Password !!!</center>'; 
				exit(); 
			} 
			
		} 
		
	}	
	

?>
