<?php
session_start();
if(isset($_SESSION['admin']))
{

}
else
{
    echo '
 <script>
   window.location.href="../index.php";
    </script>
    ';
}
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
$admin_id=$_SESSION['admin'];
$res=mysql_query("SELECT * FROM hotel WHERE ID='".$admin_id."'");
$row=mysql_fetch_row($res);
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