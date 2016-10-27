<?php
/**
 * Created by PhpStorm.
 * User: dammy
 * Date: 10/20/16
 * Time: 2:45 PM
 */

namespace App;


class InventoryDBRepository
{
    protected $db;

    function __construct()
    {
        $this->db = new DB();
    }

    public function addProduct(array $product)
    {
        $data = [
            'name' => $product["productName"],
            'no_of_items' => intval($product["noOfItems"]),
            'price' => floatval($product["productPrice"]),
            'cost' => floatval($product["productCost"]),
            'description' => $product["productDesc"],
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->db->createData('products', $data);

        return true;

    }

    public function getAllProducts()
    {
        return $this->db->getAllData('products');
    }

    public function getAllSoldProducts()
    {
        return $this->db->getAllDataInnerJoin(
            'products', 'sales',
            'products.id = sales.product_id',
            ["*", "sales.quantity", "sales.created_at as sold_at"]
        );
    }

    public function getProductsBySale()
    {
        return $this->db->getAllDataInnerJoinGroupBy(
            'products', 'sales',
            'products.id = sales.product_id',
            [ "products.name", "sum(sales.quantity) as quantity"],
            'products.name'
        );
    }

    public function getSoldProductsByDate()
    {
        return $this->db->getAllDataInnerJoinWhereGroupBy(
            'products', 'sales',
            'products.id = sales.product_id',
            [ "sum(sales.quantity) as quantity", "DATE_FORMAT(sales.created_at,'%W') as sold_on"],
            'sales.created_at >= DATE(DATE_SUB(NOW(), INTERVAL 6 DAY))',
            'sold_on'
        );
    }


    public function getAllAvailableProducts()
    {
        return $this->db->getAllDataWhere('products', "no_of_items > 0");
    }


    public function sellItem($item)
    {
        $data = [
            'product_id' => $item["id"],
            'quantity' => intval($item["quantity"]),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->db->createData('sales', $data);

        $product = $this->db->getAllDataWhere('products', "id=". $item["id"] . " LIMIT 1");

        $newStock = intval($product["no_of_items"]) - intval($item['quantity']);

        $this->db->updateData('products', $item['id'], [
            'no_of_items' => $newStock
        ]);

        $product["no_of_items"] = $newStock;

        $product["total"] = $item['quantity'] * $product['price'];

        $product["quantity"] = $item['quantity'];

        unset($product['id']);
        unset($product['no_of_items']);
        unset($product['cost']);

        return $product;
    }
}