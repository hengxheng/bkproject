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
        
        $product_form = new Zend_Form();
        $product_form -> addElement("select", "category_".$id);
        
        $product_form -> addElement("select","product_name_".$id)

        $element = new Zend_Form_Element_Text("newName".$id);
        $element->setRequired(true)->setLabel('Name');

        $this->view->field = $element->__toString();
    }
}



