  <?php
 			 error_reporting(0);
          	$var_city_name=$_POST['txt_city_name'];
		   $var_district=$_POST['slb_district_id'];
      include 'dbconnect.php';
      $db=new dbconnect();
       $varsql="insert into city (city_name,district_id) values('$var_city_name','$var_district')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "City_Select.php";</script>';
      ?>
