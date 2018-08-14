<?php
include 'aheader.php'; 
?>

     <div >
     <h1>Change Profile Photo</h1>
     <form name="uploading.php" action="uploading_action.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Upload Photo</td>
                <td><input type="file" name="file" id="file" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
			
        </table>
        </form>
       </div>
        </div>
<?php include 'footer.php'; ?>