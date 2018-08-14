<?php include 'aheader.php'; ?>
	     <?php
               include 'dbconnect.php';
      			$db=new dbconnect(); 
		if(isset($_POST['txt_doctor_name']))
			{
			$doctor_id=0;
			}
		else
			{
			 $doc_max1="SELECT max(id) AS max FROM  doctor";
      		 $doc_result1=mysql_query($doc_max1);
    		 $doc_row1=mysql_fetch_array($doc_result1);
			 $doctor_id=$doc_row1['max'];
			}
				 $_SESSION['flag']=0;
				 
    if(isset($_POST['cmdQuali']))
      {
	   
			
	    $_SESSION['flag']=1;
	    $var_qualification=$_POST['txt_Qualification'];
          $var_collage=$_POST['txt_Collage'];
          $var_university=$_POST['txt_University'];
          $var_year=$_POST['txt_Year'];
		  $var_certificate_path="-";
		        		$varsql="insert into qualification_details (qualification_id,doctor_id,college,university,year,certificate_path) values('$var_qualification','$doctor_id','$var_collage','$var_university','$var_year','$var_certificate_path')";
     		 $varresult=mysql_query($varsql)or die(mysql_error());
		 
		 $sql1="SELECT max(id) AS max FROM  qualification_details";
      $doc_result1=mysql_query($sql1);
      $doc_row1=mysql_fetch_array($doc_result1);
     $docmax_id1=$doc_row1['max'];
    $info1=pathinfo($_FILES['txt_certicate_path']['name']);
	$ext1=$info1['extension'];
	$docname1="certificate".$docmax_id1;
	$var_file_path1=$docname1.".".$ext1;
    $target1='upload/'.$var_file_path1;
	move_uploaded_file($_FILES['txt_certificate_path']['tmp_name'], $target1);
	mysql_query("update qualification_details set certificate_path='$target1' where id='$docmax_id1'");
	 	 
	  }
	  elseif(isset($_POST['CmdExperiences']))
      {
	   echo '<script>window.location = "experience_add.php";</script>';
	  }
	  elseif(isset($_POST['txt_doctor_name']))
	  {
	       			 
	   $var_doctor_name=ucwords($_POST['txt_doctor_name']);
          $var_house_name=ucwords($_POST['txt_house_name']);
          $var_city_id=$_POST['slb_city_id'];
          $var_district_id=$_POST['slb_district_id'];
		  $var_card=$_POST['txt_card'];
          $var_card_no=$_POST['txt_card_no'];
          $var_mobile_number=ucwords($_POST['txt_mobile_number']);
          $var_email=strtolower($_POST['txt_email']);
          $var_specialization_id=$_POST['slb_specialization_id'];
          $var_status=0;
           $var_image_path="-";
      $varsql="insert into doctor (doctor_name,house_name,city_id,district_id,card,card_no,mobile_number,email,specialization_id,status,image_path) values('$var_doctor_name','$var_house_name','$var_city_id','$var_district_id','$var_card','$var_card_no','$var_mobile_number','$var_email','$var_specialization_id','$var_status','$var_image_path')";
	  
      $varresult=mysql_query($varsql)or die(mysql_error());
	  
	   $doc_max="SELECT max(id) AS max FROM  doctor";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
      $docmax_id=$doc_row['max'];
      $info=pathinfo($_FILES['txt_image_path']['name']);
	  $ext=$info['extension'];
	  $docname="doctor".$docmax_id;
	  $var_file_path=$docname.".".$ext;
      $target='upload/'.$var_file_path;
	  move_uploaded_file($_FILES['txt_image_path']['tmp_name'], $target);
	  mysql_query("update doctor set image_path='$target' where id='$docmax_id'");
	  
	   $doc_max1="SELECT max(id) AS max FROM  doctor";
      $doc_result1=mysql_query($doc_max1);
      $doc_row1=mysql_fetch_array($doc_result1);
	  }
	  ?>
<html>
<form name="Doctor_Second.php" action="Doctor_Second.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<center>
<div class="home-page-container column">
				<div class="left-pagecontainer">
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $doc_row1 ;?>"></td>
	  </tr>
           <tr>
          <td><b>Qualification</b></td>
          <td><select  name="txt_Qualification"  id="txt_Qualification">
          <option value="0">Select</option>
     <?php
      $varslbsql_id="select * from qualification";
      $varresult_id=mysql_query($varslbsql_id)or die(mysql_error());
        while($row_id =mysql_fetch_array($varresult_id))
          { ?>
           <option value="<?php echo $row_id[0]; ?>"><?php echo $row_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
		  </tr>
          <tr>
          <td><b>College</b></td>
          <td><input type="text" name="txt_Collage" id="txt_Collage" value=""></td>
          </tr>
		   <tr>
          <td><b>University</b></td>
          <td><input type="text" name="txt_University" id="txt_University" value=""></td>
          </tr>
          <tr>
          <td><b>Year</b></td>
          <td><input type="text" name="txt_Year" id="txt_Year" value=""></td>
          </tr>
		   <tr>
          <td><b>Upload the certificate</b></td>
          <td><input type="file" name="txt_certicate_path" id="txt_certicate_path" value=""></td>
          </tr>
		  
          <tr>
          <td></td>
          <td><input type="submit" name="cmdQuali" id="cmdQuali" value="Save"></td>
		  </tr>
		  </table>
		  </div>
		  <div class="right-pagecontainer">
		  <?php
		  if($doctor_id>0)
		  {
		  $var3="select qualification_details.*,doctor.doctor_name,qualification.qualification,doctor.id from doctor,qualification,qualification_details where qualification_details.doctor_id=doctor.id and qualification_details.qualification_id=qualification.id and doctor.id='$doctor_id'";
		$var4=mysql_query($var3)or die(mysql_error());
		?>
		  
		<table>
		  <tr>
		  <td><b>Id</b></td>
		  <td><b>Name</b></td>
          <th><b>Qualification</b></th>
          <th><b>College</b></th>
		   <th><b>University</b></th>
		   <th><b>Year</b></th>
		   <th> Delete </th>
		</tr>
		<?php
		$slno=1;
		 while($row=mysql_fetch_array($var4))
		 {
		?>
		<tr>
		<td><?php echo $slno; ?></td>
		<td><?php echo $row['doctor_name']; ?></td>
		<td> <?php echo $row['qualification']; ?> </td>
		<td> <?php echo $row['college']; ?> </td>
		<td><?php echo $row['university']; ?></td>
		<td> <?php echo $row['year']; ?> </td>
		<td> <a href="qualification_detail_delete.php?id=<?php echo $row[0]; ?>">Delete</a> </td>
	
		</tr>
		<?php 
		$slno++;
		}
		
?>
</table>
		
		  
		              <?php
					  }
		  // if($flag==1)
		   {
		   ?>
		   <tr>
           <td><input type="submit" name="CmdExperiences" id="CmdExperiences" value="Experiences"></td>
          </tr>
		  		  <?php
		  }
		  ?>
		  </div>
		  </div>

</html>