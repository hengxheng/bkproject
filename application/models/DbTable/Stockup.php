<?php

class Application_Model_DbTable_Stockup extends Zend_Db_Table_Abstract
{

    protected $_name = 'stockup_product';
   
    public function stockUp($supplier_id, $item_code, $product_category_id, $product_quantity, $stockup_date, $supply_order_id){
        $data = array(
            "supplier_id" => $supplier_id,
            "item_code" => $item_code,
            "product_category_id" => $product_category_id,
            "product_quantity" => $product_quantity,
            "stockup_date" => $stockup_date, 
            "supply_order_id" => $supply_order_id,
        );
        
        $this -> insert($data);
    }
    

}

