<?php

class Application_Model_DbTable_Fin extends Zend_Db_Table_Abstract
{

    protected $_name = 'fin';
    
       public function getFin($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }

    public function addFin($category_id, $item_code, $product_name, $images, $size, $weight, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "weight" => $weight,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateFin($id, $category_id, $item_code,$product_name, $images, $size, $weight, $price)
    {
         $data = array (            
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "weight" => $weight,
            "price" => $price,
            );
         
         $this -> update($data,'product_id ='.(int)$id);        
    }
    
    public function deleteFin($id)
    {
        $this -> delete('product_id='.(int)$id);
    }
}

