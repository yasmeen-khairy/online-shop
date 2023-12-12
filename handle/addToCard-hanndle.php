<?php
session_start();
require_once '../App.php';
require_once '../classes/db-conn.php';


if ($request->hasRequest($request->post('addToCart'))) {

    $quant = $request->post('quant');
    $hidden_image = $request->post('hidden_image');
    $id = $_GET['id'];
    $hidden_name = $request->post('hidden_name');
    $hidden_price = $request->post('hidden_price');
    $hidden_desc = $request->post('hidden_desc');
    
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION['shopping_cart'], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = [
                'id' => $_GET["id"],
                'item_name' => $hidden_name,
                'item_image' => $hidden_image,
                'item_price' => $hidden_price,
                'item_desc' => $hidden_desc,
                'item_quantity' => $quant,
            ];
            $_SESSION["shopping_cart"][$count] = $item_array;
            header("Location: ../cart.php");
        } else {
            $error = 'product exists !';
            header("Location: ../shop.php?error=$error");
            exit();
        }
    } else {
        $item_array = [
            'id' => $_GET["id"],
            'item_name' => $hidden_name,
            'item_image' => $hidden_image,
            'item_price' => $hidden_price,
            'item_desc' => $hidden_desc,
            'item_quantity' => $quant,
        ];
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}





// remove item 

if (isset($_POST['delete'])) {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["shopping_cart"] as $keys => $value) {
                if ($value["id"] == $_GET["id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                }
            }
        }
    }
}
?>