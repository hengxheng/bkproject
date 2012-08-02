<?php

class StockupController extends Zend_Controller_Action
{

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
            $supply_order_id = "1";
            
            $stock = new Application_Model_DbTable_Stockup();
            $stock ->stockUp($supplier_id, $item_code, $product_category_id, $product_quantity, $stockup_date, $supply_order_id); 
            $this -> _helper -> redirector("index","stock");
        }
        }

    }

    public function productAction()
    {
        $this -> _helper -> layout() -> disableLayout();
        
        $id = $this ->_getParam('id',0);
      
          switch ($id){
            case 1:              
                $product_db = new Application_Model_DbTable_Surfboard();
                break;
            case 2:
                $product_db = new Application_Model_DbTable_Fin();
                break;
            case 3:
                $product_db = new Application_Model_DbTable_Wetsuit();
                break;
            case 4:
                $product_db = new Application_Model_DbTable_Cover();
                break;
            case 5: 
                $product_db = new Application_Model_DbTable_Cookingset();
                break;
            case 6:
                $product_db = new Application_Model_DbTable_Tent();
                break;
            case 7:
                $product_db = new Application_Model_DbTable_FoldedTable();
                break;
            case 8:
                $product_db = new Application_Model_DbTable_Umbrela();
                break;
            case 9:
                $product_db = new Application_Model_DbTable_Sleepingbag();
                break;
            case 10:
                $product_db = new Application_Model_DbTable_Cookingset();
                break;
            default:
             
        }
        
       
        $products = $product_db ->fetchAll();
        $products_list = array();
        foreach ($products as $product){
            $products_list[$product -> item_code] = $product -> product_name.' ('.$product -> item_code.')';
        } 
        
        $product_form = new Zend_Form_Element_Select('product');
        $product_form -> setLabel('Product')
                 -> addMultiOptions($products_list);
        
        $this -> view -> product_form = $product_form -> __toString();
    }


}



