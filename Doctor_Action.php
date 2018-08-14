  <?php
  error_reporting(0);
  
          $var_doctor_name=$_POST['txt_doctor_name'];
          $var_house_name=$_POST['txt_house_name'];
          $var_city_id=$_POST['slb_city_id'];
          $var_district_id=$_POST['slb_district_id'];
          
          $var_mobile_number=$_POST['txt_mobile_number'];
          $var_email=strtolower($_POST['txt_email']);
          $var_specialization_id=$_POST['slb_specialization_id'];
          $var_status=0;
          $var_image_path="-";
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into doctor (doctor_name,house_name,city_id,district_id,mobile_number,email,specialization_id,status,image_path) values('$var_doctor_name','$var_house_name','$var_city_id','$var_district_id','$var_mobile_number','$var_email','$var_specialization_id','$var_status','$var_image_path')";
      $varresult=mysql_query($varsql)or die(mysql_error());
          $sql="select max(id) from Doctor";
      $varresultid=mysql_query($sql)or die(mysql_error());
          $row=mysql_fetch_array($varresultid);
          $var_id=$row[0];
          $file_name="doctor".$var_id;
          $info=pathinfo($_FILES['file']['name']);
          $ext=$info['extension'];
          $docname1="doctor".$var_id;
          $newname=$docname1.".".$ext;
          $target1='upload/'.$newname;
          move_uploaded_file($_FILES['file']['tmp_name'], $target1);
          mysql_query("update Doctor set image_path='$newname' where id='$var_id'");
       echo '<script>window.location = "index.php?pp=1";</script>';
      ?>
