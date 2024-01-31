<?php
session_start();

if (isset($_POST['itmID']) && isset($_POST['itmQty'])) {
    $itmID = $_POST['itmID'];
    $itmQty = $_POST['itmQty'];

    if (!empty($_SESSION['add_to_cart'])) {
        foreach ($_SESSION['add_to_cart'] as $key => $value) {
            if ($itmID == $key) {
                if ($_SESSION['add_to_cart'][$key]['quantity'] != $itmQty) {
                    $_SESSION['add_to_cart'][$key]['quantity'] = $itmQty;
                }
            }
        }
    }
}
