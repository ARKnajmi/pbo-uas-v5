<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../../lib/Database.php');
    $obj =new Database();  
    
    $query = "SELECT count(id) as 'count' FROM tbl_order  ";
    $result = $obj->select($query);
    $row = $result->fetch_object();
    $order_count = $row->count;

    $query2 = "SELECT count(productId) as 'productId' FROM tbl_product  ";
    $result2 = $obj->select($query2);
    $row2 = $result2->fetch_object();
    $product_count = $row2->productId;


    $query3 = "SELECT count(brandId) as 'brand' FROM tbl_brand  ";
    $result3 = $obj->select($query3);
    $row3 = $result3->fetch_object();
    $brand_count = $row3->brand;

    $query4 = "SELECT count(catId) as 'category' FROM tbl_category  ";
    $result4 = $obj->select($query4);
    $row4 = $result4->fetch_object();
    $category_count = $row4->category;


    
    
    
    
?>