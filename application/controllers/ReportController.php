<?php

class ReportController extends Zend_Controller_Action
{

    function preDispatch()
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_helper -> redirector('index','login');
        }
    }
    
    public function init()
    {
        $products_db = new Application_Model_DbTable_Products();
        $sales_db = new Application_Model_DbTable_Sales();
        $stock_db = new Application_Model_DbTable_Stock();
        
//        $total_sales = $sales_db ->totalSales();
//        $this -> view -> total_sales = $total_sales;
        
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $categories = $category_db ->showCategory();
        
        $category_option = new Zend_Form_Element_Select('category');
        $category_option -> addMultiOptions($categories);
        $this -> view -> category_option = $category_option -> __toString();
        $date = '7';
        $year_total_query = "SELECT SUM(sales_price) AS total FROM sales WHERE YEAR(date)=YEAR(CURDATE()) AND MONTH(date)=".$date;
        $year_sales = $sales_db ->getAdapter() -> query($year_total_query);
         $total = $year_sales -> fetch();
         $this -> view -> total_sales = $total['total'];
        
   //     $month_total_query = "SELECT SUM(sales_price) AS total FROM sales WHERE YEAR(date)=YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())";
    }

    public function indexAction()
    {
        // action body
    }


}

