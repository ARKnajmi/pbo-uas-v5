<?php
include_once '../classes/Category.php';
$cat = new Category();


if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location = 'catlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];

    $updateCat = $cat->catUpdate($catName, $id);
}
?>
<?php include_once 'inc/header.php'; ?>



<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Categories</li>
        </ol>

        <!-- Page Content -->





        <h2>Update Categories</h2>
        <?php
        if (isset($updateCat)) {
            echo $updateCat;
        }

        $getCat = $cat->getCatById($id);
        if ($getCat) {
            while ($result = $getCat->fetch_assoc()) {
        ?>
                <form action="" method="post">
                    <table class="form">
                        <div class="form-group">
                            <tr>
                                <td>
                                    <input class="form-control" type="text" name="catName" value="<?php echo $result['catName']; ?>" class="medium" />
                                </td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td>
                                    <br>
                                    <input class="btn btn-success btn-block" type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </div>
                    </table>
                </form>
        <?php }
        } else {
            echo "<span style='color:red;'>Category not found !</span>";
        } ?>






    </div>
    <!-- /.container-fluid -->



</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php include_once 'inc/footer.php'; ?>