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
mysql_connect("localhost","root","")or die("Server Error");
mysql_select_db("foodi_db")or die("Database Error");
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
     <div class="container-fluid">
    <div class="span6">
       <div class="row-fluid">
     <div class="widget-box">
        <div class="widget-title" style="background-color: green; color: #fff"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5 style="color: #fff">Hotel Registration</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="add_hotel.php"  method="POST" class="form-horizontal" enctype="multipart/form-data">

           
            <div class="control-group">
              <label for="normal" class="control-label">Hotel Name</label>
              <div class="controls">
                  <input type="text" name="name">
              </div>
            </div>
            
             <div class="control-group">
              <label for="normal" class="control-label">City</label>
              <div class="controls">
                 <select name="city">
                   <option>----Select City----</option>
                   <?php
                    $res=mysql_query("SELECT * FROM city ORDER BY City_Name ASC");
                    while($row=mysql_fetch_row($res))
                    {
                      echo'
                        <option value="'.$row[0].'">'.$row[1].'</option>
                      ';
                    }
                   ?>
                 </select>
            </div>
          
            <div class="control-group">
              <label for="normal" class="control-label">Hotel address</label>
              <div class="controls">
                 <textarea name="hotel_address"></textarea>
            </div>
           
            <div class="control-group">
              <label for="normal" class="control-label">Owner name</label>
              <div class="controls">
                  <input type="text" name="owner_name">

            </div>
            </div>
           
            <div class="control-group">
              <label for="normal" class="control-label">Owner Mobile</label>
              <div class="controls">
                  <input type="number" name="owner_mobile">
            </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Hotel Image</label>
              <div class="controls">
                  <input type="file" name="image">
            </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">USERNAME</label>
              <div class="controls">
                  <input type="text" name="USERNAME">
            </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">PASSWORD</label>
              <div class="controls">
                  <input type="pass" name="PASSWORD">
            </div>
            </div>
          
          </div>
           
            
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
  $max_id=1;
 $max1=mysql_query("select MAX(ID) from hotel");
$max=mysql_fetch_row($max1);

      if($max[0])
      {
        $max=$max[0];
        $max_id=$max+1;
      }
      else 
      {
       $max_id=1;
       } 
      $file_exists=array("jpg","jpeg","png","gif","bmp","pdf");//file extenssions supported for upload 

        
        $upload_exists = end (explode('.', $_FILES["image"]["name"]));//find extension of file 
        if(($upload_exists==null )||($upload_exists==""))//file is none or of 0kb
        {
            
            echo"<script>alert('uncompatible file'); </script>";
        }
        else
        {
            if((($_FILES['image']['size']<2000000) || in_array($upload_exists,$file_exists)))//file size & file extension support
            {
             $newname="$max_id"."_hotel."."png";//name of file name to be saved
                $targetfile='pic/'.$newname;//location of folder with target file name 
                if($_FILES['image']['error']>0)//check if any error in file 
                {
                    echo"<script>alert('image 2 large  or pdf large size should b less than 2 mb');</script>";
                }
                else
                {
                    //upload file to location set above
                    move_uploaded_file($_FILES['image']['tmp_name'],$targetfile);//end img code

$name=$_POST['name'];
$hotel_address=$_POST['hotel_address'];
$owner_name=$_POST['owner_name'];
$owner_mobile=$_POST['owner_mobile'];
$USERNAME=$_POST['USERNAME'];
$PASSWORD=$_POST['PASSWORD'];
$city=$_POST['city'];

if(mysql_query("INSERT INTO hotel VALUES('','".$name."','".$hotel_address."','".$owner_name."','".$owner_mobile."','".$targetfile."','".$USERNAME."','".$PASSWORD."','".$city."')"));
{
  echo'
  <script>
  alert("hotel added");
  window.location.href="add_hotel.php";
  </script>
  ';
}
}
}
}
}
?>
