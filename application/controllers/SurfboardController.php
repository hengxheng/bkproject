<?php

class SurfboardController extends Zend_Controller_Action
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
         $products = new Application_Model_DbTable_Surfboard();
         $list = $products -> fetchAll();
         $this -> view -> all = $list;
    }

    public function addAction()
    {
        $form = new Application_Form_Surfboard();
        $form -> submit -> setLabel('Add');
        $this->view->form = $form;
        
//        $surfboardList = new Application_Model_DbTable_Surfboard();
//        $this-> view -> surfboardlist = $surfboardList -> fetchAll();
        
        if ($this -> getRequest()-> isPost()) {
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){
           //     $product_category_id = $form -> getValue('product_category_id');
                $type = $form -> getValue('type');
                $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                $size = $form -> getValue('size');
                $length = $form -> getValue('length');
                $width = $form -> getValue('width');
                $thickness = $form -> getValue('thickness');
                $weight = $form -> getValue('weight');
                $nose = $form -> getValue('nose');
                $tail = $form -> getValue('tail');
                $fin = $form -> getValue('fin');
                $bottom = $form -> getValue('bottom');
                $material = $form -> getValue('material');
                
                $surfboard = new Application_Model_DbTable_Surfboard();
                $surfboard -> addProduct('1', $type, $product_name, $item_code, $price,$images, $size, $length, $width, $thickness, $weight, $nose, $tail, $fin, $bottom, $material);
                  
                $this -> _helper -> redirector('list','surfboard');
                
            }
            else{
                $form->populate($formData);
            }
        }
        
    }

    public function editAction()
    {
        $form = new Application_Form_Surfboard();
        $form -> submit -> setLabel('Update');
        $this->view->form = $form;
        
        if($this -> getRequest()-> isPost()){
            $formData = $this-> getRequest() -> getPost();
            if ($form -> isValid($formData)){
                $product_id = (int)$form -> getValue('product_id');
                $product_category_id = (int)$form -> getValue('product_category_id');
                $type = $form -> getValue('type');
                $product_name = $form -> getValue('product_name');
                $item_code = $form -> getValue('item_code');
                $price = $form -> getValue('price');
                $images = $form -> getValue('images');
                $size = $form -> getValue('size');
                $length = $form -> getValue('length');
                $width = $form -> getValue('width');
                $thickness = $form -> getValue('thickness');
                $weight = $form -> getValue('weight');
                $nose = $form -> getValue('nose');
                $tail = $form -> getValue('tail');
                $fin = $form -> getValue('fin');
                $bottom = $form -> getValue('bottom');
                $material = $form -> getValue('material');
                
                $surfboard = new Application_Model_DbTable_Surfboard();
                $surfboard -> updateProduct($product_id,$product_category_id, $type, $product_name, $item_code, $price,$images, $size, $length, $width, $thickness, $weight, $nose, $tail, $fin, $bottom, $material);
                $this -> _helper -> redirector('list','surfboard');
                
            }
            else{
                $form -> populate($formData);
            }           
        }
        else{
            $id = $this ->_getParam('id',0);
            if ($id > 0){
                $surfboard = new Application_Model_DbTable_Surfboard();
                $form -> populate($surfboard->getProduct($id));
            }
        }

    }

    public function deleteAction()
    {
        if($this -> getRequest() -> isPost()) {
            $del = $this -> getRequest() -> getPost('del');
            if ($del == 'Yes') {
                $id = $this ->_getParam('id');
                $surfboard = new Application_Model_DbTable_Surfboard();
                $surfboard -> deleteProduct($id);
            }
            $this -> _helper -> redirector('list','surfboard');
        }
        else{
            $id = $this ->_getParam('id',0);
            $surfboard  = new Application_Model_DbTable_Surfboard();
            $this -> view -> product = $surfboard -> getProduct($id);
        } 
    }

    public function viewAction()
    {
       $code = $this -> _getParam('code',0);
//       $category = $this -> _getParam('category',0);
       
       $product_db = new Application_Model_DbTable_Surfboard();
       $product = $product_db ->searchProductByCode($code);
       
       $this -> view -> product = $product;
    }


}







