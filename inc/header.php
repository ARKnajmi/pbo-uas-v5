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

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $customerReg = $cmr->customerRegistration($_POST, $_FILES);
}

if (isset($customerReg)) {
    echo $customerReg;
}

?>
<?php
$login = Session::get("Custlogin");
if ($login == true) {
    //header("Location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}
?>
<!--Logout Functionality-->
<?php
if (isset($_GET['cmrId'])) {
    Session::destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TokoTo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 mb-5 rounded fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/logo/icons8-shopping-cart-64.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                TokoTo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu">
                            <?php
                            $getCt = $pd->getAllCat();
                            if ($getCt) {
                                while ($result = $getCt->fetch_assoc()) {
                            ?>
                                    <li><a class="dropdown-item" href="productsbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex w-50" action="search.php" method="get" role="search">
                    <div class="input-group w-100 ms-2 me-2">
                        <input class="form-control custom-search-input" type="search" placeholder="Search" name="q" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <?php if ($login == false) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#dd">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav ms-auto">
                        <?php
                        $getPro = $ct->getCartProduct();
                        if ($getPro) {
                            $i = 1;
                            $sum = 0;
                            while ($result = $getPro->fetch_assoc()) {
                                $sum = $sum + $i;
                        ?>
                        <?php }
                        } ?>
                        <li class="nav-item">
                            <a class="nav-link me-2 fw-bold" href="cart.php"> Cart
                                <i class="ms-2 bi bi-cart bold-icon"></i>
                                <?php if (isset($sum)) {
                                    echo $sum;
                                } ?>
                            </a>
                        </li>
                        <hr>        
                        <?php
                        $id = Session::get("cmrId");
                        $getdata = $cmr->getCustomerData($id);
                        if ($getdata) {
                            while ($result = $getdata->fetch_assoc()) {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $result['name']; ?></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="order.php">My Orders</a></li>
                                        <li><a class="dropdown-item" href="?cmrId=<?php echo Session::get('cmrId'); ?>">Logout</a></li>
                                    </ul>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <script src="js/bootstrap.bundle.min.js"></script>