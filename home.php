
<?php

include_once("header.php");
include_once("connect.php");

?>

<h2> See the different articles .. then you can comment on it</h2>






		<form action="#" method="POST" class="form-horizontal" role="form">
			<textarea  rows = "7" cols ="90" name="posts" required></textarea>
			<br> <br>

			<button name = "make" class = "btn btn-info"> Post a new Article !!</button>

		</form>

  
	
	<div class="wall">

			<?php

			//we will get data from database and display it here

			$getPosts = mysql_query("select * from posts ORDER by id DESC") or die(mysql_error());

			while($row = mysql_fetch_assoc($getPosts)) 
			{
				//now save the value from the database to the variable::

				$n_id = $row['id'];

				$un = $row['posted_by'];
				$da = $row['posted_on'];
				$wa = $row['post_body'];

				echo "<br><b> <i>".$un."</b> </i>&nbsp";
				echo "posted on <b>";
				echo $da."</b> <br> <br>";
		echo $wa;				

				?>

<a href='news_detail.php?id=<?php echo $n_id; ?>' > More </a>

				<hr>

			<?php


			}

		


			?>


		</div>
	
		</div>

		<div class="footer">

			&copy Simple blog by Bijaya Prasad Kuikel | 2015  |

		</div>



<?php

	if(isset($_POST['make'])) 
	{

		//save your input to variable and then display it::

		$wall = $_POST['posts'];
		$posted_by = $user;
		$posted_on = date("Y/m/d");

		//now we save it to database::

		$savePost = mysql_query("insert into posts VALUES ('','$wall','$posted_by','$posted_on')") or die(mysql_error());
		header("location: home.php");
		?>

			<script>
				window.alert('Congratulation !!Your post has been posted');
			</script>



		<?php

		

	}


?>