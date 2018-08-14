<link type="text/css" rel="stylesheet" media="all" href="chat/css/chat.css" />




<?php


// include"aheader.php";


      include 'Database/dbconnect.php';
      $connection =new createConnection();
      $connection->connectToDatabase();
      $connection->selectDatabase();;


session_start();

$uname=$_SESSION['username'];

$a="select login.* from login where not username='$uname' order by status desc";
 $q=mysql_query($a);

?>
<br /><br />
<table>
<?php
while($row=mysql_fetch_array($q))
{
    $status=$row['status'];
    ?>
<tr>
    <?php
    if($status==1)
    {
        ?>
<td><img src="t.png" height="14" width="10"></td>
<?php
    }
    else
    {
        ?>
        <td><img src="u.png" height="14" width="10"></td>
        <?php
    }
    ?>

<td style=" padding-left:10px;">
<a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $row['name']; ?>')" style="text-decoration:none; font-size:14px;"><?php echo $row['name']; ?></a> </td>

</tr>
<tr><td>&nbsp;</td></tr>

<?php
}
?>

</table>


