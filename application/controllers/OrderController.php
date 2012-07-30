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
    */
    public function newfieldAction() {

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
        
        
//        $element = new Zend_Form_Element_Text("newName".$id);
//        $element->setRequired(true)->setLabel('Name');
      
        
        $content = $category -> __toString().$product_name -> __toString().$quantity -> __toString().$packaging -> __toString();
        $this->view->field = $content;
    }
}



