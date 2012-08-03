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


}

