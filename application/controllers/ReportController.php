<?php

class ReportController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_helper -> redirector('index','login');
        } 
    }

    public function init()
    {      
       
    }

    public function indexAction()
    {
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $categories = $category_db ->showCategory();
        
        $category_option = new Zend_Form_Element_Select('category');
        $category_option -> addMultiOptions($categories);
        $this -> view -> category_option = $category_option -> __toString();
        

        $sales_db = new Application_Model_DbTable_Sales();
        
        $output = array();
        foreach ($categories as $key => $category){
            if ($key != 0){
            $cur_date = ($sales_db ->ctotalSalesByDate($key) == null)? '0' : $sales_db ->ctotalSalesByDate($key) ;
            $cur_week = ($sales_db ->ctotalSalesByWeek($key) == null)? '0' : $sales_db ->ctotalSalesByWeek($key);
            $cur_month = ($sales_db ->ctotalSalesByMonth($key) == null)? '0' : $sales_db ->ctotalSalesByMonth($key);
            $cur_quarter = ($sales_db ->ctotalSalesByQuarter($key) == null)? '0' : $sales_db ->ctotalSalesByQuarter($key);
            $cur_year = ($sales_db -> ctotalSalesByYear($key) == null)? '0' : $sales_db ->ctotalSalesByYear($key);
            $temp = array( 
                "today" => $cur_date,
                "week" => $cur_week,
                "month" => $cur_month,
                "quarter" => $cur_quarter,
                "year" => $cur_year,               
                );
            
            $output[$category] = $temp; 
            }
        }
        
        $total_query = "SELECT SUM(sales_price) AS total FROM sales";
        $sales = $sales_db ->getAdapter() -> query($total_query);
         $total = $sales -> fetch();
         $this -> view -> total_sales = $total['total'];
         $this -> view -> output = $output;
    }

    public function catrecordsAction()
    {
        $this -> _helper -> layout() -> disableLayout();
        $category_id = $this -> _getParam("id",null);
        
        $sales_db = new Application_Form_Sales();
    //    $sales = $sales_db ->ctotalSalesByWeek($category_id);
        $sales = $category_id;
        
        $this -> view -> weeksales = $sales;
    }


}



