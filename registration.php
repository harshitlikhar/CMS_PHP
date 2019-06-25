
<?php  include "includes/header.php"; ?>
<?php  include "includes/navigation.php"; ?>
<?php 
    if (isset($_POST['submit'])) {
        
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

       

        if (!empty($username) && !empty($email) && !empty($password) ) {

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT randSalt FROM users";
        $res_crypt = mysqli_query($connection, $query);

        if (!$res_crypt) {
            die("NOT WORKING" . mysqli_error($connection));
        }

        $row   = mysqli_fetch_assoc($res_crypt);
        $salt  = $row['randSalt'];
        $password = crypt($password, $salt); 

        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$email}', '{$password}', 'User')";
        $register_user = mysqli_query($connection, $query);
            if (!$register_user) {
                die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
            }else{
                $msg = "<div class='alert alert-success'> <strong>Success!</strong> Your Registration have been submitted </div>";
            }
        }else {
            $msg =  " <div class='alert alert-danger'>  <strong>Fields should not be empty</strong> </div>";
                }
        }else{
            $msg = "";
        }

        
 ?>
    <!-- Navigation -->
    
    
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="test-center"><?php echo $msg; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
