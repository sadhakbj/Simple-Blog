<?php

session_start();

//for log out just destroy the session:

//session_destroy();
session_unset();

//header('location: index.php');
header('Refresh: 3; URL=index.php');
echo "You will be redirected to login page";


?>