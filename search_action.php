   <?php include 'aheader.php'; ?>
  <html>
<head>
<h1><b>     PLANDETAILS DETAILS</h1>
</head>
<center>
<body>
          <link href="aniltable.css" rel="stylesheet" type="text/css">
      <table class="CSSTableGenerator">
     <tr bgcolor="#CCCCCC">
          <td><b>Id</b></td>
          <td><b>Plan</b></td>
          <td><b>Age_group</b></td>
          <td><b>Amount</b></td>
  <?php
      include 'dbconnect1.php';
      $mem_var_con=new dbconnect1();
           $var_profile_name=ucwords($_POST['txt_profile_name']);
           $var_gender=$_POST['txt_gender'];
           $var_date_of_birth=$_POST['txt_date_of_birth'];
           $dt=date('Y-m-d');
           $diff=abs(strtotime($dt)-strtotime($var_date_of_birth));
          echo $age=floor($diff/(365*60*60*24));
     $var_sql_select="Select plandetails.*, plan.plan_name,age_group.group_name from plandetails,plan,age_group where plandetails.plan_id=plan.id and plandetails.age_group_id=age_group.id and age_group.id in (select id from age_group where age_from<='$age' and age_to>='$age')";
        $var_result=mysql_query($var_sql_select);
         
 $slno=1;

         while($row=mysql_fetch_array($var_result))
            
             { ?>
               <tr>
			   	          <td><?php echo $slno; ?></td>
                          <td><?php echo $row['plan_name']; ?> </td>
                         <td><?php echo $row['group_name']; ?> </td>
                         <td><?php echo $row['amount']; ?> </td>
                         </tr>
            
            
            <?php
          $slno++;
          }
          ?>
            
    

