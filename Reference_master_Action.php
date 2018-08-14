  <?php
       
		 
		  $var_reference_date=$_POST['txt_reference_date'];
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_hospital_id=$_POST['slb_hospital_id'];
          $var_department_id=$_POST['slb_department_id'];
          $var_doctor_id=$_POST['slb_doctor_id'];
          $var_reason=ucwords($_POST['txt_reason']);
          $var_remarks=ucwords($_POST['txt_remarks']);
          $var_consultant_date=$_POST['txt_consultant_date'];
          $var_consultant_time=ucwords($_POST['txt_consultant_time']);
          $var_token=$_POST['txt_token'];
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into reference_master (reference_date,appoinment_id,hospital_id,department_id,doctor_id,reason,remarks,consultant_date,consultant_time,token) values('$var_reference_date','$var_appoinment_id','$var_hospital_id','$var_department_id','$var_doctor_id','$var_reason','$var_remarks','$var_consultant_date','$var_consultant_time','$var_token')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Reference_master_Select.php";</script>';
      ?>
