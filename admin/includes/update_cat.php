<form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Edit Category</label>
                                <?php
                                //edit button categories
                                    if (isset($_GET['edit'])) {
                                        $cat_id = $_GET['edit'];
                                        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                        $res_edit = mysqli_query($connection,$query);
                                        while ($row = mysqli_fetch_assoc($res_edit)) {

                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                ?>            
                                  
                                <input value="<?php if(isset($cat_title)){ echo $cat_title ;} ?>" class="form-control" type="text" name="cat_title">
                                           
                                <?php }} ?>    
                                
                                <?php 
                                // update category 
                                if (isset($_POST['update'])) {
                                    
                                    $the_cat_title = $_POST['cat_title'];

                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                                        
                                    $res_upd = mysqli_query($connection, $query);

                                    if (!$res_upd) {
                                        die("QUERY Failed" . mysqli_error($connection));
                                    }
                                    }
                                ?>
                    
                                    
                                </div>
                            

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Update category">
                                </div>
                            </form>