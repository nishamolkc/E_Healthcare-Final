
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>E-Health Care | Home </title>
<!-- for-meta-tags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Health Plus Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-meta-tags-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" Department="" />
<link href="css/services.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/ziehharmonika.css" rel="stylesheet" type="text/css">
<link href="css/JiSlider.css" rel="stylesheet"> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
</head>
	
<body>
<div class="main" id="home">
<!-- banner -->
		<div class="header_agileinfo">
						<div class="w3_agileits_header_text">
								<ul class="top_agile_w3l_info_icons">
									<li><i class="fa fa-home" aria-hidden="true"></i>Kottiyoor,Kannur.</li>
									<li class="second"><i class="fa fa-phone" aria-hidden="true"></i>+91 9946881779</li>
									
									<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:maria@example.com">nishamolkc555@gmail.com</a></li>
								</ul>

						</div>
						<div class="agileinfo_social_icons">
							<ul class="agileits_social_list">
								<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li><a href="#" class="w3_agile_rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
			</div>				

		<div class="header-bottom">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="index.php"><span>E-</span>Health Care <i class="fa fa-plus" aria-hidden="true"></i> <p>Quality Care 4U</p></a></h1>
					</div>
				</div>
			
			<?php
			error_reporting(0);
            session_start();
            $ulevel=$_SESSION['userlevel'];
			$uname=$_SESSION['username'];
            if($ulevel==1)//***********ADMIN
            {
              ?>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Hospital<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
						   <li><a href="District_Select.php">District</a></li>
						   <li><a href="City_Select.php">City</a></li>
									<li><a href="Hospital_Select_rept.php">Hospital</a></li>
									<li><a href="Department_Select.php">Department</a></li>
									<li><a href="Hospital_department_Select.php">Hospital Department</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Doctor<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Doctor_Select_rept.php">Doctor</a></li>
									<li><a href="Designation_Select.php">Designation</a></li>
									<li><a href="Specialization_Select.php">Specialization</a></li>
									<li><a href="Doctor_time_Select.php">Duty time entry</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Patient<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Patient_master_Select_rept.php">Patient Details</a></li>
									<li><a href="Appoinment_Select.php">Appoinment Request</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Diagonistic Center<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Medical_lab_Select_report.php">Medical Lab</a></li>
									<li><a href="Medical_store_Select_report.php">Medical Store</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Report<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Appoinment_report2.php">Appoinment</a></li>
									<li><a href="Patient_master_report2.php">Patients</a></li>
									<li><a href="Hospital_department_Add_report2.php">Hospital Departments</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Doctor_Select.php">Doctor</a></li>
									<li><a href="Hospital_Select.php">Hospital</a></li>
									<li><a href="Medical_lab_Select.php">Medical Lab</a></li>
									<li><a href="Medical_store_Select.php">Medical Store</a></li>
									<li><a href="Patient_master_Select.php">Patients</a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
						</li>
					</ul>
				</nav>
				</div>
				
				<?php
				$name=explode("@",$uname);
					echo "Welcome ".$name[0];
}

			 elseif($ulevel==2)//****************DOCTOR LOGIN
			  {
			  ?>
			  
			  <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Appointment <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Appoinment_Select.php"> View Appointment </a></li>
									<li><a href="Prescription_Select.php"> Prescription Details </a></li>
								</ul>
						</li>
				
						
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									
									<li><a href="doctor_edit.php">Edit Profile</a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="logout.php" class="glyphicon glyphicon-off" title="Logout">  </a></li>
					</ul>
				</nav>
				</div>
				
				  <?php
				  $name=explode("@",$uname);
					echo "Welcome ".$name[0];
					}

			 elseif($ulevel==3)//*****************HOSPITAL LOGIN
			  {
			  ?>
			    
			 	<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Hospital <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Hospital_Select.php"> Hospital Details </a></li>
									<li><a href="Department_Select.php"> Department </a></li>
									<li><a href="Hospital_department_Select.php"> Our Department </a></li>
									<li><a href="Hospital_department_Add_report2.php"> All hospital Department </a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Doctor <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href='Doctor_hospital_Select.php'><span>Doctor Hospital</span></a></li>
									<li><a href="Doctor_Select.php"> Doctor Details </a></li>
									<li><a href="Designation_Select.php"> Designation </a></li>
									<li><a href="Specialization_Select.php"> Speacialization </a></li>
									
									
									<!--<li><a href="doctor_hospital_add.php"> Add Doctor </a></li>-->
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Patient <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Patient_master_Select.php"> Patient Details </a></li>
									<li><a href="Appoinment_Select_bydoctor.php"> Appointment Request </a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Diagonsis Center <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Medical_lab_Select.php"> Medical Lab </a></li>
									<li><a href="Medical_store_Select.php"> Medical Store </a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Documents <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Patient_master_select_view_report.php"> Consulted Patients </a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="logout.php" class="glyphicon glyphicon-off" title="Logout">  </a></li>
					</ul>
				</nav>
				</div>
			  
			  <?php
			  $name=explode("@",$uname);
					echo "Welcome ".$name[0];
				}

			  elseif($ulevel==4)//*****************PATIENT LOGIN
			  {
			  ?>
			  
			  <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Medical Histroy <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Prescription_Select.php"> Prescription </a></li>
									 
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Doctor <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Doctor_Select.php"> All Doctor Details </a></li>
									<li><a href="Hospital_report.php"> Search Doctor </a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Appointment <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Appoinment_Select.php"> Appointment </a></li>
								</ul>
						</li>
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="logout.php" class="glyphicon glyphicon-off" title="Logout">  </a></li>
					</ul>
				</nav>
				</div>
				
				<?php
				$name=explode("@",$uname);
					echo "Welcome ".$name[0];
					}

			  elseif($ulevel==5)//*****************MEDICAL LAB LOGIN
			  {
			  ?>
			  
			  <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Prescription <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Prescription_Select.php"> View Prescription </a></li>
								</ul>
						</li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="logout.php" class="glyphicon glyphicon-off" title="Logout">  </a></li>
					</ul>
				</nav>
				</div>
				
				<?php
				$name=explode("@",$uname);
					echo "Welcome ".$name[0];
					}
				elseif($ulevel==6)//*****************MEDICAL STORE LOGIN
				{
				 ?>
				 
				 <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="home.php" class="glyphicon glyphicon-home" title="Home">  </a></li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown"> Prescription <b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="Prescription_Select.php"> View Prescription </a></li>
								</ul>
						</li>
						
						<li class="m_nav_item menu__item" id="moble_nav_item_3 dropdown"> <a href="#" class="menu__link dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
						   <ul class="dropdown-menu agile_short_dropdown">
									<li><a href="change_pwd.php">Change Password</a></li>
									
								</ul>
						</li>
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="logout.php" class="glyphicon glyphicon-off" title="Logout">  </a></li>
					</ul>
				</nav>
				</div>
				
				<?php
				$name=explode("@",$uname);
					echo "Welcome ".$name[0];
				}
				
				else
				{
				?>
				
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						
						<li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="login.php" > Login </a></li>
						
					</ul>
				</nav>
				</div>
				
				<?php
					}
					?>
				 
				<!-- /.navbar-collapse -->
			</nav>
	 </div>
</div>



<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
 <!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/JiSlider.js"></script>
		<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script src="js/ziehharmonika.js"></script>
<script>
$(document).ready(function() {
		$('.ziehharmonika').ziehharmonika({
			collapsible: true,
			prefix: ''
		});
	});
</script>
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<script type="text/javascript">
$(function(){
  $("#bars li .bar").each(function(key, bar){
    var percentage = $(this).data('percentage');

    $(this).animate({
      'height':percentage+'%'
    }, 1000);
  })
})
</script>

<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Health Plus
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<img src="images/g9.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->

<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->


<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
			<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>