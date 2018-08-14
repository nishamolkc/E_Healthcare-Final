
<?php include 'aheader.php'; ?>
<html>
    <head>
        <title>change password</title>
        <center><h1><b>Change_Password</b></h1>
        <script type="text/javascript">
            function check()
            {
                var pass1=document.getElementById("npass");
                var pass2=document.getElementById("rpass");
                if (pass1.value!=pass2.value) {
                    alert ("password not match");
                    pass1.focus();
                    return false;
                    //code
                }
                else
                {}
                //code
            }
        </script>
        <?php
    if(isset($_GET['msg']))
      {
        if($_GET['msg']==2)
          { ?>
              <b> <center><font color="#009900">Password Doesn't Match</font></center> </b>
          <?php   }
         
      }
  ?>
    </head>
    <body>
        <form name="change_password.php" action="change_password_action.php" method="post">
            <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Current Password</b></label>
          <td><input type="password" name="cpass"  class="form-control" id="cpass" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>New Password</b></label>
          <td><input type="password" name="npass"  class="form-control" id="npass" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Retype Password</b></label>
          <td><input type="password" name="rpass"  class="form-control" id="rpass" value=""></td>
</div>
</div>
         <div class="col-md-12">
          <td><input type="submit" name="submit" id="submit" class="btn btn-primary" onClick="return check()" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-primary" onClick="history.back(-1)" value="Back"></td>
</div>    
                 
         
        </form>
    </body>
</html>
 