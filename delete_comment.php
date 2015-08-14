<?php

include_once("header.php");
include_once("connect.php");

?>

<?php


$com_id = $_GET['id'];

		$getValue = mysql_query("SELECT * FROM comments where id = '$com_id'") or die(mysql_error());

			$fet = mysql_fetch_assoc($getValue);

			$p_id = $fet['post_id'];

		



 	//code deletion goes here::

	$delete_com = mysql_query("delete from comments where id='$com_id' && cmt_by = '$user'") or die(mysql_error());

	if($delete_com)
	{
		header("location: news_detail.php?id=$p_id");


	}
	else
	{
		echo "You cannot delete this";
	}
	?>