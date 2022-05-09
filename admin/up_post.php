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
$res1=mysql_query("SELECT * FROM hotel WHERE ID='".$admin_id."'");
$row1=mysql_fetch_row($res1);
$id=$_GET['id'];
$res=mysql_query("SELECT * FROM post WHERE ID='".$id."'");
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
     <li class=""><span class="text" style="color: #fff;margin-left:300px;font-size:20px;"><?php echo$row1[1]; ?></span></li>
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
          <h5 style="color: #fff">Add post</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="up_post.php?id=<?php echo$id; ?>" method="POST" class="form-horizontal">

          <div class="control-group">
              <label for="normal" class="control-label">Employee post</label>
              <div class="controls">
                <input type="text" id="mask-phone" class="span11 mask text" name="post" value="<?php echo$row[1]; ?>">
                 </div>
            </div>


            <div class="control-group">
              <div class="controls">
                <input type="submit" class="btn btn-success"  name="save" value="save">
                 <input type="hidden" id="mask-phone" class="span11 mask text" name="id" value="<?php echo$row[0]; ?>">
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
   
    $id=$_POST['id'];

    $post=$_POST['post'];
    


    if($res=mysql_query("UPDATE  post SET emp_post='".$post."' WHERE ID='".$id."'"))
      {
      echo'
        <script>
        alert("post Updated Successfully.....!");
        window.location.href="view_post.php";
        </script>
      ';
    }
  }
?>