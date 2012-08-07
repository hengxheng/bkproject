<?php

class CatalogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function categoryAction()
    {
        $form = new Application_Form_Categories();
        $this -> view -> form = $form;
        
        if ($this ->getRequest() -> isPost()) {
            $formData = $this -> getRequest() -> getPost();
            if ($form -> isValid($formData)){
                $category_name = $form -> getValue('category_name');
                $parent_id = $form -> getValue('parent_id');
                
                $category_db = new Application_Model_DbTable_ProductsCategory();
                $category_db ->addCategory($parent_id, $category_name);
                
                $this -> _helper -> redirector('index');
            }
        }
    }


}



