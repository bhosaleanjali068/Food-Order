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
?><?php
mysql_connect("localhost","root","")or die("server error");
mysql_select_db("foodi_db")or die("database error");
$admin_id=$_SESSION['admin'];
$res=mysql_query("SELECT * FROM hotel WHERE ID='".$admin_id."'");
$row=mysql_fetch_row($res);
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
     <li class=""><span class="text" style="color: #fff;margin-left:300px;font-size:20px;"><?php echo$row[1]; ?></span></li>
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
            <h5>Order List</h5>
          </div>
          <div class="widget-content nopadding" style="overflow-x:auto">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#33ccff;color:#fff">Sr</th>
                  
                  <th style="background-color:#33ccff;color:#fff">Food Name</th>
                   <th style="background-color:#33ccff;color:#fff">Price</th>
                   <th style="background-color:#33ccff;color:#fff">Qty</th>
                   <th style="background-color:#33ccff;color:#fff">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $id=$_GET['id'];
                $res=mysql_query("SELECT * FROM sale_item WHERE SALE_ID='".$id."'");
                $a=1;
                while($row=mysql_fetch_row($res))
                {
                  $row_t=mysql_fetch_row(mysql_query("SELECT * FROM food WHERE ID='".$row[1]."'"));
                  echo'<tr class="gradeX">
                  <td>'.$a.'</td>
                  <td>'.$row_t[2].'</td>
                  <td>'.$row[2].'</td>
                  <td>'.$row[3].'</td>
                  <td>'.$row[4].'</td>
                  
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
