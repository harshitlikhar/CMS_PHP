<?php //include "./functions.php";
    if (isset($_POST['add_user'])) {
        
        
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

        $query = "INSERT INTO users(user_firstname,user_lastname, user_role, username, user_email, user_password)";
     
        $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

        $res = mysqli_query($connection, $query);

        if(!$res){
          die("UPDATION FAILED" . mysqli_error($connection));
        }else{
          echo " <div class='alert alert-success'>  
                  <strong>Success!</strong> New User is added : " . " <a href='users.php'>View All Users</a>
                 </div>";
        }

    } 
 ?>
  <form action="" method="post" enctype="multipart/form-data">   
      <div class="form-group">
         <label for="title">First Name</label>
          <input type="text" class="form-control" name="user_firstname">
      </div> 
      
        <div class="form-group">
         <label for="title">Last Name</label>
          <input type="text" class="form-control" name="user_lastname">
      </div> 


        <div class="form-group">
        <select name="user_role" id="">
          <option value="User">Select Options</option>
          <option value="Admin">Admin</option> 
          <option value="User">User</option>
        </select>
      </div>
      
                 
      <!-- <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div> -->

      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
         <input type="text" class="form-control" name="user_email" >
      </div>
      
      <div class="form-group">
         <label for="post_content">Password *</label>
         <input type="password" class="form-control" name="user_password" >
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
      </div>


</form>