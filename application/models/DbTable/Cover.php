<?php

class Application_Model_DbTable_Cover extends Zend_Db_Table_Abstract
{

    protected $_name = 'cover';
  
     public function getProduct($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }

    public function addProduct($category_id, $item_code, $product_name, $images, $size, $length, $width, $thickness, $weight, $slot, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "length" => $length,
            "width" => $width,
            "thickness" => $thickness,
            "weight" => $weight,
            "slot" => $slot,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateProduct($id, $category_id, $item_code, $product_name, $images, $size, $length, $width, $thickness, $weight, $slot, $price)
    {
         $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "length" => $length,
            "width" => $width,
            "thickness" => $thickness,
            "weight" => $weight,
            "slot" => $slot,
            "price" => $price,
            );
         
         $this -> update($data,'product_id ='.(int)$id);        
    }
    
    public function deleteProduct($id)
    {
        $this -> delete('product_id='.(int)$id);
    }

}

