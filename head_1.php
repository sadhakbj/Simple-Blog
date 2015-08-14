<?php
require_once("connect.php");
if($_SESSION)
{
	header("location: home.php");
	exit();
}
?>
  
<!doctype html >
<html lang="en" ng-app="myApp">

<head>
	<meta charset="UTF-8">
<title>   Making a simple blog using php</title>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		
</head>
<body>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Simple Blog</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        
        
      </ul>
    </div>
  </div>
</nav>
	
	<div class = "container">
	<div class = "well">
	




