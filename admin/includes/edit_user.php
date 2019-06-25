<?php //include "./functions.php";
    
   if (isset($_GET['edit'])) {
     $edit_id = $_GET['edit'];
    

    $query = "SELECT * FROM users WHERE user_id = {$edit_id}";
    $res_fetch = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($res_fetch)) {

      $user_id = $row['user_id']; 
      $username = $row['username']; 
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname']; 
      $user_lastname = $row['user_lastname'];   
      $user_email = $row['user_email'];
      //$user_image = $row['user_image'];  
      $user_role = $row['user_role'];  
      }}


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

        $query = "SELECT randSalt FROM users";
        $res_crypt = mysqli_query($connection, $query);

        if (!$res_crypt) {
            die("NOT WORKING" . mysqli_error($connection));
        }

        $row   = mysqli_fetch_assoc($res_crypt);
        $salt  = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt); 
        
        $query  = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', "; 
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE user_id ={$edit_id}";

    $res_upd = mysqli_query($connection, $query);

    if (!$res_upd) {
            die("QUERY FAILED". mysqli_error($connection));
        }else{
            echo " <div class='alert alert-success'>  
                  <strong>Success!</strong> User is Updated : " . " <a href='users.php'>View All Users</a>
                 </div>";
        }



    } 
 ?>
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
         <input type="password" class="form-control" name="user_password" >
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
      </div>


</form>