	<?php
	mysql_connect("localhost","root","")or die("Server Problem!");
    mysql_select_db("foodi_db")or die("Database Problem!");

	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Welcome In Foody</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

  <header id="header" id="home">
    <div class="container">
    	<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
	        <a href="index.html"><img src="b.png" alt="" title="" style="height:30px;width:100px"></a>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
	          <li class="menu-active"><a href="#home">Home</a></li>
	          <li><a href="#hotel">Top Hotels</a></li>
	          <li><a href="#dish">Top Dish</a></li>
	          <li><a href="#about">About Us</a></li>
	          <li class="menu-has-children" ><a >Hotel</a>
	            <ul>
	            <li>
	            <div style="margin-left:-550px;color: #000;background-color: #fff;overflow-y:auto;">
          			<table border="0">
          			<tr>
	            <?php
	            	$res_c=mysql_query("SELECT * FROM city ORDER BY City_Name ASC");
	            	$a=0;
	            	while($row_n=mysql_fetch_row($res_c))
	            	{
	            		$a++;
            		echo'
              				<td><a href="city_hotel.php?city_id='.$row_n[0].'"><p style="margin:10px">'.$row_n[1].'</p></a></td>
	              ';
	              if($a%6==0)
	              {
	              	echo'
	              		</tr>
	              		<tr>
	              	';
	              }
	            	}
	            ?>
	            </tr>
	            </table>
	            </div>
	            </li>
	            </ul>
	          </li>
	          <li><a href="#contact">Login</a></li>

	        </ul>
	      </nav><!-- #nav-menu-container -->		    		
    	</div>
    </div>
  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-8 col-md-12">
							<h4 class="text-white text-uppercase">Wide Options of Choice</h4>
							<h1>
								Delicious Receipes					
							</h1>
							<p class="text-white">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
							</p>
							<a href="#" class="primary-btn header-btn text-uppercase">Check Our Menu</a>
						</div>												
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start top-dish Area -->
			<?php
			$reso=mysql_query("SELECT `HOTEL_ID`,COUNT(`HOTEL_ID`) AS `value_occurrence`FROM `sale` GROUP BY `HOTEL_ID`ORDER BY `value_occurrence` DESC LIMIT 3;");

			$resd=mysql_query("SELECT `FOOD_ID`,COUNT(`FOOD_ID`) AS `value_occurrence`FROM `sale_item` GROUP BY `FOOD_ID`ORDER BY `value_occurrence` DESC LIMIT 2;");
			?>
			<section class="top-dish-area section-gap" id="hotel">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<data></data>
							<div class="title text-center">
								<h1 class="mb-10">Our Top Hotels</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<?php
							while($rowo=mysql_fetch_row($reso))
							{
								$row_hotel=mysql_fetch_row(mysql_query("SELECT * FROM hotel WHERE ID='".$rowo[0]."'"));
								echo'
								<div class="single-dish col-lg-4" style="border:1px solid gray;">
									<br>
								<div class="thumb">
									<img class="img-fluid"  src="main/'.$row_hotel[5].'" alt="" style="height:250px;">
								</div>
								<h4 class="text-uppercase pt-20 pb-20">Hotel '.$row_hotel[1].'</h4>
								<p style="margin-top:-20px">
									'.$row_hotel[2].'<br>
									Owner: &nbsp;'.$row_hotel[3].'
								</p>
								<center><a class="btn btn-sm" style="border:1px solid orange;border-radius:50px;background-color:orange;color:#fff" href="order.php?id='.$row_hotel[0].'">Order Now</a>
								</center>
								<br>
							</div>';
							}

						?>
						
																		
					</div>
				</div>	
			</section>
			<!-- End top-dish Area -->
			
			<!-- Start video Area -->
			
			<!-- End video Area -->
			

			<!-- Start features Area -->

			<!-- Start related Area -->
			<section class="related-area section-gap" id="dish">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Most Popular Food Menus</h1>
								
							</div>
						</div>
					</div>						
					<div class="row justify-content-center">
						<div class="active-realated-carusel">
						<?php
							while($rowd=mysql_fetch_row($resd))
							{
								$row_f=mysql_fetch_row(mysql_query("SELECT * FROM food WHERE ID='".$rowd[0]."'"));
								$row_hotel=mysql_fetch_row(mysql_query("SELECT * FROM hotel WHERE ID='".$row_f[5]."'"));

								echo'
									<div class="item row align-items-center">
								<div class="col-lg-6 rel-left">
								   <h2>
								   		'.$row_f[2].'
								   </h2>
								   <h4>Hotel '.$row_hotel[1].'</h4>
								   <h4>Price '.$row_f[3].'</h4>
								  
								</div>
								<div class="col-lg-6">
									<img class="img-fluid" src="admin/'.$row_f[4].'" alt="">
								</div>
							</div>
								';
							}
						?>

							
												
						</div>
					</div>
				</div>	
			</section>
		

		
			<br>

			<section class="contact-area" id="contact">
				<div class="container-fluid">
					<div class="row align-items-center d-flex justify-content-start">
						
						<div class="col-lg-12 col-md-12 pt-100 pb-100" style="background-image: url('l1.jpg');background-repeat: no-repeat;background-size:100%">
							<form action="index.php" method="POST">
								<div class="row">
								<div class="col-sm-6"></div>
								<div class="col-sm-4">
							<div class="row" style="background-color:black;opacity:0.8">
							<h3 style="text-align: center;color:orange;margin-left: 140px">Login</h3>
								<input name="username" placeholder="user name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'user name'" class="common-input mt-10" required="" type="text" style="color:#fff">

								<input name="password" placeholder="password" style="color:#fff" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" class="common-input mt-10" required="" type="password">

								<button class="primary-btn  btn-xs" style="margin-left:110px;margin-top:20px" name="login">Login<span class="lnr lnr-arrow-right"></span></button>
								<div class="mt-10 alert-msg">
								</div>
							</div>
							</div>
							</form>
						</div>
						
					</div>
				</div>
			</section>
			<br>
						
			<!-- End Contact Area -->				

			<!-- start footer Area -->		
			<footer class="footer-area section-gap" id="about">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">About Us</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
							</div>
						</div>
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Contact Us</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="number">
									012-6532-568-9746 <br>
									012-6532-569-9748
								</p>
							</div>
						</div>						
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Newsletter</h4>
								<p>You can trust us. we only send  offers, not a single spam.</p>
								<div class="d-flex flex-row" id="mc_embed_signup">


									  <form class="navbar-form" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									    <div class="input-group add-on">
									      	<input class="form-control" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" type="email">
											<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>
									      <div class="input-group-btn">
									        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
									      </div>
									    </div>
									      <div class="info mt-20"></div>									    
									  </form>

								</div>
							</div>
						</div>						
					</div>
					<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>
<?php
if(isset($_POST['login']))
{
	
    $uname=$_POST['username'];
    $pass=$_POST['password'];
  
    $res=mysql_query("select * from admin where USERNAME='".$uname."' && PASSWORD='".$pass."'");
    $res1=mysql_query("select * from hotel where USERNAME='".$uname."' && PASSWORD='".$pass."'");
    $row=mysql_fetch_row($res);
    $row1=mysql_fetch_row($res1);

   if($num=mysql_num_rows($res)>0)
     {
     session_start();
     $_SESSION['main']=$row[0];

    echo'
    <script>
   window.location.href="main/index.php";
    </script>
    ';
    }
    else if($num1=mysql_num_rows($res1)>0)
    {
    	session_start();
     $_SESSION['admin']=$row1[0];

    echo'
    <script>
   window.location.href="admin/index.php";
    </script>
    ';
    }
    else
    {
        echo'
    <script>
    alert("Wrong Username & Password ");
   window.location.href="index.php";
    </script>
    ';
    }
}
?>


