  <?php
  		error_reporting(0);
          include 'dbconnect.php';
   	      $db=new dbconnect();
          $var_patient_name=ucwords($_POST['txt_patient_name']);
          $var_card_number=ucwords($_POST['txt_card_number']);
          $var_card_type=ucwords($_POST['txt_card_type']);
          $var_date_of_birth=$_POST['txt_date_of_birth'];
          $var_gender=$_POST['txt_gender'];
          $var_mobile_number=ucwords($_POST['txt_mobile_number']);
          $var_email=strtolower($_POST['txt_email']);
          $var_house_name=ucwords($_POST['txt_house_name']);
          $var_post_office=ucwords($_POST['txt_post_office']);
		   $var_dis=ucwords($_POST['slb_district_id']);
          $var_city_id=$_POST['slb_city_id'];
          $var_blood_group_id=$_POST['slb_blood_group_id'];
          $var_image_path="-";
         // $var_status=$_POST['txt_status'];

      $varsql="insert into patient_master (patient_name,card_number,card_type,date_of_birth,gender,mobile_number,email,house_name,post_office,district_id,city_id,blood_group_id,image_path,status) values('$var_patient_name','$var_card_number','$var_card_type','$var_date_of_birth','$var_gender','$var_mobile_number','$var_email','$var_house_name','$var_post_office','$var_dis','$var_city_id','$var_blood_group_id','$var_image_path',0)";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  
	  $doc_max="SELECT max(id) AS max FROM patient_master";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
     $docmax_id=$doc_row['max'];
    $info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$docname="patient".$docmax_id;
	$var_file_path=$docname.".".$ext;
    $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);
	mysql_query("update patient_master set image_path='$target' where id='$docmax_id'");
	
   echo '<script>window.location = "index.php?pp=1";</script>';
      ?>
