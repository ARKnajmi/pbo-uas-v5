<?php include_once 'inc/header.php'; ?>


<!-- Page Content -->
<div class="container">
    <!-- Title -->
    <div class="row text-center mt-3">
        <div class="col-lg-12 mb-3">
            <h3>All Products </h3>
        </div>

    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">
        <?php
        $getFpd = $pd->getAllProduct();
        if ($getFpd) {
            while ($result = $getFpd->fetch_assoc()) {
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
        <?php }
        } ?>


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