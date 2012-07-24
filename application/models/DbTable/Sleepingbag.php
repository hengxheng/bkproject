<?php

class Application_Model_DbTable_Sleepingbag extends Zend_Db_Table_Abstract
{

    protected $_name = 'sleeping_bag';

    public function getProduct($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }

    public function addProduct($category_id, $item_code, $product_name, $images,$color, $filling, $weight, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "color" => $color,
            "filling" => $filling,
            "weight" => $weight,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateProduct($id, $category_id, $item_code, $product_name, $images,$color, $filling, $weight, $price)
    {
           $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "color" => $color,
            "filling" => $filling,
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

