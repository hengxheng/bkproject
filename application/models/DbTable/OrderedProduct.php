<?php

class Application_Model_DbTable_OrderedProduct extends Zend_Db_Table_Abstract
{

    protected $_name = 'ordered_product';

    public function addProduct($supply_order_id, $product_id, $product_category_id,  $packaging, $product_quantity)
    {
        $data = array(
            'product_id' => $product_id,
            'product_category_id' => $product_category_id,
            'product_quantity' => $product_quantity,
            'packaging' => $packaging,
            'supply_order_id' => $supply_order_id,
        );
        
        $this -> insert($data);
        
    }
    
    public function getProductByOrder($supply_order_id)
    {
        $id = $supply_order_id;
        
        $select = $this -> select() -> where('supply_order_id = ?',$id); 
        $rows = $this ->fetchAll($select);
        return $rows -> toArray();
    }
        
}

