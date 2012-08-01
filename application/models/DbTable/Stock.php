<?php

class Application_Model_DbTable_Stock extends Zend_Db_Table_Abstract
{

    protected $_name = 'stock_info';

    public function allStock()
    {
        $stocks = $this ->fetchAll();
        
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $stocks_list = array();
        
        foreach ($stocks as $stock){
            $category = $category_db ->getCategoryName($stock -> product_category_id);
            $stocks_item = array();
            $stocks_item['product_category'] = $category;
            $stocks_item['item_code'] = $stock -> item_code;
            $stocks_item['product_quantity'] = $stock -> product_quantity;
//          $stocks_list  = array(
//                "product_category" => $category,
//                "item_code" => $stock -> item_code,
//                "product_quantity" => $stock -> product_quantity,
//            );
            $stocks_list[] = $stocks_item;
        }
        return $stocks_list;
    }
}

