<?php

class Application_Model_DbTable_Sales extends Zend_Db_Table_Abstract
{

    protected $_name = 'sales';

    public function addSales($item_code, $product_category_id, $product_quantity, $sales_price, $charged_postage, $date, $dispatch_date, $real_postage, $buyer_id, $sales_source, $sales_status, $comment)
    {
        $data = array(
            'item_code' => $item_code,
            'product_category_id' => $product_category_id,
            'product_quantity' => $product_quantity,
            'sales_price' => $sales_price,
            'charged_postage' => $charged_postage,
            'date' => $date,
            'dispatch_date' => $dispatch_date,
            'real_postage' => $real_postage,
            'buyer_id' => $buyer_id,
            'sales_source' => $sales_source,
            'sales_status' => $sales_status,
            'comment' => $comment,
        );
        
        $this -> insert($data);
    }
}

