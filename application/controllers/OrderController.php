<?php

class OrderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $form = new Application_Form_Order();
       
        // Form has not been submitted - pass to view and return
    if (!$this->getRequest()->isPost()) {
      $this->view->form = $form;
      return;
    }
 
     // Form has been submitted - run data through preValidation()
    $form->preValidation($_POST);
   
     // If the form doesn't validate, pass to view and return
    if (!$form->isValid($_POST)) {
      $this->view->form = $form;
      return;
    }
   
     // Form is valid
    $this->view->form = $form;
      
    }

    /**
     * Ajax action that returns the dynamic form field
     *
     */
    public function newfieldAction()
    {

        $this -> _helper -> layout() -> disableLayout();

        $id = $this->_getParam('id', null);
        
        
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $category_list = $category_db ->showCategory();
        
        
        $category = new Zend_Form_Element_Select('category_new'.$id);
        $category ->setBelongsTo($id)
                  ->addMultiOptions($category_list)
                  ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element'))));
        
        $product_name = new Zend_Form_Element_Select('product_name_new'.$id);
        $product_name -> setBelongsto($id)
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        $quantity = new Zend_Form_Element_Text('quantity_new'.$id);
        $quantity ->setBelongsTo($id)
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        $packaging = new Zend_Form_Element_Text('packaging_new'.$id);
        $packaging -> setBelongsTo($id)
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        
        $content = $category -> __toString().$product_name -> __toString().$quantity -> __toString().$packaging -> __toString();
        $this->view->field = $content;
    }

    public function addproductAction()
    {
        $this -> _helper -> layout() -> disableLayout();
        $category_id = $this -> _getParam('category',0);
        
          switch ($category_id){
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
                $product_db = new Application_Model_DbTable_Fireplace();
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
 
        $html_content = '';
        foreach ($products as $product){
            $html_content .= '<option value="'.$product -> item_code.'">'.$product -> product_name.'('.$product -> item_code.')</option>';
        } 
        
        $this -> view -> html_content =  $html_content;
    }


}





