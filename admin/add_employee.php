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
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
    <div class="span2"></div>
    <div class="span6">
       <div class="row-fluid">
     <div class="widget-box">
        <div class="widget-title" style="background-color: green; color: #fff"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5 style="color: #fff">Add_employee</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="add_employee.php"  method="POST" class="form-horizontal">

           <div class="control-group">
              <label for="normal" class="control-label">post</label>
              <div class="controls">
                <select name="post">
                <option>---Select Type---</option>
                  <?php
                    $res=mysql_query("SELECT * FROM post WHERE HOTEL_ID='".$admin_id."'");
                    while($row=mysql_fetch_row($res))
                    {
                      echo"<option value=".$row[0].">".$row[1]."</option>";
                    }
                  ?>
                </select>
                 </div>
           


            <div class="control-group">
              <label for="normal" class="control-label">employee name</label>
              <div class="controls">
                  <input type="text" name="name">
              </div>
            </div>
             
          
            <div class="control-group">
              <label for="normal" class="control-label">employee address</label>
              <div class="controls">
                 <textarea name="address"></textarea>
            </div>
           
            <div class="control-group">
              <label for="normal" class="control-label">employee email id</label>
              <div class="controls">
                  <input type="mail" name="mail">
            </div>
            </div>

           <div class="control-group">
              <label for="normal" class="control-label">employee mobile</label>
              <div class="controls">
                  <input type="number" name="mobile">

            </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Adhar num</label>
              <div class="controls">
                  <input type="number" name="adhar_num">

            </div>
            </div>
           
            <div class="control-group">
              <label for="normal" class="control-label">salary</label>
              <div class="controls">
                  <input type="number" name="salary">

            </div>
            </div>
           
            <div class="control-group">
              <label for="normal" class="control-label">Joining date</label>
              <div class="controls">
                  <input type="date" name="joining_date">

            </div>


            <div class="control-group">
              <div class="controls">
                <input type="submit" class="btn btn-success" name="save" value="save">
                 </div>
            </div>

          </form>
        </div>
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

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php

if(isset($_POST['save']))
{
  $post=$_POST['post'];
  $name=$_POST['name'];
  $address=$_POST['address'];
  $mail=$_POST['mail'];
  $mobile=$_POST['mobile'];
  $adhar_num=$_POST['adhar_num'];
  $salary=$_POST['salary'];
  $joining_date=$_POST['joining_date'];


   if(mysql_query("INSERT INTO  employee VALUES('','".$post."','".$name."','".$address."','".$adhar_num."','".$mail."','".$mobile."','".$salary."','".$joining_date."','".$admin_id."')"))
  {
echo'
  <script>
  alert("employee added");
  window.location.href="add_employee.php";
  </script>
  ';
  }
}
?>