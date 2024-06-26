<?php
include_once 'lib/Session.php';
Session::init();
$login = Session::get("Custlogin");
if ($login == false) {
    header("Location: index.php");
}
?>
<?php include_once 'inc/header.php'; ?>
<?php

if (isset($_GET['delpro'])) {
    $delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
    $delProduct = $ct->delProductByCart($delId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId, $quantity);
    if ($quantity <= 0) {
        $delProduct = $ct->delProductByCart($cartId);
    }
}

if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}
?>

<!-- Page Content -->
<div class="container">
    <!-- Title -->
    <div class="row text-center">
        <div class="col-lg-12">
            <h3>Your Orders:<b>
                </b></h3>
            <?php
            if (isset($updateCart)) {
                echo $updateCart;
            }

            if (isset($delProduct)) {
                echo $delProduct;
            }
            ?>
            <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Product Name</th>
                    <th width="10%">Image</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Date</th>
                    <th width="15%">Status</th>
                    <th width="10%">Action</th>
                </tr>
                <?php
                $cmrId = Session::get("cmrId");
                $getOrder = $ct->getOrderProduct($cmrId);
                if ($getOrder) {
                    $i = 0;
                    while ($result = $getOrder->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><img class="img-thumbnail" src="superadmin/<?php echo $result['image']; ?>" alt="" /></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td>Rp.<?php echo $result['price']; ?></td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td><?php
                                if ($result['status'] == '0') {
                                    echo "<span style='color:red'>Pending</span>";
                                } else {
                                    echo "<span style='color:green'>Delivered</span>";
                                }
                                ?></td>
                            <td>
                                <a class="btn btn-success btn-block" href="success.php?orderId=<?php echo $result['id']; ?>">Invoice</a>
                            </td>
                    <?php }
                } ?>
            </table>
            </div>
        </div>
    </div>
    <hr>

    <?php include_once 'inc/footer.php'; ?>