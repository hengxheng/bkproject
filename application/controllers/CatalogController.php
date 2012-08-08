<?php

class CatalogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $categories = $category_db -> fetchAll();
        $this -> view -> categories =  $categories;
        $subcategories = $category_db -> fetchAll();
        $this -> view -> subcategories = $subcategories;
       
    }

    public function addcategoryAction()
    {
        $form = new Application_Form_Categories();
         $form -> submit -> setLabel("Create");
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

    public function editcategoryAction()
    {
        $form = new Application_Form_Categories();
        if ($this ->getRequest() -> isPost()){
            if ($this -> _request -> getPost('submit') == 'Update'){
                $formData = $this -> getRequest() -> getPost();
                if ($form ->isValid($formData)){
                    $product_category_id = $form -> getValue('product_category_id');
                    $parent_id = $form -> getValue('parent_id');
                    $category_name = $form -> getValue('category_name');
                    
                    $category_db = new Application_Model_DbTable_ProductsCategory();
                    $category_db -> updateCategory($product_category_id, $parent_id, $category_name);                 
                }
                $this -> _helper -> redirector('index');
            }
            
            if ($this -> _request -> getPost('delete') == 'Delete'){
                $formData = $this -> getRequest() -> getPost();
                if ($form ->isValid($formData)){
                   $id = $form -> getValue('product_category_id');
                 }
                $category_db = new Application_Model_DbTable_ProductsCategory();
                $category_db ->deleteCategory($id);
                $this -> _helper -> redirector('index');
            }
        }
        else {
           
            $form -> submit -> setLabel("Update");
            $form ->addElement('submit','delete',array(
            'label' => 'Delete',
            'order' => 15,
            ));

            $id = $this -> _getParam('id');
            $categories = new Application_Model_DbTable_ProductsCategory();
            $category = $categories ->getCategory($id);
            $form -> populate($category);

            $this -> view -> form = $form;
        }
        
    }

    public function addproductAction()
    {
        // action body
    }


}







