<?php //include "./functions.php";
    if (isset($_POST['create_post'])) {
        
        $post_author = $_POST['post_author']; 
        $post_title = $_POST['post_title'];   
        $post_category_id = $_POST['post_category_id']; 
        $post_status = $_POST['post_status']; 
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];  
        $post_tags = $_POST['post_tags']; 
       // $post_comment_count = 4;
        $post_date = date('d-m-y'); 
        $post_content = $_POST['post_content'];
 

     move_uploaded_file($post_image_temp, "../images/$post_image");

     $query = "INSERT INTO posts(post_category_id, post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
     
     $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";

        $res = mysqli_query($connection, $query);

        if(!$res){
          die("UPDATION FAILED" . mysqli_error($connection));
        }else{
          $po_id = mysqli_insert_id($connection);
          echo " <div class='alert alert-success'>  
                  <strong>Success!</strong> Post is Added : " . " <a href='../post.php?p_id={$po_id}'>View Post!</a> Or <a href='posts.php'>View All Post!</a>
                 </div>";
        }

    } 
 ?>
<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
      </div>

        <div class="form-group">
        <select name="post_category_id" id="">
          
          <?php 
            $query = "SELECT * FROM categories ";
            $res_edit = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_assoc($res_edit)) {
                confirm($res_edit);

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
          

            echo "<option value='{$cat_id}'>{$cat_title}</option>";

              }
          ?>
         </select>
      </div>
      
         <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="post_author">
      </div> 
      
      <div class="form-group">
          
          <select name="post_status" id="">
            <option value="draft">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
          </select>
         
      </div>       


       <!--<div class="form-group">
       <label for="users">Users</label>
       <select name="post_user" id="">

           </select>
      
      </div>    
      <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div-->      
      
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="body" cols="30" rows="10">
         </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>


</form>