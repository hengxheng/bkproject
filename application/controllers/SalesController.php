<?php

class SalesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Sales();
        $this -> view -> form = $form;
        
        if($this -> getRequest() -> isPost()) {
            
            $form -> preValidation($_POST);
            $formData = $this -> getRequest() -> getPost();
            if($form -> isValid($formData)){

                $product_category_id = $form -> getValue("category");
                $item_code = $form -> getValue("product");
                $product_quantity = $form -> getValue("quantity");
                $sales_price = $form -> getValue("price");
                $charged_postage = $form -> getValue("charged_postage");
                $real_postage = $form -> getValue("real_postage");
                $date = $form -> getValue("date");
                $dispatch_date = $form -> getValue("dispatch_date");
                $buyer_id = "1";
                $sales_source = $form -> getValue("source");
                $sales_status = $form -> getValue("status");
                $comment = $form -> getValue("comment");

                $sales = new Application_Model_DbTable_Sales();
                $sales ->addSales($item_code, $product_category_id, $product_quantity, $sales_price, $charged_postage, $date, $dispatch_date, $real_postage, $buyer_id, $sales_source, $sales_status, $comment); 
                $this -> _helper -> redirector("index", "stock");
            }
        }
    }


}

