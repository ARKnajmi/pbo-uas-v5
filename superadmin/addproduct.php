  <?php
    include_once '../classes/Product.php';
    $pd = new Product();
    include_once '../classes/Category.php';
    $cat = new Category();
    include_once '../classes/Brand.php';
    $brand = new Brand();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertProduct = $pd->productInsert($_POST, $_FILES);
    }
    ?>
  <?php if (isset($insertProduct)) {   ?>

      <div class="alert alert-success ">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Product Added Succesfully.
      </div>

  <?php } ?>
  <?php include_once 'inc/header.php'; ?>



  <div id="content-wrapper">

      <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a href="index.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Add Product</li>
          </ol>

          <!-- Page Content -->





          <h2>Add Product</h2>
          <div class="block">

              <form action="" method="post" enctype="multipart/form-data">
                  <table class="form">
                      <div class="form-group">
                          <tr>
                              <td>
                                  <label>Name</label>
                              </td>
                              <td>
                                  <input class="form-control" type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                              </td>
                          </tr>
                      </div>
                      <div class="form-group">
                          <tr>
                              <td>
                                  <label>Category</label>
                              </td>
                              <td>
                                  <select class="form-control" id="select" name="catId">
                                      <option>Select Category</option>
                                      <?php

                                        $getCat = $cat->getAllCat();
                                        if ($getCat) {
                                            while ($result = $getCat->fetch_assoc()) {
                                        ?>
                                              <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                                      <?php }
                                        } ?>
                                  </select>
                              </td>
                          </tr>
                      </div>
                      <div class="form-group">
                          <tr>
                              <td>
                                  <label>Brand</label>
                              </td>
                              <td>
                                  <select class="form-control" id="select" name="brandId">
                                      <option>Select Brand</option>
                                      <?php

                                        $getBrand = $brand->getAllBrand();
                                        if ($getBrand) {
                                            while ($result = $getBrand->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                                    <?php }
                                        } ?>
                                </select>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea class="form-control" rows="10" cols="62" name="body"></textarea>
                            </td>

                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="price" placeholder="Enter Price..." class="medium" />
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <br>
                                <input class="form-control" type="file" name="image" />
                                <br>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Product Type</label>
                            </td>
                            <td>
                                <select class="form-control" id="select" name="type">
                                    <option>Select Type</option>
                                    <option value="0">Featured</option>
                                    <option value="1">General</option>
                                </select>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </div>
                </table>
            </form>


          </div>
          <!-- /.container-fluid -->



      </div>
      <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <?php include_once 'inc/footer.php'; ?>