<?php
    include_once '../classes/Brand.php';
    $brand = new Brand();


    if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
        echo "<script>window.location = 'brandlist.php';</script>";
    }else{
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];

        $updateBrand = $brand->catUpdate($brandName, $id);
    }
?>
<?php include_once 'inc/header.php'; ?>



      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Categories</li>
          </ol>

          <!-- Page Content -->
         




             <h2>Update Categories</h2>
             <?php 
                    if (isset($updateBrand)) {
                        echo $updateBrand;
                    }

                    $getBrand = $brand->getBrandById($id);
                    if ($getBrand) {
                        while ($result = $getBrand->fetch_assoc()) {
                ?>
                            <form action="" method="post">
                                <table class="form">
                                <div class="form-group">	
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" name="brandName" value="<?php echo $result['brandName']; ?>" class="medium" />
                                        </td>
                                    </tr>
                                </div>

                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <input class="btn btn-success btn-block" type="submit" name="submit" Value="Update" />
                                        </td>
                                    </tr>
                                </div>
                                </table>
                            </form>
                <?php } }else{
                    echo "<span style='color:red;'>Category not found !</span>";
                } ?>





        </div>
        <!-- /.container-fluid -->

        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once 'inc/footer.php'; ?>
