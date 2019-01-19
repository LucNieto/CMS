

<?php include "includes/admin_header.php";?>

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
                        <form action="">
                            <div class="form-group">
                                <input type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <?php
                        include "../includes/db.php";
                            $query = "SELECT * FROM category";
                            $select_categories = mysqli_query($connection, $query);

                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_assoc($select_categories)){
                                        $id = $row['catID'];
                                        $name = $row['catName'];
                                        echo "<tr>";
                                        echo "<td>{$id}</td>";
                                        echo "<td>{$name}</td>";
                                        echo "</tr>";
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