<?php

mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");

	$food=$_POST['food'];
    $Price=$_POST['Price'];
    $Qty=$_POST['Qty'];
    $Total=$_POST['Total'];

    if($res_ins=mysql_query("INSERT INTO temp_sale_item VALUES('','".$food."','".$Price."','".$Qty."','".$Total."')"))
    {
    	$res1=mysql_query("SELECT * FROM temp_sale_item");
                $a=1;
                while($row1=mysql_fetch_row($res1))
                {
                  $food=mysql_fetch_row(mysql_query("SELECT * FROM food WHERE ID='".$row1[1]."'"));
                  echo'<tr class="gradeX">
                  <td>'.$a.'</td>
                  <td>'.$food[2].'</td>
                  <td>'.$row1[2].'</td>
                  <td>'.$row1[3].'</td>
                  <td>'.$row1[4].'</td>
                  
                </tr>';
                $a++;
                }
    }
?>