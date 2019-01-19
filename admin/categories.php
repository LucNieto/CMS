

<?php include "includes/admin_header.php";
include "../includes/db.php";?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome
                        <small>To the admin panel</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                            if(isset($_POST['submit'])){
                                $catName = $_POST['catName'];
                                if ($catName == "" || empty($catName)){
                                    echo "Field required";
                                }else{
                                    $query = "SELECT * FROM category WHERE catName LIKE '%$catName%'";
                                    $search_query = mysqli_query($connection, $query);
                                    if(!$search_query){
                                        die("SORRY, CONNECTION FAILED");
                                    }
                                    $count = mysqli_num_rows($search_query);
                                    if ($count == 0){
                                        $insert_query = "INSERT INTO category(catName) VALUE ('{$catName}')";
                                        $create_category = mysqli_query($connection, $insert_query);
                                        if(!$create_category){
                                            die("SORRY, NEW CATEGORY COULDN'T BE CREATED");
                                        }
                                    }else{
                                        echo "Sorry, {$catName}, already exists";
                                    }
                                }
                            }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="catName">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Delete</th>
<!--                                <th>Update</th>-->
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM category";
                                $select_categories = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_categories)){
                                        $id = $row['catID'];
                                        $name = $row['catName'];
                                        echo "<tr>";
                                        echo "<td>{$id}</td>";
                                        echo "<td>{$name}</td>";
                                        echo "<td ><a  href='categories.php?delete={$id}'><span class='glyphicon glyphicon-trash'></a></span></td>";
                                        echo "</tr>";
                                        }
                                ?>
                                <?php
                                    if (isset($_GET['delete'])){
                                        $selected_id = $_GET['delete'];
                                        $query = "DELETE FROM category WHERE catID = {$selected_id} ";
                                        $delete_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                ?>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>


    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>