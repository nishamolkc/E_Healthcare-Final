<?php include 'aheader.php'; ?>
<?php  $username=$_SESSION['username'];
  include 'dbconnect.php';
      $db=new dbconnect();
	  $id1=$_GET['mvarid'];
			 	$sql="select doctor.*,specialization.specialization_name from doctor,specialization where doctor.specialization_id=specialization.id and doctor.id='$id1'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $doctor_id=$row[0];
				  $doctor_pic=$row['image_path'];
			
			 ?>
			 	  
			 
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $doctor_pic; ?>">
							<img src="upload/<?php echo $doctor_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					House Name :<?php echo $row[2]; ?><br />
					Specialization :<?php echo $row['specialization_name']; ?><br />
					
					Mobile :  <?php echo $row[7]; ?> <br />
					Email :<?php echo $row[8]; ?><br />
				
			
					</div>
				</div>
				 

    
	<td align="center"> <a href="Approve_doctor.php?id=<?php echo $doctor_id; ?>">APPROVE</a> </td>
	</table>
	</div>
	
			</div>
			
			</body>
			