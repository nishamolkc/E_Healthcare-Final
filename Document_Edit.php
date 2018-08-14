      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from document where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_uploaded_date=$_POST['txt_uploaded_date'];
          $var_title=$_POST['txt_title'];
          $var_file_path=$_POST['txt_file_path'];
          $var_description=$_POST['txt_description'];
          $var_investigations=$_POST['txt_investigations'];
          $var_appoinment_id=$_POST['slb_appoinment_id'];
      $vareditsql="Update document  Set uploaded_date='$var_uploaded_date',title='$var_title',file_path='$var_file_path',description='$var_description',investigations='$var_investigations',appoinment_id='$var_appoinment_id' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Document_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_uploaded_date");
if(dvar1.value=="")
{
 alert("Enter uploaded_date...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_title");
if(dvar2.value=="")
{
 alert("Enter title...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_file_path");
if(dvar3.value=="")
{
 alert("Enter file_path...");
dvar3.focus();
return false;
}
 
 var  dvar5 = document.getElementById("txt_investigations");
if(dvar5.value=="")
{
 alert("Enter investigations...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("slb_appoinment_id");
if(dvar6.value=="")
{
 alert("Select Appoinment Name ...");
dvar6.focus();
return false;
}
}
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_uploaded_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Document_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Document Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Uploaded Date</b></label>
          <td><input type="text" name="txt_uploaded_date"  class="form-control" id="txt_uploaded_date" value="<?php echo $tbrow['uploaded_date']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Title</b></label>
          <td><input type="text" name="txt_title"  class="form-control" id="txt_title" value="<?php echo $tbrow['title']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>File Path</b></label>
          <td><input type="text" name="txt_file_path"  class="form-control" id="txt_file_path" value="<?php echo $tbrow['file_path']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Description</b></label>
          <td><input type="text" name="txt_description"  class="form-control" id="txt_description" value="<?php echo $tbrow['description']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Investigations</b></label>
          <td><input type="text" name="txt_investigations"  class="form-control" id="txt_investigations" value="<?php echo $tbrow['investigations']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Appoinment</b></label>
          <td><select  name="slb_appoinment_id"  class="form-control"  id="slb_appoinment_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlappoinment_id="select * from appoinment";
      $varresultappoinment_id=mysql_query($varslbsqlappoinment_id)or die(mysql_error());
        while($rowappoinment_id =mysql_fetch_array($varresultappoinment_id))
          { ?>
           <option value="<?php echo $rowappoinment_id[0]; ?>"<?php if($rowappoinment_id[0]==$tbrow['appoinment_id']) {?> selected<?php }?>><?php echo $rowappoinment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="CmdSave" id=CmdSave"" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
