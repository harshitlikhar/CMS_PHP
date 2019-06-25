<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
<?php ob_start(); ?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                            <?php insertCat(); //add category ?> 
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Category Title</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div>
                            </form>

                            <?php 
                            // Update and Include Query
                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];


                                include "includes/update_cat.php ";
                            }

                             ?>
                       </div>                     

                       <div class="col-xs-6">
                        

                             <table class="table table-bordered table-hover">
                                 <thead >
                                     <tr>
                                         <th>ID</th>
                                         <th>Category Title</th>
                                     </tr>
                                <tbody>
                                    <?php showCat();  //to show all categories ?>
                                     
                                     <?php deleteCat(); //Delete Category ?>
                                        
                                 </tbody>
                             </table>
                         </div>  

                        <!--<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
