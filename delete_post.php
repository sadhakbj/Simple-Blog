<?php

include_once("header.php");
include_once("connect.php");

?>

<?php


$news_id = $_GET['id'];



 	//code deletion goes here::

	$delete_post = mysql_query("delete from posts where id='$news_id' && posted_by = '$user'") or die(mysql_error());

	if($delete_post)
	{
		header('Refresh: 0.5; URL=home.php');

		?>
		<script type="text/javascript">
			window.alert('Your post is deleted');
		</script>

		<?php
	}
	else
	{
		echo "You cannot delete this";
	}
		

			


?>