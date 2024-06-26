<?php


	include_once '../classes/Product.php';
    $pd = new Product();

    include_once '../helpers/Format.php';
    $fm = new Format();

    if (isset($_GET['delpro'])) {
    	$id = $_GET['delpro'];
    	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
    	$delProduct = $pd->delProById($id);
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
            <li class="breadcrumb-item active">Products</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Products</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                        $getPd = $pd->getAllProduct();
                        if ($getPd) {
                          $i = 0;
                          while ($result = $getPd->fetch_assoc()) {
                            $i++;
                      ?>
                          <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><?php echo $result['catName']; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                            <td><?php echo $result['price']; ?></td>
                            <td><img src="<?php echo $result['image']; ?>" alt="" height="60px" width="100px"></td>
                            <td>
                              <?php 
                                if ($result['type'] == 0) {
                                  echo "Featured";
                                }else{
                                  echo "General";
                                }
                              ?>
                            </td>
                            <td><a class="btn btn-success btn-block"href="productedit.php?proid=<?php echo $result['productId']; ?>">Edit</a> <a class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete !')" href="?delpro=<?php echo $result['productId']; ?>">Delete</a></td>
                          </tr>
                      <?php } }else{
                        echo "<span class='error'>Product not found !</span>";
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once 'inc/footer.php'; ?>
