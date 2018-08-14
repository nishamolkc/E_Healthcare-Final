  <?php
          $var_id=$_POST['txt_id'];
          $var_time=$_POST['txt_time'];
         
      include 'dbconnect.php';
      $db=new dbconnect();
   
	  $varsql="insert into doctor_time (timing_name) values('$var_time')";
	 
      $varresult=mysql_query($varsql)or die(mysql_error());
	
     echo '<script>window.location = "doctor_time_select.php";</script>';
      ?>
