<?php

mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
if(isset($_POST['food']))
{
	$food=$_POST['food'];
	$row_food=mysql_fetch_row(mysql_query("SELECT * FROM food WHERE ID='".$food."'"));
	echo$row_food[3];
}
if(isset($_POST['caltotal']))
{
	$row_tot=mysql_fetch_row(mysql_query("SELECT SUM(TOTAL) FROM temp_sale_item"));
	echo$row_tot[0];

}
?>