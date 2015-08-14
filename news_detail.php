<?php

include_once("header.php");
include_once("connect.php");

?>

<?php


$news_id = $_GET['id'];

//check in db
$check = mysql_query("select * from posts where id = '$news_id'");
$cn = mysql_num_rows($check);
if($cn == 1)
{

}
else
{
	die("nothing can run here");
	exit();
}



?>

<h1> See full article and then comment on it</h1>





		<?php
		
		$getPosts = mysql_query("select * from posts where id = '$news_id'");

		$row = mysql_fetch_assoc($getPosts);

		
		$un = $row['posted_by'];
		$da = $row['posted_on'];
		$wa = $row['post_body'];

		echo "<br><b> <i>".$un."</b> </i>&nbsp";
		echo "posted on <b>";
		echo $da."</b>  ";

		echo "&nbsp &nbsp &nbsp"; 

		if($un == $user)
		{
			?>

			<a href='delete_post.php?id=<?php echo $news_id; ?>' > Delete </a>

			<?php
		}
		else 
		{

		}

		?>


		<?php



		echo "<br> <br>";

		echo $wa;

		?>
		<br> <br>
		<hr>
		<h4>Make Your Comment Here:</h4>

		<?php 

		//saving comment to db::

		if(isset($_POST['com']))
		{
			//change the comment to the variable and then save to db

			$comment = $_POST['cmt'];
			$posted_by = $user;
			$posted_on = date("Y/m/d");
			$p_id = $news_id;


			//save::

			$save_comment = mysql_query("insert into comments VALUES ('','$news_id','$comment','$posted_by','$posted_on')") or die(mysql_error());

			?>

			<script>
				window.alert('Congratulation !!Your comment has been posted ');
			</script>



		<?php

			

		}



		?>

		<form action="#" method="POST">
			<textarea rows="4" cols="90" name="cmt" required></textarea><br> <br>
			<button name="com" class = "btn btn-warning"> Comment </button>

		</form>

		<hr>
		<h3> Recent Comments: <hr></h3>

		<?php

		//displaying the comments:

		$getComments = mysql_query("select * from comments where post_id ='$news_id' order by id DESC") or die(mysql_error());

		while ($get = mysql_fetch_assoc($getComments))
			{

				$cm_id = $get['id'];
				$cmter = $get['cmt_by'];
				$da = $get['cmt_date'];
				$com = $get['comment'];

				
				echo "<b>".$cmter." </b> commented on <b> ". $da;

				echo "&nbsp &nbsp &nbsp &nbsp";

				if($cmter == $user)	
				{
					?>

					<a href='delete_comment.php?id=<?php echo $cm_id; ?>' > Delete </a>
					<?php
				}
				else 
				{
					// dont allow them to delte it
				}


				?>

	

				<?php

				echo " <br> </b>".$com;

				echo "<br> <hr> ";



			}



		?>

	</div>
	<div class="footer">

			&copy Simple blog by Bijaya Prasad Kuikel | 2015  |

		</div>

		




