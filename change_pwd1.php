<?php
include ("aheader.php");
?>

<html>
<body><div align="center">
<head>
<h1><b>CHANGE PASSWORD</b></h1>
<form name="change_pwd.php" action="change_pwd_action.php" method="post">
<table>
<?php
if(isset($_GET['status']))
{
$a=$_GET['status'];
if($a==1)
{
echo "changed";
}
}
?>
<tr>
<td><b>Current Password</b></td>
<td><input type="text" name="txt1" value=""/></td>
</tr>
<tr>
<td><b>New Password</b></td>
<td><input type="text" name="txt2" value=""/></td>
</tr>

<tr>
<td><b>Confirm Password</b></td>
<td><input type="text" name="txt3" value=""/></td>
</tr>
</table>
<tr>
<td><b><input type="submit" name="cmd" id="id" value="Save"/></b></td>
 <td><b><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></b></td>
</tr>
</form>
</head>
</div>
</body>
</html>
<?php
include ("footer.php");
?>