<?php
include_once 'lib/Session.php';
Session::init();

include 'lib/Database.php';
include 'helpers/Format.php';

spl_autoload_register(function ($class) {
    include_once 'classes/' . $class . ".php";
});

$db = new Database();
$fm = new Format();
$pd = new Product();

$cat = new Category();
$ct = new Cart();
$cmr = new Customer();
if (isset($_POST["send_id"])) {

    $login = Session::get("Custlogin");

    $output = '';
    $getFpd = $pd->getSingleProduct($_POST["send_id"]);
    if ($getFpd) {
        while ($result = $getFpd->fetch_assoc()) {

            $output .= '  
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                    <label for="email">Product Name:</label>
                    <input  class="form-control"  disabled value=' . $result["productName"] . '>
                    </div>
                    <div class="form-group">
                        <label for="email">Product Price:</label>
                        <input  class="form-control"  disabled value=Rp.' . $result["price"] . '>
                    </div>
                    <div class="form-grou mb-2">
                        <label for="email">Product Category:</label>
                        <input  class="form-control"  disabled value=' . $result["catName"] . '>
                    </div>
                    '.($login == true ? '
                <form action="buy.php" method="post">
                <div class="form-group">
                <hr>
                <input type="number" class="form-control" name="quantity" value="1"/>
                <input type="hidden"  name="id" value="'.$_POST["send_id"].'"/>
                </div>
                <input type="submit" class="btn btn-danger btn-block mt-2 mb-2" name="submit" value="Buy Now"/>
                </form>	
            
            ' : "Please Login To Buy").'
            </div>  

            <div class="col-md-6">
                <img src="superadmin/' . $result["image"] . '" alt="" class="img-thumbnail">
            </div>  
        </div>
        <div class="row">
            <h5 class="well well-sm mt-2">Product Details</h5> 
            <p class="product_details">' . $result["body"] . '</p>
        </div>';
        }

        echo $output;
    }
}
