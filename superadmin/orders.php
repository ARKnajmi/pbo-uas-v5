<?php 

include_once '../classes/Cart.php';
$ct = new Cart();

?>
<?php include_once 'inc/header.php'; ?>


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Orders</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Order ID.</th>
                        <th>Order Date & Time</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Order ID.</th>
                        <th>Order Date & Time</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php $getOrder = $ct->getAllOrderedProduct(); 
                            if ($getOrder) {
                          
                            while ($result = $getOrder->fetch_assoc()) {
                                   
                        ?>
                        <tr class="odd gradeC">
                        <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['date']; ?></td>
                        <td><?php echo $result['cmrId']; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php echo $result['quantity']; ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <td>
                            <?php 
                                if ($result['status'] == 0) {
                                    echo "<span style='color:red'>Pending</span>";
                                }else{
                                    echo "<span style='color:green'>Delivered</span>";
                                }
                            ?>
                        </td>
                        <td><a class="btn btn-success btn-block" href="customer.php?custID=<?php echo $result['cmrId']; ?>&orderID=<?php echo $result['id']; ?>">View</a></td>

                        
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
 <script>
$(document).ready(function() {
    $('#dataTable2').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>