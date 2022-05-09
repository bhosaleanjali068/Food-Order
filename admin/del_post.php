<?php
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
$id=$_GET['id'];
if($res=mysql_query("DELETE FROM post WHERE ID='".$id."'"))
	{
	echo'
		<script>
		alert("post Deleted Successfully....!");
		window.location.href="view_post.php";
		</script>
		';
	}


?>