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
   
    // product search by given date
    public function ptotalSalesByDate($year='now', $month='now', $product_code = 0)
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
    
    //product search by given week
    public function ptotalSalesByWeek($week= 0,$product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        $_week = $week *7;
        $query .= "YEARWEEK(date) = YEARWEEK(CURRENT_DATE - INTERVAL ".$_week." DAY)";
        
        
        if ($product_code != 0){
            $query .= "item_code =".$product_code; 
        }
        
        $rows = $this ->getAdapter()-> query($query);
        $total = $rows -> fetch();
        return $total['total'];
    }
    
    //product search by given quarter
    public function ptotalSalesByQuarter($year = 'now',$quarter = 0,$product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        $query .= "QUARTER(date) = QUARTER(CURDATE() - ".$quarter.")";
        
        if ($product_code != 0){
            $query .= "item_code =".$product_code;
        } 
        
        $rows = $this ->getAdapter()-> query($query);
        $total = $rows -> fetch();
        return $total['total'];
    }
    
    //product quantity search by given date
    public function ptotalQuantityByDate($year='now', $month='now', $product_code = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        if ($month == 'now'){
            $query .= "MONTH(date)= MONTH(CURDATE())";
        }
        else{
            $query .= "MONTH(date)= ".$month;
        }
         
        if ($product_code != 0){
            $query .= "item_code =".$product_code;
        } 
        
        $rows = $this ->getAdapter()-> query($query);
        $total = $rows -> fetch();
        return $total['total'];
    }
    
     
    public function ctotalSalesByDate($category_id, $date = 'now')
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($date == 'now'){
            $query .= "date = curdate()";
        }
        else{
            $query .= "date = ".$date;
        }
        
        $query .= "And product_category_id =".$category_id; 
        
        $row = $this ->getAdapter()-> query($query);
        $total = $row -> fetch();
        return $total['total'];
    }
    
    //category search by given week
    public function ctotalSalesByWeek($category_id, $week= 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        $_week = $week *7;
        $query .= "YEARWEEK(date) = YEARWEEK(CURRENT_DATE - INTERVAL ".$_week." DAY)";
        
        
        $query .= "And product_category_id =".$category_id;
        
        $row = $this ->getAdapter()-> query($query);
        $total = $row -> fetch();
        return $total['total'];
    }
    
    
    //category search by given month
    public function ctotalSalesByMonth($category_id,$year='now', $month='now')
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        if ($month == 'now'){
            $query .= " And MONTH(date)=MONTH(CURDATE())";
        }
        else{
            $query .= "And MONTH(date)=".$month;
        }
         
        $query .= " And product_category_id =".$category_id; 
        
        $row = $this ->getAdapter() -> query($query);
        $total = $row -> fetch();
        return $total['total'];
    }
    
    
    
    //category search by given quarter
    public function ctotalSalesByQuarter($category_id, $year = 'now',$quarter = 0)
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
        
        $query .= "And QUARTER(date) = QUARTER(CURDATE() - ".$quarter.")";
        
        
        $query .= "And product_category_id =".$category_id;
         
        
        $row = $this ->getAdapter()-> query($query);
        $total = $row -> fetch();
        return $total['total'];
    }
    
    //cateogry search by given year
    public  function ctotalSalesByYear($category_id,$year='now')
    {
        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
        if ($year == 'now'){
            $query .= "YEAR(date)=YEAR(CURDATE())";
        }
        else{
            $query .= "YEAR(date)=".$year;
        }
         $query .= "And product_category_id =".$category_id; 
         
        $row = $this ->getAdapter() -> query($query);
        $total = $row -> fetch();
        return $total['total'];
    }
    
//    public function ctotalQuantityByDate($category_id, $year='now', $month='now')
//    {
//        $query = "SELECT SUM(sales_price) AS total FROM sales WHERE ";
//        if ($year == 'now'){
//            $query .= "YEAR(date)=YEAR(CURDATE())";
//        }
//        else{
//            $query .= "YEAR(date)=".$year;
//        }
//        
//        if ($month == 'now'){
//            $query .= "MONTH(date)= MONTH(CURDATE())";
//        }
//        else{
//            $query .= "MONTH(date)= ".$month;
//        }
//         
//        $query .= "product_category_id =".$category_id;
//        
//        $rows = $this ->getAdapter()-> query($query);
//        $total = $rows -> fetch();
//        return $total['total'];
//    }
}

