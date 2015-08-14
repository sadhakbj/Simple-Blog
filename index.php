<?php
//include connect.php file::

	require_once("head_1.php");
	require_once("connect.php");


	?>

	<?php

@$user = $_SESSION['uname'];

if($user){
	header('location: home.php');
	}

?>

<?php 
	//press button:: registration

	if(isset($_POST['check'])) {
		//saving input to variable::

		$un = $_POST['uname'];
		$pw = $_POST['pswd'];
		$fn = $_POST['fname'];
		$ad = $_POST['add'];
		$ph = $_POST['phone'];

		$reg = mysql_query("insert into users VALUES ('','$un','$pw','$fn','$ad','$ph','')") or die(mysql_error());
		echo "sucessfully registered";
	}
		

?>
	<?php
	//process of login goes here

	//if login button pressed

	if(isset($_POST['login'])){

		//save input as a var and then compare it with db if found login else no

		$Uname = $_POST['lg_un'];
		$Psw = $_POST['lg_pw'];

		//compare this variable to database value::

		$LogCheck = mysql_query("select * from learn.users where uname = '$Uname' and password = '$Psw' ") or die(mysql_error());
		//cunting the number of rows
		$CountLg = mysql_num_rows($LogCheck);

		//main concept goes here , if count = 1 login else no login
		if($CountLg == 1)
		{
			//session start::

			session_start();

			//save session variable username::

			$_SESSION['uname'] = $Uname;

			echo $_SESSION['uname'];

			

			header('location: home.php');

		}
		else
		 {
		 	echo "user name and password incorrect";
		}

		//end of if

	}


	?>

		<div class = "well" style = "border: 1px solid #036;">	
		<h2> Log In Here</h2>
		<form action="#" method="POST" name="login" role="form">


			<table>
				<tr>
					<td> <label>Username: </label> </td>
					<td>		
					<input type="text" name="lg_un" autocomplete="off" class ="form-control" placeholder = "Username" required > 
				</td></tr>

				<tr>
					<td>
		<label>Password: </label>
		</td>
		<td>
		<input type="password" name="lg_pw" class = "form-control" placeholder = "Password" required> 
	</td>

		</tr>

		<tr>
			<td>
		<input type="submit" name="login" value="Log In !!" class = "btn btn-primary btn-block">
	</td>
</tr>
		 </table>
			</form>

			</div>
		</div>
	

	<!- Theis is for registration ->

	<div class = "well">

			<div class = "well" style = "border: 1px solid #036;">	

		<h2> Create a new Account! It's free</h2>

		<form action="#" method="POST">
			<table>
				<tr>
					<td> <label> Username: </label></td>
			<td> <input type="text" name="uname" class = "form-control" placeholder = "Choose Username" required> </td> 
			</tr>
			<tr>
			<td> 
				<label> Password: </label> </td>
				<td>
				<input type="password" name="pswd"  class = "form-control"  placeholder = "Choose Password" required> </td> </tr>
			
			<tr> 
				<td>
				<label> Full Name: </label>
				</td>
				<td>	
				 <input type="text" name="fname" class = "form-control" placeholder = "Your Full Name" required>
				 </td> </tr>
			
			<tr> 
				<td> <label> Address: </label></td>
				<td> <input type="text" name="add" class = "form-control" placeholder = "Your Address" required> </td> </tr>
				 
			<tr> 
				<td>
				<label> Phone No: </label>
				</td>
				<td>
				 <input type="text" name="phone" class = "form-control" placeholder = "Your Phone Number" required> </td> </tr>
			 
			 <tr> <td> <input type="submit" name="check" value="Register" class = "btn btn-lg btn-success"> </td>  </tr>
			
		

			</table>
			
		</form>
		
		</div>



	</body>


</html>
