  <?php
  error_reporting(0);
          $var_lab_name=ucwords($_POST['txt_lab_name']);
          $var_phone_number=ucwords($_POST['txt_phone_number']);
          $var_email=strtolower($_POST['txt_email']);
          $var_website=$_POST['txt_website'];
		  $var_dis=$_POST['slb_district_id'];
          $var_city_id=$_POST['slb_city_id'];
          $var_status=0;
		 //  $var_image_path=ucwords($_POST['txt_image_path']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into medical_lab (lab_name,phone_number,email,website,district_id,city_id,status) values('$var_lab_name','$var_phone_number','$var_email','$var_website','$var_dis','$var_city_id','$var_status')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	   $doc_max="SELECT max(id) AS max FROM  medical_lab";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
     $docmax_id=$doc_row['max'];
    $info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$docname="lab".$docmax_id;
	$var_file_path=$docname.".".$ext;
      $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);
	mysql_query("update medical_lab set image_path='$target' where id='$docmax_id'");
	
       echo '<script>window.location = "index.php?pp=1";</script>';
      ?>
