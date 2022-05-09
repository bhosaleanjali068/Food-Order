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
$res_del=mysql_query("DELETE FROM temp_sale_item");
?><!DOCTYPE html>
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
<script type="text/javascript">
  function save_item()
  {
    var food=document.getElementById('food').value;
    var Price=document.getElementById('Price').value;
    var Qty=document.getElementById('Qty').value;
    var Total=document.getElementById('Total').value;
    $.ajax(
        {
          type:"POST",
          url:"ajax_save_otem.php",
          data:'food='+food+"&Price="+Price+"&Qty="+Qty+"&Total="+Total,
          success:function(data)
          {
             $("#item_data").html(data);

    var food=document.getElementById('food').value="---Select Food---";
    var Price=document.getElementById('Price').value="";
    var Qty=document.getElementById('Qty').value="";
    var Total=document.getElementById('Total').value="";
    caltotal();
    
          }
        });
  }
  function show_price(val)
  {
    $.ajax(
        {
          type:"POST",
          url:"ajax_show_data.php",
          data:'food='+val,
          success:function(data)
          {
            var Price=document.getElementById("Price").value=data;
            cal();
          }
        }); 
  }
  function cal()
  {
    var Price=document.getElementById("Price").value
     var Qty=document.getElementById("Qty").value;
            var Total=Price*Qty;
            document.getElementById("Total").value=Total; 
  }
  function caltotal()
  { 
    var caltotal="caltotal";
    $.ajax(
        {
          type:"POST",
          url:"ajax_show_data.php",
          data:'caltotal='+caltotal,
          success:function(data)
          {
            document.getElementById("Gtotal").value=data;
            rem();
          }
        }); 
  }
  function rem()
  {
      var Gtotal=document.getElementById("Gtotal").value;
      var Paid=document.getElementById("Paid").value;
      var rem=Gtotal-Paid;
      document.getElementById("Remaining").value=rem;

  }
</script>
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
    <div id="breadcrumb"> </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <form action="save_order.php" method="POST" class="form-horizontal">


  <div class="container-fluid" >
    <div class="span1"></div>
    <div class="span8">
       <div class="row-fluid">
     <div class="widget-box">
        <div class="widget-title" style="background-color: green; color: #fff">
          <h5 style="color: #fff">Customer Details</h5>
        </div>
        <div class="widget-content nopadding">
       <div class="row-fluid">

        <div class="span1">
          <label>Date</label>
        </div>
        <div class="span4">
          <input type="date" name="odate" id="odate">
          <?php
            $sale_row=mysql_fetch_row(mysql_query("SELECT MAX(ID) FROM sale"));
            if($sale_row)
            {
              $sale_id=$sale_row[0]+1;
            }
            else
            {
              $sale_id=1;
            }
          ?>
          <input type="hidden" name="sale_id" id="sale_id" value="<?php echo$sale_id; ?>">
        </div>
        <div class="span1"></div>
        <div class="span1">
          <label>Name</label>
        </div>
        <div class="span4">
          <input type="text" name="Name" id="Name">
        </div>
    </div>
    <br>
     <div class="row-fluid">

        <div class="span1">
          <label>Mobile</label>
        </div>
        <div class="span4">
          <input type="number" name="Mobile" id="Mobile">
        </div>
        <div class="span1"></div>
        <div class="span1">
          <label>Address</label>
        </div>
        <div class="span4">
         <textarea name="Address" id="Address"></textarea>
        </div>
    </div>

        </div>
      </div>
    </div>
    </div>
  </div>

    <div class="span5">
 <div class="container-fluid">
       <div class="row-fluid">
     <div class="widget-box">
        <div class="widget-title" style="background-color: green; color: #fff">
          <h5 style="color: #fff">Add Product</h5>
        </div>
        <div class="widget-content nopadding">
       <div class="row-fluid">

        <div class="span2">
          <label>food</label>
        </div>
        <div class="span3">
          <select style="width:260px" name="food" id="food" onchange="show_price(this.value)">
            <option>---Select Food---</option>
            <?php
              $res=mysql_query("SELECT * FROM food WHERE HOTEL_ID='".$admin_id."'");
                $a=1;
                while($row=mysql_fetch_row($res))
                {
                  echo'<option value="'.$row[0].'">'.$row[2].'</option>';
                }
            ?>
          </select>
        </div>
        
    </div>
    <br>
     <div class="row-fluid">

        <div class="span1" style="width:50px">
          <label>Price</label>
        </div>
        <div class="span1">
          <input type="number" name="Price" id="Price" style="width:85px" readonly="">
        </div>
        <div class="span1" style="width:90px"></div>
        <div class="span1" style="width:30px">
          <label>Qty</label>
        </div>
        <div class="span1">
          <input type="number" name="Qty" id="Qty" style="width:85px" onkeyup="cal()">
        </div>
    </div>
    <br>
     <div class="row-fluid">

        <div class="span2">
          <label>Total</label>
        </div>
        <div class="span3">
          <input type="number" name="Total" id="Total" style="width:90px" readonly="">
        </div>
        <div class="span1" style="width:90px"></div>
        <div class="span2">
          <input type="button"  class="btn btn-warning" onclick="save_item(),caltotal()" name="save" value="ADD">
        </div>
    </div>
    <br>

        </div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="span1">
        <label>Grand Total</label>
      </div>
      <div class="span2">
        <input type="text" name="Gtotal" id="Gtotal" readonly="">
      </div>
    </div>

    <br>
    <div class="row">
      <div class="span1">
        <label>Paid</label>
      </div>
      <div class="span2">
        <input type="text" name="Paid" id="Paid" onkeyup="rem()">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="span1">
        <label>Remaining</label>
      </div>
      <div class="span2">
        <input type="text" name="Remaining" id="Remaining" readonly="">
      </div>
      <div class="span1"></div>
      <div class="span1">
      <input type="submit" style="background-color: green; color: #fff" name="final_save" id="final_save" value="Final Save" class="btn btn-success">
      </div>
    </div>
    <br>
    <div class="row">
      
    </div>
  </div>


 <div class="span6">
 <div class="container-fluid">
       <div class="row-fluid">
     <div class="widget-box">
        <div class="widget-title" style="background-color: green; color: #fff">
          <h5 style="color: #fff">Product List</h5>
        </div>
        <div class="widget-content nopadding">
       <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#fff;color:#000;font-size: 15px">Sr</th>
                  
                  <th style="background-color:#fff;color:#000;font-size: 15px">Food Name</th>
                   <th style="background-color:#fff;color:#000;font-size: 15px">Price</th>
                   <th style="background-color:#fff;color:#000;font-size: 15px">Qty</th>
                   <th style="background-color:#fff;color:#000;font-size: 15px">Total</th>
                  
                </tr>
              </thead>
              <tbody id="item_data">
              <?php
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
              ?>


                
               
               
              </tbody>
            </table>
        </div>
      </div>
    </div>
    </div>
  </div>

    </form>
</div>
<!--end-main-container-part-->

<!--Footer-part-->

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