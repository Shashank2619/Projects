<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php
           if(isset($_SESSION['add']))
           {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
           }
         ?>  
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>

<?php
   //Process the value from form
   //check whether the button is clicked or not

   if(isset($_POST['submit']))
   {
     //echo "Button Clicked";

     //Get data from form
     $full_name=$_POST['full_name'];
     $username=$_POST['username'];
     $password=md5($_POST['password']);//encryption of password

     //sql query

     $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
           "; 

    //execute the query and set data
  
   $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));     
   if($res==TRUE)
   {
    $_SESSION['add']="Admin added successfully";
    header("location:".SITEURL.'admin/manage-admin.php');
   }  
   else
   {
    $_SESSION['add']="Failed To add admin successfully";
    header("location:".SITEURL.'admin/add-admin.php');
   }
   }

?>