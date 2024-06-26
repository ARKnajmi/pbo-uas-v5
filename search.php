
  <?php
 	if (!isset($_GET['q']) || $_GET['q'] == NULL) {
        echo "<script>window.location = '404.php';</script>";
 	}else {
 		$search = $_GET['q'];
 	}
  ?>
<?php include_once 'inc/header.php'; ?>


    <!-- Page Content -->
    <div class="container">

       


          <!-- Title -->
          <div class="row text-center">
            <div class="col-lg-12">
                <h3 >Showing Results For:<b>
                    <?php echo $search; ?>
                </b></h3>
            </div>
            
        </div>
        <hr>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

        <?php
				$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' OR body LIKE '%$search%' ";
				$post = $db->select($query);
				if ($post) {
					while ($result = $post->fetch_assoc()) {
			 ?>
       
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="img-thumbnail fimg" src="superadmin/<?php echo $result['image']; ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $result['productName']; ?></h3>
                        <p class="para"><?php echo $fm->textShorten($result['body'],60); ?></p>
                        <p>
                        <input type="button" class="btn btn-danger btn-block view_data" id="<?php echo $result["productId"]; ?>" value="Buy Now!" /> 
                        </p>
                    </div>
                </div>
            </div>
            <?php }	} else { ?>
                <div class="row">
                <div class="col-lg-12">
                    <h3>Sorry! No Results Found.Please Watch Our Other Products <a href="products.php">Here</a></h3>
                    </div>
                </div>
               </div>
            <?php }?>


        </div>
   
       
        <!-- /.row -->
    
        <hr>
<!--Product Modals--->
<div id="dataModal" class="modal fade">  
            <div class="modal-dialog modal-lg">  
                <div class="modal-content">  
                        <div class="modal-header">  
                            <button type="button" class="close" data-dismiss="modal">&times;</button>  
                            <h4 class="modal-title">Product Details</h4>  
                        </div>  
                        <div class="modal-body" id="product_detail">  
                        </div>  
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div>  
                </div>  
            </div>  
        </div> 
        

        
           <!--Product Modals--->
  <?php include_once 'inc/footer.php'; ?>
