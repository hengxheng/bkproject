<?php

class Application_Model_DbTable_Products extends Zend_Db_Table_Abstract
{

    protected $_name = 'products';
  
    public function getProduct($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }
    
    public function getProductByCode($code)
    {
        $product_code = $code;
        $row = $this -> fetchRow('product_code = "'.$product_code.'"');
        return $row -> toArray();
    }
    
    public function getProductByCategory($category_id)
    {
       $select = $this -> select() -> where('category_id = ?',$category_id); 
       $rows = $this ->fetchAll($select);
//        $row = $this -> fetchRow('category_id = '.$category_id);
        return $rows -> toArray();

    }
    
    public function addProduct($category_id, $product_name, $product_code, $product_size, $product_weight, $product_images, $product_price, $product_cost, $supplier, $description)
    {
        $data = array (
           'category_id' => $category_id,
           'product_name' => $product_name,
           'product_code' => $product_code,
           'product_size' => $product_size,
           'product_weight' => $product_weight,
           'product_images' => $product_images,
           'product_price' => $product_price,
           'product_cost' => $product_cost,
           'supplier' => $supplier,
           'description' => $description,      
        ); 
        $this -> insert ($data);
    }
    
    public function updateProduct($product_id, $category_id, $product_name, $product_code, $product_size, $product_weight, $product_images, $product_price, $product_cost, $supplier, $description)
    {
        $data = array (
           'category_id' => $category_id,
           'product_name' => $product_name,
           'product_code' => $product_code,
           'product_size' => $product_size,
           'product_weight' => $product_weight,
           'product_images' => $product_images,
           'product_price' => $product_price,
           'product_cost' => $product_cost,
           'supplier' => $supplier,
           'description' => $description,      
        );        
        $this -> update($data, 'product_id='.(int)$product_id);
    }
    
    public function updateProductNoImage($product_id, $category_id, $product_name, $product_code, $product_size, $product_weight, $product_price, $product_cost, $supplier, $description)
    {
        $data = array (
           'category_id' => $category_id,
           'product_name' => $product_name,
           'product_code' => $product_code,
           'product_size' => $product_size,
           'product_weight' => $product_weight,
           'product_price' => $product_price,
           'product_cost' => $product_cost,
           'supplier' => $supplier,
           'description' => $description,      
        );        
        $this -> update($data, 'product_id='.(int)$product_id);
    }
    
    public function deleteProduct($product_id)
    {
        $this -> delete('product_id='.(int)$product_id);
    }
}

