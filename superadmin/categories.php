<?php 
	include_once '../classes/Category.php';
    $cat = new Category();
    if (isset($_GET['delcat'])) {
    	$id = $_GET['delcat'];
    	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
    	$delCat = $cat->delCatById($id);
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
            <li class="breadcrumb-item active">Categories</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Categories</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                      $getCat = $cat->getAllCat();
                      if ($getCat) {
                        $i = 0;
                        while ($result = $getCat->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr class="even gradeC">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $result['catName']; ?></td>
                          <td><a class="btn btn-success btn-block" href="catedit.php?catid=<?php echo $result['catId']; ?>">Edit</a> <a class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete !')" href="?delcat=<?php echo $result['catId']; ?>">Delete</a></td>
                        </tr>
                    <?php }	}else{
                      echo "<span style='color:red;'>Category not found !</span>";
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
