      <?php include 'aheader.php'; ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_specialization_name");
if(dvar1.value=="")
{
 alert("Enter specialization_name...");
dvar1.focus();
return false;
}
}
</script>
<form name="Specialization_Add.php" action="Specialization_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Specialization Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Specialization Name</b></label>
          <td><input type="text" name="txt_specialization_name"  class="form-control" id="txt_specialization_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
