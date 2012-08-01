<?php

class StockController extends Zend_Controller_Action
{

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


}

