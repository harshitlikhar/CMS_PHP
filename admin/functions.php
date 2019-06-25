<?php 
    

    function confirm($res){
        global $connection;
        if (!$res) {
            die("QUERY FAILED". mysqli_error($connection));
        }else{
            //echo "test ";
        }
    }


	function insertCat()
	{
		global $connection;
		if (isset($_POST['submit'])) { $cat_title = $_POST['cat_title'];

        	if ($cat_title == "" || empty($cat_title)) 
        	{
            echo "This Field must not be empty";
        	} 
        else{
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $res_add = mysqli_query($connection, $query);
            if (!$res_add) {
                die("QUERY FAILED!!" . mysqli_error($connection));
            	}
        	} 
    	}
    }

    function deleteCat(){
    	global $connection;
    	if (isset($_GET['delete'])) { 
        	$get_cat_id = $_GET['delete'];
        	$query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
            $res_del = mysqli_query($connection, $query);

            if (!$res_del) {
                die("QUERY FAILED!!" . mysqli_error($connection));
            }else{
                header("location: categories.php");
                }
            }
    }

    function showCat(){
    	global $connection;
    		$query = "SELECT * FROM categories";
        	$res_fetch = mysqli_query($connection,$query);
         	while ($row = mysqli_fetch_assoc($res_fetch)) {

	            $cat_id = $row['cat_id'];
    	        $cat_title = $row['cat_title'];

                echo "<tr>
                      <td>{$cat_id}</td>
                      <td>{$cat_title}</td>
                      <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>;
                      <td><a href='categories.php?edit={$cat_id}'>Edit</a></td></tr>";
            }  
        }
 ?>