
<?php   
    if (isset($_POST['checkBoxArray'])) {
       foreach ( $_POST['checkBoxArray'] as $box_post_id) {
           $bulk_options =  $_POST['bulk_options'];

           switch ($bulk_options) {
               case 'published':
                   $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$box_post_id} ";
                   $published_box = mysqli_query($connection, $query);
                   confirm($published_box);
                   break;
               case 'draft':
                   $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$box_post_id} ";
                   $draft_box = mysqli_query($connection, $query);
                   confirm($draft_box); 
                   break;
               case 'delete':
                   $query = "DELETE FROM posts WHERE post_id = {$box_post_id} ";
                   $delete_box = mysqli_query($connection, $query);
                   confirm($delete_box);
                   break;
               default:
                   # code...
                   break;
           }
       }
    }

 ?>
<form action="" method="post">
<table class="table table-bordered table-hover table-striped ">


    <div id="bulkOptionsContainer" class="col-xs-4" style="padding: 0px">
        <select class="form-control" name="bulk_options" id="">
            <option value="#">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>

    <div class="col-xs-4" >
        <input class="btn btn-success" type="submit" name="submit" value="Apply">
        <a  class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>  
    <br/><br/>
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Edit </th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM posts";
                                $res_fetch = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_fetch)) {

                                $post_id = $row['post_id']; 
                                $post_author = $row['post_author']; 
                                $post_title = $row['post_title'];   
                                $post_category_id = $row['post_category_id']; 
                                $post_status = $row['post_status']; 
                                $post_image = $row['post_image']; 
                                $post_tags = $row['post_tags']; 
                                $post_comment_count = $row['post_comment_count']; 
                                $post_date = $row['post_date']; 
                                $post_content = $row['post_content']; 
                                
                                 
                                echo "<tr>";
                                ?>
        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                <?php
                                echo "<td>$post_id</td>";
                                echo "<td>$post_author</td>";
                                echo "<td>$post_title</td>";

                                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                $res_edit = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_edit)) {

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                }

                                echo "<td>$cat_title</td>";
                                echo "<td>$post_status</td>";
                                echo "<td><img width = '100' src='../images/$post_image' alt='image'></td>";
                                echo "<td>$post_tags</td>";
                                echo "<td>$post_comment_count</td>";
                                echo "<td>$post_date</td>";
                                echo "<td><a href='../post.php?p_id={$post_id}'> View Post </a></td>";
                                //echo "<td>$post_content</td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr> ";
                               
                                } ?> 
                                    
                                
                            </tbody>
                        </table>
                        </form>
<?php 
    //Delete post
    if (isset($_GET['delete'])) {

       $del_post_id =  $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$del_post_id} ";

    $res = mysqli_query($connection, $query);
    header("Location: /php_project/admin/posts.php");
    
}
 ?>