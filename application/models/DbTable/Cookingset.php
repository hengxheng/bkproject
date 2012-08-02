<?php

class Application_Model_DbTable_Cookingset extends Zend_Db_Table_Abstract
{

    protected $_name = 'cooking_set';

    public function getProduct($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }
    
     public function searchProductByCode($code)
    {
        $item_code = $code;
        $row = $this -> fetchRow('item_code = "'.$item_code.'"');
        return $row -> toArray();
    }

    public function addProduct($category_id, $item_code, $product_name, $type, $images, $size, $length, $width, $thickness, $weight, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,          
            "type" => $type,
            "images" => $images,
            "weight" => $weight,
            "size" => $size,
            "length" => $length,
            "width" => $width,
            "thickness" => $thickness,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateProduct($id, $category_id, $item_code, $product_name, $type, $images, $size, $length, $width, $thickness, $weight, $price)
    {
           $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "type" => $type,
            "images" => $images,
            "size" => $size,
            "length" => $length,
            "width" => $width,
            "thickness" => $thickness,
            "weight" => $weight,
            "price" => $price,
            );
         
         $this -> update($data,'product_id ='.(int)$id);        
    }
    
    public function deleteProduct($id)
    {
        $this -> delete('product_id='.(int)$id);
    }
}

