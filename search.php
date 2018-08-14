      <?php include 'aheader.php'; ?>
<html>
<head>
<h1><b> SEARCH PLANS</h1>
</head>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_date_of_birth').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="search.php" action="search_action.php" enctype="multipart/form-data" method="post" onSubmit="return validate()">
<body>
<center>
      <table >
          <tr>
          <td><b>First Name</b></td>
          <td><input type="text" name="txt_profile_name" id="txt_profile_name" value=""></td>
          </tr>
          <tr>
          <td><b>Gender</b></td>
          <td><select  name="txt_gender"  id="txt_gender">
           <option value="">Select</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
          </select>
          </td>
          </tr>

          <tr>
          <td><b>Date Of Birth</b></td>
          <td><input type="text" name="txt_date_of_birth" id="txt_date_of_birth" value="<?php echo date("Y/m/d") ?>"></td>
          </tr>
         
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Go"></td>
          </tr>
</table>
</center>
</body>
</html>
      <?php include 'footer.php'; ?>
