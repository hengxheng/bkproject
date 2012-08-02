<?php

class Application_Model_DbTable_Surfboard extends Zend_Db_Table_Abstract
{

    protected $_name = 'surfboard';

    public function getProduct($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('product_id= '. $id);
        return $row -> toArray();
    }
    
    public function searchProductByCode($code)
    {
        $item_code = $code;
//        $query = "SELECT * FROM surfboard WHERE item_code = '". $code."'";
//        $row = $this -> getAdapter() -> query($query);
        $row = $this -> fetchRow('item_code = "'.$item_code.'"');
        return $row -> toArray();
    }
    
    public function addProduct($product_category_id, $type, $product_name, $item_code, $price,$images, $size, $length, $width, $thickness, $weight, $nose, $tail, $fin, $bottom, $material)
    {
        $data = array (
           'product_category_id' => $product_category_id,
           'type' => $type,
           'product_name' => $product_name,
           'item_code' => $item_code,
           'price' => $price,
            'images' => $images,
            'size' => $size,
            'length' => $length,
            'width' => $width,
            'thickness' => $thickness,
            'weight' => $weight,
            'nose' => $nose,
            'tail' => $tail,
            'fin' => $fin,
            'bottom' => $bottom,
            'material' => $material,      
        ); 
        $this -> insert ($data);
    }
    
    public function updateProduct($id, $product_category_id, $type, $product_name, $item_code, $price,$images, $size, $length, $width, $thickness, $weight, $nose, $tail, $fin, $bottom, $material)
    {
        $data = array(
            'product_category_id' => $product_category_id,
            'type' => $type,
            'product_name' => $product_name,
            'item_code' => $item_code,
            'price' => $price,
            'images' => $images,
            'size' => $size,
            'length' => $length,
            'width' => $width,
            'thickness' => $thickness,
            'weight' => $weight,
            'nose' => $nose,
            'tail' => $tail,
            'fin' => $fin,
            'bottom' => $bottom,
            'material' => $material,
        );
        
        $this -> update($data, 'product_id='.(int)$id);
    }
    
    public function deleteProduct($id)
    {
        $this -> delete('product_id='.(int)$id);
    }
}

