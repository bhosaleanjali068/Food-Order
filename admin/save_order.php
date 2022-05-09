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

  if(isset($_POST['final_save']))
  {
    $odate=$_POST['odate'];
    $Name=$_POST['Name'];
    $Mobile=$_POST['Mobile'];
    $Address=$_POST['Address'];
    $Gtotal=$_POST['Gtotal'];
    $Paid=$_POST['Paid'];
    $Remaining=$_POST['Remaining'];

    if($res=mysql_query("INSERT INTO sale VALUES('','".$odate."','".$Name."','".$Mobile."','".$Address."','".$Gtotal."','".$Paid."','".$Remaining."','".$_SESSION['admin']."')"))
    {
      $max=mysql_fetch_row(mysql_query("SELECT MAX(ID) FROM sale"));
      echo"SELECT * FROM temp_sale_item";
      $res1=mysql_query("SELECT * FROM temp_sale_item");
      while($row1=mysql_fetch_row($res1))
      {
        echo"INSERT INTO sale_item VALUES('','".$row1[1]."','".$row1[2]."','".$row1[3]."','".$row1[4]."','".$max[0]."')";
        $res_ins=mysql_query("INSERT INTO sale_item VALUES('','".$row1[1]."','".$row1[2]."','".$row1[3]."','".$row1[4]."','".$max[0]."')");
      }
      echo'
  <script>
  alert("Food Order Successfully");
window.location.href="add_order.php";
  </script>
  ';
    }

  }
?>