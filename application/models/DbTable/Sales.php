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
    
    public function viewHistory()
    {
        $sales = $this -> fetchAll();
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $history_list = array();
        
        foreach ($sales as $sale){
            $category = $category_db ->getCategoryName($sale -> product_category_id);
            $stocks_item = array();
            $stocks_item['sales_id'] = $sale -> sales_id;
            $stocks_item['product_category'] = $category;
            $stocks_item['item_code'] = $sale -> item_code;
            $stocks_item['product_quantity'] = $sale -> product_quantity;
            $stocks_item['date'] = $sale -> date;
            $stocks_item['status'] = $sale -> sales_status;
            $history_list[] = $stocks_item;
        }
        return $history_list;
    }
    
    public function updateSales($id, $item_code, $product_category_id, $product_quantity, $sales_price, $charged_postage, $date, $dispatch_date, $real_postage, $buyer_id, $sales_source, $sales_status, $comment)
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
         
         $this -> update($data, 'sales_id='.$id);
    }
    
    public function getSales($id)
    {
        $id = (int)$id;
        $row = $this-> fetchRow('sales_id= '. $id);
        return $row -> toArray();
    }
    
    public function totalSales()
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales";
        $row = $this ->getAdapter() -> query($query);
        $total = $row -> fetch();
        return $total['total']; 
    }
    
    public function totalSalesByDate($year='now', $month='now', $product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        if ($month == 'now'){
            $query .= "MONTH(date)=MONTH(CURDATE())";
        }
        else{
            $query .= "MONTH(date)=".$month;
        }
         
        if ($product_code != 0){
            $query .= "item_code =".$product_code;
        }       
    }
    
    public function totalSalesByWeek($week='now',$product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        
        if ($week == 'now'){
            $query .= "YEARWEEK(date) = YEARWEEK(CURRENT_DATE)"; 
        }
        elseif ($week == 'last'){
            $query .= "YEARWEEK(date) = YEARWEEK(CURRENT_DATE - INTERVAL 7 DAY)";
        }
        
        if ($product_code != 0){
            $query .= "item_code =".$product_code;
        }
    }
    
    public function totalQuantityByDate($year='now', $month='now', $product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        if ($month == 'now'){
            $query .= "MONTH(date)=MONTH(CURDATE())";
        }
        else{
            $query .= "MONTH(date)=".$month;
        }
         
        if ($product_code != 0){
            $query .= "item_code =".$product_code;
        }   
    }
}

