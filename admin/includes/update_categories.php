



<form action="" method="post">
    <div class="form-group">
        <label>Category</label>
        <?php
        if (isset($_GET['edit'])){
            $selected_id = $_GET['edit'];


                $query = "SELECT * FROM category WHERE catID = {$selected_id} ";
                $update_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($update_query)) {
                    $id = $row['catID'];
                    $name = $row['catName'];
                    ?>
                    <input  type="text" name="catName" value="<?php if(isset($name)){echo $name;} ?>">

                <?php }

        }?>

        <?php
        if (isset($_POST['update'])){
            $selected_category = $_POST['catName'];
            if ($selected_category == "" || empty($selected_category)){
                echo "Field required";
            }else{
                $query = "UPDATE category SET  catName = '{$selected_category}' WHERE catID = {$cat_id} ";
                $update_query = mysqli_query($connection, $query);
                header("Location: categories.php");
            }
        }
        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update category">
    </div>
</form>
