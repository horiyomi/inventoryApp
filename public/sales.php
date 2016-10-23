<?php

require __DIR__ . "/../bootstrap.php";

use App\Inventory;

/**
 * @param $products
 * @return number
 */
function getSum($products, $key)
{
    return array_sum(array_map(function ($product) use ($key)  {
        return $product['quantity'] * $product[$key];
    }, $products));
}

$title = "Sales Page";

$inventory = new Inventory();

$products = $inventory->getSoldProducts();

$salesCount = $inventory->getSoldProductsGrouped();

$salesDate = $inventory->getSoldProductsOnDate();

$totalMade = getSum($products, 'price');

$totalCost = getSum($products, 'cost');
$percentageProfit = formatNumber((($totalMade - $totalCost)/$totalCost) * 100);

$colors = [];
for($i = 0; $i < count($products); $i++ ) {
    array_push($colors, randColor());
}

$daycolors = [];
for($i = 0; $i < count($products); $i++ ) {
    array_push($daycolors, randColor());
}

$chart = json_encode([
    'data' => array_map(function ($product){
        return $product["quantity"];
    }, $salesCount),
    'labels' => array_map(function ($product){
        return $product["name"];
    }, $salesCount),
    'colors' => $colors
]);

$daysChart = json_encode([
    'data' => array_map(function ($product){
        return $product["quantity"];
    }, $salesDate),
    'labels' => array_map(function ($product){
        return $product["sold_on"];
    }, $salesDate),
    'colors' => $daycolors
]);


require __DIR__ . '/../views/sales.view.php';