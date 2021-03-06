<?php

class SalesController extends Zend_Controller_Action
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
        $form = new Application_Form_Sales();
        $this -> view -> form = $form;
        
        if($this -> getRequest() -> isPost()) {
            
            $form -> preValidation($_POST);
            $formData = $this -> getRequest() -> getPost();
            if($form -> isValid($formData)){
            
                $product_category_id = $form -> getValue("category");
                $item_code = $form -> getValue("product");
                $product_quantity = $form -> getValue("product_quantity");
                $sales_price = $form -> getValue("sales_price");
                $charged_postage = $form -> getValue("charged_postage");
                $real_postage = $form -> getValue("real_postage");
                $date = $form -> getValue("date");
                $dispatch_date = $form -> getValue("dispatch_date");
                $sales_source = $form -> getValue("sales_source");
                $sales_status = $form -> getValue("sales_status");
                $comment = $form -> getValue("comment");
                
                $buyer_db = new Application_Model_DbTable_Customers();
                $buyer_name = $form -> getValue("name");
                $buyer_postcode = $form -> getValue("postcode");
                $buyer_contact = $form -> getValue("contact");
                $buyer_id = $buyer_db -> add($buyer_name, $buyer_postcode, $buyer_contact);

                $sales = new Application_Model_DbTable_Sales();
                $sales ->addSales($item_code, $product_category_id, $product_quantity, $sales_price, $charged_postage, $date, $dispatch_date, $real_postage, $buyer_id, $sales_source, $sales_status, $comment); 
                $this -> _helper -> redirector("history");
            }
        } 
    }

    public function historyAction()
    {
          $sales = new Application_Model_DbTable_Sales();
          $sales_history = $sales ->viewHistory();         
          $this -> view -> history = $sales_history;
          
    }

    public function updateAction()
    {
        $form = new Application_Form_Sales();
        $form -> submit -> setLabel('Update');
        $this->view->form = $form;
        
         if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){  
                $id = $form -> getValue("id");
                $product_category_id = $form -> getValue("product_category_id");
                $item_code = $form -> getValue("product");
                $product_quantity = $form -> getValue("product_quantity");
                $sales_price = $form -> getValue("sales_price");
                $charged_postage = $form -> getValue("charged_postage");
                $real_postage = $form -> getValue("real_postage");
                $date = $form -> getValue("date");
                $dispatch_date = $form -> getValue("dispatch_date");
                $buyer_id = "1";
                $sales_source = $form -> getValue("sales_source");
                $sales_status = $form -> getValue("sales_status");
                $comment = $form -> getValue("comment");
                              
                $product = new Application_Model_DbTable_Sales();
                $product -> updateSales($id, $item_code, $product_category_id, $product_quantity, $sales_price, $charged_postage, $date, $dispatch_date, $real_postage, $buyer_id, $sales_source, $sales_status, $comment);
                $this -> _helper -> redirector('history');               
            }
            else{
                $form->populate($formData);
            }       
        }
        else{
            $id = $this ->_getParam('id',0);
            if ($id > 0){
                $sales = new Application_Model_DbTable_Sales();
                $form -> populate($sales->getSales($id));               
            }             
      } 
    }

    public function viewAction()
    {
        $id = $this ->_getParam("id",0);
        $sales_db  = new Application_Model_DbTable_Sales();
        $sales = $sales_db ->getSales($id);
        
        $this -> view -> item = $sales;
        
    }


}







