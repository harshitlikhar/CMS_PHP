<?php include "includes/admin_header.php"; ?>

<?php ob_start(); ?>

<?php  
    if (isset($_SESSION['username'])) {
       $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $res = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($res) ) {
         
        $user_id = $row['user_id']; 
        $username = $row['username']; 
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname']; 
        $user_lastname = $row['user_lastname'];   
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];  
        $user_role = $row['user_role']; 
     } }
?>
<?php 
    if (isset($_POST['edit_user'])) {
        
        
        $user_firstname = $_POST['user_firstname'];   
        $user_lastname = $_POST['user_lastname']; 
        $user_role = $_POST['user_role']; 
        $username = $_POST['username']; 
        $user_email = $_POST['user_email']; 
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];  
        $user_password = $_POST['user_password'];
       // $post_comment_count = 4;
        //$post_date = date('d-m-y'); 
        
 

     //move_uploaded_file($post_image_temp, "../images/$post_image");

        
        $query  = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', "; 
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}'";

    $res_upd = mysqli_query($connection, $query);
    if (!$res_upd) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

} 
 ?>
    




    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Kanrisha e yōkoso
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
<form action="" method="post" enctype="multipart/form-data">   
      <div class="form-group">
         <label for="title">First Name</label>
          <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
      </div> 
      
        <div class="form-group">
         <label for="title">Last Name</label>
          <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
      </div> 


        <div class="form-group">
        <select  name="user_role" id="">
          <option value="User"><?php echo $user_role ; ?></option>
          <?php
          if ($user_role == 'Admin') {
           echo "<option value='User'>User</option>"; 
           } else{
           echo "<option value='Admin'>Admin</option>"; 
           
           }
          ?>
          
          
          
        </select>
      </div>
      
                 
      <!-- <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div> -->

      <div class="form-group">
         <label for="post_tags">Username</label>
          <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
         <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email" >
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
         <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password" >
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
      </div>


</form>    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
