<?php

require __DIR__ . "/../bootstrap.php";

use App\Inventory;

function getSum($products, $key)
{
    return array_sum(array_map(function ($product) use ($key) {
        return $product[$key] * $product["no_of_items"];
    }, $products));
}

$title = "All Goods and their Costs.";

$inventory = new Inventory();

$products = $inventory->getProducts();

$totalCost = getSum($products, 'cost');
$totalPrice = getSum($products, 'price');
$percentageProfit = formatNumber((($totalPrice - $totalCost)/$totalCost) * 100);

$colors = [];
for($i = 0; $i < count($products); $i++ ) {
    array_push($colors, randColor());
}

$chart = json_encode([
    'data' => array_map(function ($product){
        return $product["no_of_items"];
    }, $products),
    'labels' => array_map(function ($product){
        return $product["name"];
    }, $products),
    'colors' => $colors
]);

require __DIR__ . '/../views/all.view.php';