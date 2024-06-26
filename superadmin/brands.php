<?php 
	include_once '../classes/Brand.php';
    $brand = new Brand();
    if (isset($_GET['delbrand'])) {
    	$id = $_GET['delbrand'];
    	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
    	$delBrand = $brand->delBrandById($id);
    }
 ?>
<?php include_once 'inc/header.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
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
                    <th>Brand Name</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Serial No.</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
					$getBrand = $brand->getAllBrand();
					if ($getBrand) {
						$i = 0;
						while ($result = $getBrand->fetch_assoc()) {
						$i++;
				 ?>
						<tr class="even gradeC">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a class="btn btn-success btn-block" href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Edit</a>  <a class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete !')" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a></td>
						</tr>
				<?php }	}else{
					echo "<span style='color:red;'>Brand not found !</span>";
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
