  <?php
  		error_reporting(0);
               include 'dbconnect.php';
     		 $db=new dbconnect();
		  $var_hospital_name=ucwords($_POST['txt_hospital_name']);
          $var_location=ucwords($_POST['txt_location']);
		  
		  $var_dis=$_POST['slb_district_id'];
          $var_city_id=$_POST['slb_city_id'];
          $var_phone_number=ucwords($_POST['txt_phone_number']);
          $var_email=strtolower($_POST['txt_email']);
          $var_contact_name=ucwords($_POST['txt_contact_name']);
          $var_contact_mobileno=ucwords($_POST['txt_contact_mobileno']);
          $var_website=$_POST['txt_website'];
		 // $var_image_path=ucwords($_POST['txt_image_path']);
		
		  $var_status=0;
	 $varsql="insert into hospital (hospital_name,location,district_id,city_id,phone_number,email,contact_name,contact_mobileno,website,status,image_path)values('$var_hospital_name','$var_location','$var_dis','$var_city_id','$var_phone_number','$var_email','$var_contact_name','$var_contact_mobileno','$var_website','$var_status','$var_file_path')";
      $varresult=mysql_query($varsql)or die(mysql_error());
     
	    $doc_max="SELECT max(id) AS max FROM hospital";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
     $docmax_id=$doc_row['max'];
    $info=pathinfo($_FILES['txt_image_path']['name']);
	$ext=$info['extension'];
	$docname="hospital".$docmax_id;
	$var_file_path=$docname.".".$ext;
    $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['txt_image_path']['tmp_name'], $target);
	mysql_query("update hospital set image_path='$target' where id='$docmax_id'");

      echo '<script>window.location = "index.php?pp=1";</script>';
      ?>
