<?php include 'aheader.php'; ?>
<html>
    <head>
        <h1>File Uploads</h1>
    </head>
    <body>
        <form name="uploading.php" action="uploading_action.php" method="post"  enctype="multipart/form-data" class="contact-form">
        <table>
			<tr>
          <td><b>Customer</b></td>
          <td><select  name="slb_customer_id"  id="slb_customer_id">
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqlcustomer_id="select * from customer";
      $varresultcustomer_id=mysql_query($varslbsqlcustomer_id)or die(mysql_error());
        while($rowcustomer_id =mysql_fetch_array($varresultcustomer_id))
          { ?>
           <option value="<?php echo $rowcustomer_id[0]; ?>"><?php echo $rowcustomer_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
		  </tr>
            <tr>
                <td>ID Proof</td>
                <td><input type="file" name="file" id="file" value=""></td>
                <td>Photo</td>
                <td><input type="file" name="photo" id="photo" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
			
        </table>
    </body>
</html>
<?php include 'footer.php'; ?>