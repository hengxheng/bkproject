<?php

class CookingsetController extends Zend_Controller_Action
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
         $products = new Application_Model_DbTable_Cookingset();
         $list = $products -> fetchAll();
         $this -> view -> all = $list;
    }
    public function addAction()
    {
        $form = new Application_Form_Cookingset();
        $form -> submit -> setLabel('Add');
        $this->view->form = $form;        
        
        if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){
              //  $product_id = $form -> getValue('product_id'); 
                $product_category_id = '10';              
                $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $type = $form -> getValue('type');
                $size = $form -> getValue('size');
                $length = $form -> getValue('length');
                $width = $form -> getValue('width');
                $thickness = $form -> getValue('thickness');
                $weight = $form -> getValue('weight');                
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                
                
                $fin = new Application_Model_DbTable_Cookingset();
                $fin -> addProduct($product_category_id, $item_code, $product_name, $type, $images, $size, $length, $width, $thickness, $weight, $price);
                $this -> _helper -> redirector('list');
            }
            else{
                $form->populate($formData);
            }                    
      }
    }

    public function editAction()
    {
        $form = new Application_Form_Cookingset();
        $form -> submit -> setLabel('Update');
        $this->view->form = $form;
        
         if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){                      
                $product_id = $form -> getValue('product_id'); 
                $product_category_id = $form -> getValue('product_category_id');              
                $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $type = $form -> getValue('type');
                $size = $form -> getValue('size');
                $length = $form -> getValue('length');
                $width = $form -> getValue('width');
                $thickness = $form -> getValue('thickness');
                $weight = $form -> getValue('weight');                
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                              
                $product = new Application_Model_DbTable_Cookingset();
                $product -> updateProduct($product_id, $product_category_id, $item_code, $product_name, $type, $images, $size, $length, $width, $thickness, $weight, $price);
                $this -> _helper -> redirector('list');               
            }
            else{
                $form->populate($formData);
            }       
        }
        else{
            $id = $this ->_getParam('id',0);
            if ($id > 0){
                $product = new Application_Model_DbTable_Cookingset();
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
                $product = new Application_Model_DbTable_Cookingset();
                $product -> deleteProduct($id);
            }
            $this -> _helper -> redirector('list');
        }
        else{
            $id = $this ->_getParam('id',0);
            $product = new Application_Model_DbTable_Cookingset();
            $this -> view -> product = $product -> getProduct($id);
        
    }

    } 


}



