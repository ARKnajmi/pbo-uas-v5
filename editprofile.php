<?php 
include_once 'lib/Session.php';
Session::init();
$login = Session::get("Custlogin");
if ($login == false) {
    header("Location:index.php");
}
?>
<?php include_once 'inc/header.php'; ?>

<?php 
	

	$cmrId = Session::get("cmrId");
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
    }
?>

        <!-- Page Features -->
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php 
                $id = Session::get("cmrId");
                $getdata = $cmr->getCustomerData($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-header text-center">
                    <h2>Update Profile Details</h2>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($updateCmr)) { 
                    ?>
                    <div class="alert alert-success">
                        <?php echo $updateCmr; ?>
                    </div>
                    <?php } ?>

                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $result['phone']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $result['email']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $result['address']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $result['city']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="zip">Zipcode</label>
                            <input type="text" name="zip" class="form-control" value="<?php echo $result['zip']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" value="<?php echo $result['country']; ?>">
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            <?php 
                    } 
                } 
            ?>
        </div>
    </div>
</div>
        <!-- /.row -->
<hr>
<?php include_once 'inc/footer.php'; ?>
