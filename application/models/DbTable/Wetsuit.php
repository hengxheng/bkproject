<?php

class Application_Model_DbTable_Wetsuit extends Zend_Db_Table_Abstract
{

    protected $_name = 'wetsuit';
   
      public function getWetsuit($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }

    public function addWetsuit($category_id, $item_code, $product_name, $images, $size, $type, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "type" => $type,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateWetsuit($id, $category_id, $item_code,$product_name, $images, $size, $type, $price)
    {
         $data = array (            
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "type" => $type,
            "price" => $price,
            );
         
         $this -> update($data,'product_id ='.(int)$id);        
    }
    
    public function deleteWetsuit($id)
    {
        $this -> delete('product_id='.(int)$id);
    }

}

