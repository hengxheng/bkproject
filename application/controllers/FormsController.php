<?php

class FormsController extends Zend_Controller_Action
{

    public function init()
    {
     
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function dynamicAction()
    {
        $form = new Application_Form_Dynamic();

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

    public function newfieldAction()
    {
         
  $this -> _helper -> layout() -> disableLayout();
         
    $id = $this->_getParam('id', null);
    
    $element = new Zend_Form_Element_Text("newName$id");
    $element->setRequired(true)->setLabel('Name');
    
    $this->view->field = $element->__toString();
    }


}





