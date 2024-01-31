<?php
date_default_timezone_set("America/Port-Au-Prince");

require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";

use src\dao\Dao;

$newdao = new Dao;
$answer = [];

if (!empty($_SESSION['add_to_cart'])) {
    $itemIds = implode(" ,", $_SESSION['item_ids']);
    $itemQties = implode(" ,", $_SESSION['item_qties']);
    $itemPrices = implode(" ,", $_SESSION['item_prices']);
    $total = $_SESSION['total'];
    $orderDate = date("d, M Y - h:i:s a");

    $newdao = new Dao;

    if ($newdao->addOrder($itemIds, $itemPrices, $itemQties, $total, $orderDate)) {
        echo "<script>window.onload = function() {subOrderSucc();}</script>";
        // Clear session data if needed
        // $_SESSION['item_ids'] = array();
        // $_SESSION['item_qties'] = array();
        // $_SESSION['item_prices'] = array();
    } else {
        echo "<script>window.onload = function() {subOrderErr();} </script>";
    }
} 


?>
<script>
    function subOrderSucc() {
        Swal.fire({
            title: 'Submitting Order',
            text: 'Order Submitted Successfully',
            icon: 'success',
            showConfirmButton: false,
            showCancelButton: false,
            timer: 3000
        }).then(function() {
            window.location = "invoice.php";
        });
    }

    function subOrderErr() {
        Swal.fire({
            title: 'Submitting Order',
            text: 'Order did not submit successfully',
            icon: 'error',
            showConfirmButton: false,
            showCancelButton: false,
            timer: 5000
        }).then(function() {
            window.location = "http://localhost/eCommerce/view/admin/cart.php";
        });
    }
</script>