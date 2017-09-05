<?php 
	/*Connect to @mysql server*/ 
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASSWORD","");
	define("DB_DATABASE","cv_management");
	$link = @mysql_connect('localhost', 'root', '','cv_management');
	
	/*Check link to the @mysql server*/ 
	if(!$link){ 
		die('Failed to connect to server: ' . @mysql_error());
	} 
	else{
		/*Select database*/ 
		$db = @mysql_select_db('cv_management');
		if(!'cv_management'){
			die("Unable to select database"); 
		}
		else{
		if (isset($_POST['companyaddsubmit'])){
		if (isset($_POST['compusernameadd'])) {
		$username = $_POST['compusernameadd'];
		}

		if (isset($_POST['comppasswordadd'])) {
		$password = $_POST['comppasswordadd'];
}

		
				 
		
		if($username && $password){
		$password = hash('sha512',$password);
		//Create Insert query 
		$query = "INSERT INTO recruiters(username,password) VALUES ('$username','$password')"; 
		//Execute query 
		$results = @mysql_query($query); 
		//header('location:index.html');
		
		if($results == FALSE) 
		echo @mysql_error() . '<br>'; 
		else 
		echo 'inserted successfully';
	}
		
		}






} 
}

?>