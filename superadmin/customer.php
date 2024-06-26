<?php
    
    
    include_once '../classes/Customer.php';
    include_once '../classes/Cart.php';

    if (!isset($_GET['custID']) || $_GET['orderID'] == NULL) {
        echo "<script>window.location = 'orders.php';</script>";
    }else{
        $custID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['custID']);
        $orderID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['orderID']);

        $cus = new Customer;
        $ct = new Cart();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $status = $_POST['status'];

        $updateStatus = $ct->orderUpdate($custID,$orderID,$status);
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
            <li class="breadcrumb-item active">Order #<?php echo $orderID; ?></li>
          </ol>
            <?php  if (isset($updateStatus)) {   ?>
                <?php if($status){ ?>
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Product Is Delivered.
                    </div>

                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Order Is Kept Pending.
                    </div>
                <?php } ?>
            <?php }?>
    
            <div class="row">
                
                <div class="col-sm-6 " style="background-color:#FFFFFF;">
                  <?php 
                    

                    $customer_details = $cus->CustomerDetails($custID);
                    if ($customer_details) {
                        while ($result = $customer_details->fetch_assoc()) {
                    ?>

                    <div class="form-group">
                        <label >Name:</label>
                        <input  class="form-control" id="email" value="<?php echo $result['name']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label >Address:</label>
                        <input  class="form-control" id="email" value="<?php echo $result['address']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label >Phone:</label>
                        <input  class="form-control" id="email" value="<?php echo $result['phone']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label >Email:</label>
                        <input  class="form-control" id="email" value="<?php echo $result['email']; ?>" disabled>
                    </div>
                

                     <?php } }else{
                        echo "<span style='color:red;'>Customer Not Found !</span>";
                    } 
                    ?>
                     <?php 
           

                        $order_details = $ct->OrderDetails($custID,$orderID);
                        if ($order_details) {
                            while ($result2 = $order_details->fetch_assoc()) {
                                $status = $result2['status'];
                        ?>
                        
                              

                        <div class="form-group">
                            <label >Order Status:</label>
                            <?php if ($result2['status'] == 0) { ?>
                             <input style="color:#FF0000;" class="form-control" id="email" value="Pending" disabled>
                            <?php }else{ ?>
                             <input style="color:#87C540;" class="form-control" id="email" value="Delivered" disabled>
                            <?php } ?>	

                        </div>
                     <?php } }else{
                        echo "<span style='color:red;'>Customer Not Found !</span>";
                    } ?>
              
                </div>
                <div class="col-sm-6" style="background-color:#E9ECEF;">

                        <?php 
                        

                        $order_details = $ct->OrderDetails($custID,$orderID);
                        if ($order_details) {
                            while ($result2 = $order_details->fetch_assoc()) {
                                $status = $result2['status'];
                        ?>
                         <div class="form-group">
                            <label >Product ID:</label>
                            <input style="background-color:#FFFFFF;" class="form-control" id="email" value="<?php echo $result2['productId']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label >Product Name:</label>
                            <input style="background-color:#FFFFFF;" class="form-control" id="email" value="<?php echo $result2['productName']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label >Quantity:</label>
                            <input style="background-color:#FFFFFF;" class="form-control" id="email" value="<?php echo $result2['quantity']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label >Price:</label>
                            <input style="background-color:#FFFFFF;" class="form-control" id="email" value="<?php echo $result2['price']; ?>" disabled>
                        </div>
                        <div class="form-group">
                           
                            <form action="" method="post">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="radio">
                                        <label><input type="radio" name="status" <?php if($status==0){ echo "checked";} ?> value="0">Pending</label>
                                   
                                    
                                        <label><input type="radio" name="status" <?php if($status==1){ echo "checked";} ?> value="1">Delivered</label>
                                    </div>
                                </div>
                          
                                   
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                
                                </div>
                                
                            </form>

                          </div>
                        
                   

                     <?php } }else{
                        echo "<span style='color:red;'>Customer Not Found !</span>";
                    } ?>

                </div>
            </div>

         

        

        </div>
        
        <!-- /.container-fluid -->

        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php include_once 'inc/footer.php'; ?>
