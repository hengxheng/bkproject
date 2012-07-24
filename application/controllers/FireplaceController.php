<?php

class FireplaceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $products = new Application_Model_DbTable_Fireplace();
         $list = $products -> fetchAll();
         $this -> view -> list = $list;
    }

    public function addAction()
    {
        $form = new Application_Form_Fireplace();
        $form -> submit -> setLabel('Add');
        $this->view->form = $form;        
        
        if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){
                $product_category_id = '5';
                $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $size = $form -> getValue('size');
                $color = $form -> getValue('color');
                $weight = $form -> getValue('weight');                
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                
                
                $product = new Application_Model_DbTable_Fireplace();
                $product -> addProduct( $product_category_id, $item_code, $product_name,  $images, $size, $weight, $color, $price);
                $this -> _helper -> redirector('list');
            }
            else{
                $form->populate($formData);
            }                    
      }
    }

    public function editAction()
    {
        $form = new Application_Form_Fireplace();
        $form -> submit -> setLabel('Update');
        $this->view->form = $form;
        
         if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){                      
                $product_id = $form -> getValue('product_id'); 
                $product_category_id = $form -> getValue('product_category_id');              
                 $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $size = $form -> getValue('size');
                $color = $form -> getValue('color');
                $weight = $form -> getValue('weight');                
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                              
                $product = new Application_Model_DbTable_Fireplace();
                $product -> updateProduct($product_id, $product_category_id, $item_code, $product_name,  $images, $size, $weight, $color, $price);
                $this -> _helper -> redirector('list');               
            }
            else{
                $form->populate($formData);
            }       
        }
        else{
            $id = $this ->_getParam('id',0);
            if ($id > 0){
                $product = new Application_Model_DbTable_Fireplace();
                $form -> populate($product->getProduct($id));               
            }             
      } 
    }

    public function deleteAction()
    {
          if($this -> getRequest() -> isPost()) {
            $del = $this -> getRequest() -> getPost('del');
            if ($del == 'Yes') {
                $id = $this ->_getParam('id');
                $product = new Application_Model_DbTable_Fireplace();
                $product -> deleteProduct($id);
            }
            $this -> _helper -> redirector('list');
        }
        else{
            $id = $this ->_getParam('id',0);
            $product = new Application_Model_DbTable_Fireplace();
            $this -> view -> product = $product -> getProduct($id);
        }
    }


}









