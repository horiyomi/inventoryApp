<?php

require __DIR__ . "/../bootstrap.php";

use App\Inventory;

$title = "Homepage";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $productName = $_POST["product_name"];
    $productPrice = $_POST["product_price"];
    $productCost = $_POST["product_cost"];
    $productDesc = $_POST["product_desc"];
    $noOfItems = $_POST["no_of_items"];

    $product = compact('productName', 'productPrice', 'productCost', 'productDesc', 'noOfItems');

    $inventory = new Inventory();

    $result = $inventory->add($product);
}

require __DIR__ . '/../views/index.view.php';