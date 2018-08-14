
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Doctor | Registration</title>
<!-- for-meta-tags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Health Plus Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-meta-tags-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
			<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_doctor_name");
if(dvar1.value=="")
{
 alert("Enter doctor_name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_house_name");
if(dvar2.value=="")
{
 alert("Enter house_name...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("slb_city_id");
if(dvar3.value=="")
{
 alert("Select City Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("slb_district_id");
if(dvar4.value=="")
{
 alert("Select District Name ...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_card");
if(dvar5.value=="")
{
 alert("Enter card...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_card_no");
if(dvar6.value=="")
{
 alert("Enter card_no...");
dvar6.focus();
return false;
}
 var  dvar7 = document.getElementById("txt_mobile_number");
if(dvar7.value=="")
{
 alert("Enter mobile_number...");
dvar7.focus();
return false;
}
 var  dvar8 = document.getElementById("txt_email");
if(dvar8.value=="")
{
 alert("Enter email...");
dvar8.focus();
return false;
}
  else 
{
  var expr=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!expr.test(dvar8.value))
{
 alert("Enter Valid Email ID ...");
dvar8.focus();
return false;
}
}
 var  dvar9 = document.getElementById("slb_specialization_id");
if(dvar9.value=="")
{
 alert("Select Specialization Name ...");
dvar9.focus();
return false;
}
 var  dvar11 = document.getElementById("txt_image_path");
if(dvar11.value=="")
{
 alert("Enter image_path...");
dvar11.focus();
return false;
}
}
</script>	
<body>
<div class="main" id="home">
<form name="Doctor_Add.php" action="Doctor_Action.php" method="post" onSubmit="return validate()">

<!-- icons -->
	<div class="banner-bottom" id="about">
		<div class="container">
					<h2 class="w3_heade_tittle_agile">Doctor Registration</h2>
			        <!--<p class="sub_t_agileits">Add Short Description</p>-->

					<div class="book-appointment">
						<!--<h4>Make an appointment</h4>-->
								<form action="#" method="post">
								<div class="left-agileits-w3layouts same">
								<div class="gaps">
									<p>Doctor Name</p>
										<input type="text" name="txt_doctor_name" id="txt_doctor_name" value="">
								</div>	
									<div class="gaps">	
									<p>City</p>
										<select class="option"  name="slb_city_id"  id="slb_city_id">
											   <option value="">--Select--</option>
										 <?php
										  include 'dbconnect.php';
										  $db=new dbconnect();
										  $varslbsqlcity_id="select * from city";
										  $varresultcity_id=mysql_query($varslbsqlcity_id)or die(mysql_error());
											while($rowcity_id =mysql_fetch_array($varresultcity_id))
											  { ?>
											   <option value="<?php echo $rowcity_id[0]; ?>"><?php echo $rowcity_id[1]; ?></option>
											  <?php } ?>
										</select>
									</div>
									<div class="gaps">
									<p>Card</p>
											<input type="text" name="txt_card"  id="txt_card" value="">
									</div>	
									<div class="gaps">
									<p>Mobile Number</p>
											<input type="text" name="txt_mobile_number" id="txt_mobile_number" value="">
									</div>
									<div class="gaps">
									<p>Specialization</p>
											<select class="option" name="slb_specialization_id" id="slb_specialization_id">
										   <option value="">--Select--</option>
									 <?php
									  $varslbsqlspecialization_id="select * from specialization";
									  $varresultspecialization_id=mysql_query($varslbsqlspecialization_id)or die(mysql_error());
										while($rowspecialization_id =mysql_fetch_array($varresultspecialization_id))
										  { ?>
										   <option value="<?php echo $rowspecialization_id[0]; ?>"><?php echo $rowspecialization_id[1]; ?></option>
										  <?php } ?>
										  </select>
									</div>
								</div>
								<div class="right-agileinfo same">
								<div class="gaps">
									<p>House Name</p>		
											<!--<input  id="datepicker1" name="Text" type="text" value="" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">-->
											<input type="text" name="txt_house_name" id="txt_house_name" value="">
								</div>
								<div class="gaps">
									<p>District</p>	
										<select class="option" name="slb_district_id" id="slb_district_id">
										   <option value="">--Select--</option>
									 <?php
									  $varslbsqldistrict_id="select * from district";
									  $varresultdistrict_id=mysql_query($varslbsqldistrict_id)or die(mysql_error());
										while($rowdistrict_id =mysql_fetch_array($varresultdistrict_id))
										  { ?>
										   <option value="<?php echo $rowdistrict_id[0]; ?>"><?php echo $rowdistrict_id[1]; ?></option>
										  <?php } ?>
										  </select>
								</div>
								<div class="gaps">
									<p>Card No.</p>	
										<input type="text" name="txt_card_no" id="txt_card_no" value="">
								</div>
								<div class="gaps">
									<p>Email ID</p>		
										<input type="text" name="txt_email" id="txt_email" value="">	
								</div>
								<div class="gaps">
									<p>Profile Picture</p>		
										<input type="file" class="form-control" name="file" id="file" multiple="">	
								</div>
								</div>
								<div class="clearfix"></div>
											  <input type="submit" name="cmd" id="cmd" value="Register">
								</form>
							</div>
					   </div>

		</div>
	</div>
<!-- icons -->
</form>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
 <!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

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