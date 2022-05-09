<?php
session_start();
if(isset($_SESSION['main']))
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
?>
<?php
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index.php"></a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    

  
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text" style="color: #fff">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<?php
include("menu.php");
?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
  
<!--End-Chart-box--> 
    <hr/>
    <div class="row-fluid">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Food List</h5>
          </div>
          <div class="widget-content nopadding" style="overflow-y:auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Sr</th>
                  
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Hotel Name</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">City</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Hotel Address</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Owner Name</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Owner Mobile</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Username</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Password</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">Hotel Image</th>
                  
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">UPDATE</th>
                  <th style="background-color:#33ccff;color:#fff;font-size:15px">DELETE</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $res=mysql_query("SELECT * FROM hotel");
                $a=1;
                while($row=mysql_fetch_row($res))
                {
                  $row_c=mysql_fetch_row(mysql_query("SELECT * FROM city WHERE C_ID='".$row[8]."'"));
                  echo'<tr class="gradeX">
                  <td>'.$a.'</td>
                  <td>'.$row[1].'</td>
                  <td>'.$row_c[1].'</td>
                  <td>'.$row[2].'</td>
                  <td>'.$row[3].'</td>
                  <td>'.$row[4].'</td>
                  <td>'.$row[6].'</td>
                  <td>'.$row[7].'</td>
                  <td><img src="'.$row[5].'" style="height:100px;"></td>
                <td style="text-align:center"><a href="up_hotel.php?id='.$row[0].'">
                  <button class="btn btn-primary btn-xs">Update</button></a></td>
                
                <td style="text-align:center"><a href="del_hotel.php?id='.$row[0].'">
      <button class="btn btn-danger btn-sm">Delete</button></a></td>
                </tr>';
                $a++;
                }
              ?>


                
               
               
              </tbody>
            </table>
          </div>
        </div>
     
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
