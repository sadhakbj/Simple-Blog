
<?php

include_once("header.php");
include_once("connect.php");

?>

<?php


$userName = $_GET['u'];

echo $userName;

if(!$userName)
{
	die("You are not allowed to view this page");
	exit();
}


?>




<hr>
<?php
	//we will display the information of the people here::

		$getInfo = mysql_query("select * from users WHERE uname = '$userName'") or die(mysql_error());

		$cnt = mysql_num_rows($getInfo);
		if($cnt != 1)
		{
			die("user not available");
			exit();
		}
		


		$get = mysql_fetch_assoc($getInfo);

		//save to variables from db::

		$name = $get['fullname'];
		$add = $get['address'];
		$phone = $get['phone_no'];
		$imageLoc = $get['img'];

		?>

			<div
			 style="height: 200px; 
			 width: 200px; 
			 background-color: #dadada;"
						>

					<img src="<?php echo $imageLoc; ?>" 
					style="
						height: 180px;
						width: 180px;
						margin: 10px;
					">

			</div>
<h1> Welcome to profile page of : <?php echo $userName;   ?> </h1>


		<h4>
		Details: </h4> 

		<b> Name: </b> <?php echo $name; ?> <br>
		<b> Address: </b> <?php echo $add; ?> <br>
		<b> Phone: </b> <?php  echo $phone; ?>  <hr>

<?php
//

?>

	</div>
	<div class="footer">

			&copy Simple blog by Bijaya Prasad Kuikel | 2015  |

		</div>
		
		