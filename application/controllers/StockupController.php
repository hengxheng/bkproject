<?php

class StockupController extends Zend_Controller_Action
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
      
       
    }

    public function indexAction()
    {
         
        $form = new Application_Form_Stockup();
        $this -> view -> form = $form;
                
        if($this -> getRequest() -> isPost()) {
            
            $form -> preValidation($_POST);
              $formData = $this -> getRequest() -> getPost();
        if($form -> isValid($formData)){
            $supplier_id = $form -> getValue("supplier");
            $product_category_id = $form -> getValue("category");
            $item_code = $form -> getValue("product");
            $product_quantity = $form -> getValue("quantity");
            $stockup_date = $form -> getValue("order_date");
  //          $supply_order_id = "1";
            
            $stock = new Application_Model_DbTable_Stockup();
            $stock ->stockUp($supplier_id, $item_code, $product_category_id, $product_quantity, $stockup_date); 
            $this -> _helper -> redirector("index","stock");
        }
        }

    }

    public function productAction()
    {
        $this -> _helper -> layout() -> disableLayout();
        
        $id = $this ->_getParam('id',0);
      
        $product_db = new Application_Model_DbTable_Products();
        $products = $product_db ->getProductByCategory($id);       
       
        $products_list = array();
        foreach ($products as $product){
            $product_code = $product['product_code'];
            $product_name = $product['product_name'];
            $products_list[$product_code] = $product_name.' ('.$product_code.')';
        } 
        
        $product_form = new Zend_Form_Element_Select('product');
        $product_form //-> setLabel('Product')
                 -> addMultiOptions($products_list);
        
        $this -> view -> product_form = $product_form -> __toString();
    }


}



