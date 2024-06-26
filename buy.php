<?php include_once 'lib/Session.php';
    Session::init();

    include 'lib/Database.php';
    include 'helpers/Format.php';

    spl_autoload_register(function($class){
    	include_once 'classes/'.$class.".php";
    });

    $db = new Database();
    $fm = new Format();
    $pd = new Product();
   
    $cat = new Category();
    $ct = new Cart();
    $cmr = new Customer();
    $login = Session::get("Custlogin");
    if ($login == true) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $quantity = $_POST['quantity'];
             $id = $_POST['id'];
            $addCart = $ct->addToCart($quantity, $id);
        }
    }else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['submit'] == true){
                echo "For buy any product you have to login first !";
            }
        }
    }
    ?>