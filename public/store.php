<?php

use App\Inventory;

require __DIR__ . "/../bootstrap.php";


$title = "Sell Page";

$inventory = new Inventory();


if($_SERVER["REQUEST_METHOD"] === "POST"){

    $item = [
        "id" => $_POST["id"],
        "quantity" => $_POST["qty"]
    ];

    $result = $inventory->sell($item);


    require __DIR__ . '/../views/sold.view.php';
    die();
}

$products = $inventory->getAvailableProducts();

require __DIR__ . '/../views/store.view.php';