  <?php
  error_reporting(0);
      include 'dbconnect.php';
	  $db=new dbconnect();
	  $var_id=$_GET['id'];
	$varsql="select email from doctor where id='$var_id'";
	 $var=mysql_query($varsql);
	 $row=mysql_fetch_array($var);
	 $var_email=$row['email'];
	  $pass=rand(100000,1000000);
      
	  $upd="insert into login(username,password,userlevel)values('$var_email','$pass','2')";
      $ans_upd=mysql_query($upd) or die(mysql_error());
	  
	  $varsql="update doctor set status=1 where id='$var_id'"; 
      $varresult=mysql_query($varsql)or die(mysql_error());
	  
      echo $emailid=$var_email;
     include_once("phpmailer/class.phpmailer.php");
       $pm = new PHPMailer();
       $pm->IsSMTP(true);
	   $pm->IsHTML(true);
       $pm->Host = 'ssl://smtp.gmail.com:465';
       $pm->SMTPAuth = true;
       $pm->Username = 'projectdesk2018@gmail.com';
       $pm->Password = 'projectdesk';
       $pm->From = 'projectdesk@gmail.com';
       $pm->FromName = 'Health Plus **Quality Care 4 U**';
	  // $pm->AddEmbeddedImage('t.png'); 
 $pm->Body = "<table width=\"80%\">
 <tr bgcolor=\"#FA9494\">
<td><center><b><font color=\"white\" size=\"5\" face=\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif\">Your Username is</font></b></center></td>
</tr>
<tr bgcolor=\"#FFFFFF\">
<td><center><font color=\"black\" size=\"4\" > <b>$emailid</b></font></center></td>
</tr>
<tr bgcolor=\"#FA9494\">
<td><center><b><font color=\"white\" size=\"5\" face=\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif\">Your Password is</font></b></center></td>
</tr>
<tr bgcolor=\"#FFFFFF\">
<td><center><font color=\"black\" size=\"4\"> <b>$pass</b></font></center></td>
</tr>
<tr bgcolor=\"#F4D1C8\">
<td></td>
</tr>

</table>";
	 
	
       $pm->Subject = 'username and password';
      
       $pm->AddAddress($emailid); 
       $pm->Send();
   echo '<script>window.location = "Doctor_Select.php";</script>';
      ?>
