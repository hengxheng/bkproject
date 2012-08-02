<?php

class Application_Model_DbTable_Fireplace extends Zend_Db_Table_Abstract
{

    protected $_name = 'fireplace';
   
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

    public function addProduct($category_id, $item_code, $product_name, $images, $size, $weight, $color, $price)
    {
        $data = array ( 
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "weight" => $weight,
            "color" => $color,
            "price" => $price,
            );
        $this -> insert($data);
    }
    
    public function updateProduct($id, $category_id, $item_code,$product_name, $images, $size, $weight, $color, $price)
    {
         $data = array (            
            "product_category_id" => $category_id,
            "item_code" => $item_code,
            "product_name" => $product_name,
            "images" => $images,
            "size" => $size,
            "weight" => $weight,
            "color" => $color,
            "price" => $price,
            );
         
         $this -> update($data,'product_id ='.(int)$id);        
    }
    
    public function deleteProduct($id)
    {
        $this -> delete('product_id='.(int)$id);
    }


}

