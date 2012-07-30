<?php

class StockupController extends Zend_Controller_Action
{

    public function init()
    {
      
       
    }

    public function indexAction()
    {
        $form = new Application_Form_StockUp();
        $this -> view -> form = $form;
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
            $products_list[$product -> product_id] = $product -> product_name.' ('.$product -> item_code.')';
        } 
        
        $product_form = new Zend_Form_Element_Select('product');
        $product_form -> setLabel('Product')
                 -> addMultiOptions($products_list);
        
        $this -> view -> product_form = $product_form -> __toString();
    }


}



