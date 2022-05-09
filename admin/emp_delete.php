<?php
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
	$id=$_GET['id'];
	if($res=mysql_query("DELETE FROM employee WHERE ID='".$id."'"))
	{
		echo'
		<script>
		alert("Employee Deleted Succeffully....!");
		window.location.href="view_employee.php";
		</script>
		';
	}
?>