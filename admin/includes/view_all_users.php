<table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Change To</th>
                                    <th>Change To</th>
                                    <th>Edit</th>                                    
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM users";
                                $res_user = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_user)) {

                                $user_id = $row['user_id']; 
                                $username = $row['username']; 
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname']; 
                                $user_lastname = $row['user_lastname'];   
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];  
                                $user_role = $row['user_role']; 
                                //$comment_date = $row['comment_date']; 
                               
                                
                                 
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$username</td>";
                                echo "<td>$user_firstname</td>";

                                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                // $res_edit = mysqli_query($connection,$query);
                                // while ($row = mysqli_fetch_assoc($res_edit)) {

                                //     $cat_id = $row['cat_id'];
                                //     $cat_title = $row['cat_title'];
                                // }

                                //echo "<td>$cat_title</td>";
                                echo "<td>$user_lastname</td>";
                                echo "<td>$user_email</td>";

                                // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                // $res_com_post = mysqli_query($connection, $query);
                                // while ($row = mysqli_fetch_assoc($res_com_post)) {
                                //     $post_id = $row['post_id'];
                                //     $post_title = $row['post_title'];

                                // echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                // }
                                echo "<td>$user_role</td>";
                                
                                
                                echo "<td><a href='users.php?admin=$user_id'> Admin</a></td>";
                                echo "<td><a href='users.php?user=$user_id'> User </a></td>";
                                echo "<td><a href='users.php?source=edit_user&edit=$user_id'>Edit</a></td>";
                                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                echo "</tr> ";
                               
                                } ?> 
                                    
                                
                            </tbody>
                        </table>
<?php 
//Change to Admin 
    if (isset($_GET['admin'])) {

       $to_admin =  $_GET['admin'];

    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $to_admin ";

    $res_adm = mysqli_query($connection, $query);
    header("Location: users.php");
    }    
//Change to  user
    if (isset($_GET['user'])) {

       $to_user =  $_GET['user'];

    $query = "UPDATE users SET user_role = 'User' WHERE user_id = $to_user ";

    $res_user = mysqli_query($connection, $query);
    header("Location: users.php");
    }    

//Delete user
    if (isset($_GET['delete'])) {

       $del_user =  $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$del_user} ";

    $res = mysqli_query($connection, $query);
    header("Location: users.php");
    
}
 ?>