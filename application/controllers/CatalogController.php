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
        $form = new Application_Form_Products();
        $form -> submit -> setLabel("Add");
        $this -> view -> form = $form;
        
        if ($this -> getRequest() -> isPost()){
            $formData = $this -> getRequest() -> getPost();
            if ($form -> isValid($formData)){
//                $product_id = $form -> getValue('product_id');
                $category_id = $form -> getValue('category_id');
                $product_name = $form -> getValue('product_name');
                $product_code = $form -> getValue('product_code');
                $product_size = $form -> getValue('product_size');
                $product_weight = $form -> getValue('product_weight');
                $product_images = $form -> getValue('product_images');
                $product_price = $form -> getValue('product_price');
                $product_cost = $form -> getValue('product_cost');
                $supplier = $form -> getValue('supplier');
                $description = $form -> getValue('description');
                
                $products_db = new Application_Model_DbTable_Products();
                $products_db ->addProduct($category_id, $product_name, $product_code, $product_size, $product_weight, $product_images, $product_price, $product_cost, $supplier, $description);               
           
                $this -> _helper -> redirector('listproduct'); 
           }
        }
    }

    public function editproductAction()
    {
            $form = new Application_Form_Products();
            $form -> submit -> setLabel("Update");
            $this -> view -> form = $form;
            
            if ($this -> getRequest() -> isPost()){
            $formData = $this -> getRequest() -> getPost();
                if ($form -> isValid($formData)){
                    $product_id = $form -> getValue('product_id');
                    $category_id = $form -> getValue('category_id');
                    $product_name = $form -> getValue('product_name');
                    $product_code = $form -> getValue('product_code');
                    $product_size = $form -> getValue('product_size');
                    $product_weight = $form -> getValue('product_weight');
                    $product_images = $form -> getValue('product_images');
                    $product_price = $form -> getValue('product_price');
                    $product_cost = $form -> getValue('product_cost');
                    $supplier = $form -> getValue('supplier');
                    $description = $form -> getValue('description');

                    
                    $products_db = new Application_Model_DbTable_Products();
                    if ($product_images != ''){
                    $products_db -> updateProduct($product_id, $category_id, $product_name, $product_code, $product_size, $product_weight, $product_images, $product_price, $product_cost, $supplier, $description);               
                    }
                    else {
                    $products_db ->updateProductNoImage($product_id, $category_id, $product_name, $product_code, $product_size, $product_weight, $product_price, $product_cost, $supplier, $description);
                    }
                    $this -> _helper -> redirector('listproduct'); 
                 }
                 else {
                     $form -> populate($formData);
                 }
           }
           else {
               $product_id = $this -> _getParam('product_id',0);
               if ($product_id > 0){
                   $products_db = new Application_Model_DbTable_Products();
                   $form -> populate($products_db->getProduct($product_id));
               }
           }
    }

    public function deleteproductAction()
    {
        if($this -> getRequest() -> isPost()) {
            $del = $this -> getRequest() -> getPost('del');
            if ($del == 'Yes') {
                 $product_id = $this -> _getParam('product_id',0);
                 $products_db = new Application_Model_DbTable_Products();
                 $products_db->deleteProduct($product_id);
            }
            $this -> _helper -> redirector('listproduct');
        }
        else{
            $product_id = $this -> _getParam('product_id',0);
            $products_db = new Application_Model_DbTable_Products();
            $this -> view -> product = $products_db -> getProduct($product_id);
        } 
    }

    public function listproductAction()
    {
        $products_db = new Application_Model_DbTable_Products();
        $products = $products_db -> fetchAll() -> toArray();
        $i = 0;
        foreach ($products as $product){ 
            $category_db = new Application_Model_DbTable_ProductsCategory();
            $category  = $category_db ->getCategoryName($product['category_id']);
            $products[$i]['category_name'] = $category;
            $i ++;
        }
        $this -> view -> products = $products;
        
    }

    public function viewproductAction()
    {
       $product_id = $this -> _getParam('product_id',0);
       
       $product_db = new Application_Model_DbTable_Products();
       $product = $product_db ->getProduct($product_id);
       
       $category_db = new Application_Model_DbTable_ProductsCategory();
       $category = $category_db -> getCategoryName($product['category_id']);
       
       $supplier_db = new Application_Model_DbTable_Supplier();
       $supplier = $supplier_db -> getSupplier($product['supplier']);
              
       $this -> view -> product = $product;
       $this -> view -> category = $category;
       $this -> view -> supplier = $supplier['supplier_name'];
    }


}















