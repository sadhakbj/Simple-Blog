<?php

//to connect to the database and the server::

	$connect = mysql_connect("localhost","root","");
	
	//selecting the database::
	$db = mysql_select_db("learn");

	if(!$connect && !$db) {

		echo "There is problem in the connection";		
	
		}
		else {

	//do nothing
	}


	session_start();
	@$user = $_SESSION['uname'];

		if($user){
			//do nothing

		}




?>
