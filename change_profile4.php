      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b> Change Profile Picture</h2>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar11 = document.getElementById("txt_image_path");
if(dvar11.value=="")
{
 alert("Enter image_path...");
dvar11.focus();
return false;
}
}
</script>

<form name="change_profile4.php" action="change_profile_action4.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<center>
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_id" id="txt_id" value=""></td>
	  </tr>
 
          <tr>
          <td><b>Image Path</b></td>
          <td><input type="file" name="txt_image_path" id="txt_image_path" value=""></td>
          </tr>
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Save"></td>
		  <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
</table>
</center>
</body>
</html>
      <?php include 'footer.php'; ?>
