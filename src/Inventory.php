<?php

namespace App;


class Inventory
{
    protected $dbRepository;

    /**
     * Inventory constructor.
     */
    function __construct()
    {
        $this->dbRepository = new InventoryDBRepository();
    }

    /**
     * @param array $product
     * @return string
     */
    public function add(array $product)
    {
        try {

            $this->dbRepository->addProduct($product);

            return true;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function getProducts()
    {
        return $this->dbRepository->getAllProducts();
    }

    public function getSoldProducts()
    {
        return $this->dbRepository->getAllSoldProducts();
    }


    public function getSoldProductsGrouped()
    {
        return $this->dbRepository->getProductsBySale();
    }

    public function getSoldProductsOnDate()
    {
        return $this->dbRepository->getSoldProductsByDate();
    }

    public function getAvailableProducts()
    {
        return $this->dbRepository->getAllAvailableProducts();
    }

    public function sell($item) {

        return $this->dbRepository->sellItem($item);
    }
}