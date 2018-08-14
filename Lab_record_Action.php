  <?php
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_medical_lab_id=$_POST['slb_medical_lab_id'];
          $var_lab_test_id=$_POST['slb_lab_test_id'];
          $var_result=ucwords($_POST['txt_result']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into lab_record (appoinment_id,medical_lab_id,lab_test_id,result) values('$var_appoinment_id','$var_medical_lab_id','$var_lab_test_id','$var_result')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Lab_record_Select.php";</script>';
      ?>
