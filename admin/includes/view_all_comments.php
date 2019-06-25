<table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Comment To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM comments";
                                $res_fetch = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_fetch)) {

                                $comment_id = $row['comment_id']; 
                                $comment_post_id = $row['comment_post_id']; 
                                $comment_author = $row['comment_author']; 
                                $comment_content = $row['comment_content'];   
                                $comment_email = $row['comment_email']; 
                                $comment_status = $row['comment_status']; 
                                $comment_date = $row['comment_date']; 
                               
                                
                                 
                                echo "<tr>";
                                echo "<td>$comment_id</td>";
                                echo "<td>$comment_author</td>";
                                echo "<td>$comment_content</td>";

                                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                // $res_edit = mysqli_query($connection,$query);
                                // while ($row = mysqli_fetch_assoc($res_edit)) {

                                //     $cat_id = $row['cat_id'];
                                //     $cat_title = $row['cat_title'];
                                // }

                                //echo "<td>$cat_title</td>";
                                echo "<td>$comment_email</td>";
                                echo "<td>$comment_status</td>";

                                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                $res_com_post = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($res_com_post)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];

                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                }
                                
                                echo "<td>$comment_date</td>";
                                // echo "<td>$post_comment_count</td>";
                                // echo "<td>$post_date</td>";
                                // echo "<td>$post_content</td>";
                                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove </a></td>";
                                
                                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                echo "</tr> ";
                               
                                } ?> 
                                    
                                
                            </tbody>
                        </table>
<?php 
//Approve Comment
    if (isset($_GET['approve'])) {

       $app_comment =  $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $app_comment ";

    $res_app = mysqli_query($connection, $query);
    header("Location: comments.php");
    }    
//Unapprove Comment
    if (isset($_GET['unapprove'])) {

       $una_comment =  $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $una_comment ";

    $res_una = mysqli_query($connection, $query);
    header("Location: comments.php");
    }    

//Delete comment
    if (isset($_GET['delete'])) {

       $del_comment =  $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$del_comment} ";

    $res = mysqli_query($connection, $query);
    header("Location: comments.php");
    
}
 ?>