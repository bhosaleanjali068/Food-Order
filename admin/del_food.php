<?php
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
$id=$_GET['id'];
if($res=mysql_query("DELETE FROM food WHERE ID='".$id."'"))
	{
	echo'
		<script>
		alert("food Deleted Successfully....!");
		window.location.href="view_food.php";
		</script>
		';
	}


?>