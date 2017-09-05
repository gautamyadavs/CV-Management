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
	

		if ($_POST['register-submit'] == 'Register Now'){
	
		$username = $_POST['studentname']; 
		$password = $_POST['password'];		 
		$email = $_POST['studentemail']; 

		if($username && $password && $email){
		$password = hash('sha512',$password);
		//Create Insert query 
		$query = "INSERT INTO register(username,password,email) VALUES ('$username','$password','$email')"; 
		//Execute query 
		$results=mysqli_query($link,$query);
		//header('location:index.html');
		
		if($results == FALSE) 
		echo mysql_error() . '<br>'; 
		else 
		{ 
		$to      = $email;
		$subject = 'Email Verification';
		
		$message = 'Thanks for signing up, you are verified. You can login now!';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: ankitamakker7@gmail.com' . "\r\n" .
		'Reply-To: ankitamakker7@gmail.com' . "\r\n" .
		'X-Mailer: PHP/'. phpversion();

		if(mail($to, $subject, $message, $headers)) {
		//$query = "UPDATE register SET active='1' where email='$email'"; 
		//Execute query 
		//$results = @mysql_query($query);
		//echo 'Email sent successfully!';
		header('Location: index.html');
	
		} else {
		die('Failure: Email was not sent!');
		}
		}
		


}




} 
}
		}
	
	
		
?>