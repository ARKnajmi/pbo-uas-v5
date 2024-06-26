<?php 
	if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script>window.location = '404.php';</script>";
    }else{
        $catid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
    }
 ?>
<?php include_once 'inc/header.php'; ?>


    <!-- Page Content -->
    <div class="container">

       


          <!-- Title -->
          <div class="row text-center">
            <div class="col-lg-12 mb-3 mt-3">
                <h3 >Showing Products Under Category:<b>

                 <?php 
                
                    $catname = $pd->getCAtName($catid);
                    if ($catname) {
                        while ($result = $catname->fetch_assoc()) {
                ?>
                <?php echo $result['catName']; ?>
                <?php }	} ?>
                </b></h3>
            </div>
            
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
        <?php 
			$productbycat = $pd->productByCat($catid);
			if ($productbycat) {
				while ($result = $productbycat->fetch_assoc()) {
		 ?>
            <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top img-thumbnail fimg" src="superadmin/<?php echo $result['image']; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                            <p class="card-text para"><?php echo $fm->textShorten($result['body'], 60); ?></p>
                        </div>
                        <div class="card-footer">
                            <input type="button" class="btn btn-danger btn-block view_data" id="<?php echo $result["productId"]; ?>" value="Buy Now!" />
                        </div>
                    </div>
                </div>
            <?php }	} ?>


        </div>
   
       
        <!-- /.row -->
    
        <hr>
<!--Product Modals--->
<div id="dataModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="product_detail">
                </div>
            </div>
        </div>
    </div>

        
           <!--Product Modals--->
  <?php include_once 'inc/footer.php'; ?>
