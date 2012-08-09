<?php

class StockController extends Zend_Controller_Action
{

    function preDispatch()
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_helper -> redirector('index','login');
        }
    }

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       
        $stock_records = new Application_Model_DbTable_Stock();
        
        $stocks = $stock_records ->allStock();
        
        $this -> view -> stocks = $stocks;
    }
    
    public function viewstockAction()
    {
       $code = $this -> _getParam('code',0);

       $product_db = new Application_Model_DbTable_Products();
       $product = $product_db ->getProductByCode($code);
       
       $stock_db = new Application_Model_DbTable_Stock();
       $stock = $stock_db ->getStock($product['product_code']);
       
       $category_db = new Application_Model_DbTable_ProductsCategory();
       $category = $category_db -> getCategoryName($product['category_id']);
       
       $supplier_db = new Application_Model_DbTable_Supplier();
       $supplier = $supplier_db -> getSupplier($product['supplier']);
       
       $this -> view -> quantity = $stock[0]['product_quantity'];
       $this -> view -> product = $product;
        $this -> view -> category = $category;
       $this -> view -> supplier = $supplier['supplier_name'];
    }


}

