<?php

class OrderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $form = new Application_Form_Order();
       
        // Form has not been submitted - pass to view and return
    if (!$this->getRequest()->isPost()) {
      $this->view->form = $form;
      return;
    }
 
     // Form has been submitted - run data through preValidation()
    $form->preValidation($_POST);
   
     // If the form doesn't validate, pass to view and return
    if (!$form->isValid($_POST)) {
      $this->view->form = $form;
      return;
    }
   
     // Form is valid
    $this->view->form = $form;
      
    }

    /**
     * Ajax action that returns the dynamic form field
     *
     *
     */
    public function newfieldAction()
    {

        $this -> _helper -> layout() -> disableLayout();

        $id = $this->_getParam('id', null);
        
        
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $category_list = $category_db ->showCategory();
        
        
        $category = new Zend_Form_Element_Select('category_new'.$id);
        $category ->setBelongsTo($id)
                  ->setAttrib('class','xuanzhe')
                  ->addMultiOptions($category_list)
                  ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        $product_name = new Zend_Form_Element_Select('product_name_new'.$id);
        $product_name -> setBelongsto($id)
                 ->addMultiOptions(array(''=>'------------------'))
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        $quantity = new Zend_Form_Element_Text('quantity_new'.$id);
        $quantity ->setBelongsTo($id)
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        
        $packaging = new Zend_Form_Element_Text('packaging_new'.$id);
        $packaging -> setBelongsTo($id)
                ->setDecorators(array(
                       'ViewHelper',
                       'Errors',
                       array(array('data' => 'HtmlTag'), array('tag' => 'td'))));
        

        $content = $category -> __toString().$product_name -> __toString().$quantity -> __toString().$packaging -> __toString();
        $this->view->field = $content;
    }

    public function addproductAction()
    {
        $this -> _helper -> layout() -> disableLayout();
        $category_id = $this -> _getParam('category',0);
        
        $product_db = new Application_Model_DbTable_Products();      
        $products = $product_db ->getProductByCategory($category_id);
 
        $html_content = '';
        foreach ($products as $product){
            $product_id = $product['product_id'];
             $product_code = $product['product_code'];
            $product_name = $product['product_name'];
            $html_content .= '<option value="'.$product_id.'">'.$product_name.'('.$product_code.')</option>';
        } 
        
        $this -> view -> html_content =  $html_content;
    }

    public function orderhistoryAction()
    {
//        $form = new Application_Form_Order();
    
    
        if($this ->getRequest() ->isPost()){
            $result = $this ->getRequest() -> getPost();

            $supplier = $result['supplier'];
            $order_date = $result['order_date'];
            $deposit = $result['deposit']; 
            $finalpayment = $result['finalpayment'];
            $freight = $result['freight'];
            $localfee = $result['localfee'];
            
            $order_db = new Application_Model_DbTable_SupplyOrder();
            $supply_order_id = $order_db -> addOrder($order_date, $deposit, $finalpayment, $freight, $localfee, $supplier);
                    
            
       // product 1     
            $category = $result['category'];
            $product_id = $result['product_name'];
            $quantity = $result['quantity'];
            $packaging = $result['packaging'];
            
            $orderedproduct_db = new Application_Model_DbTable_OrderedProduct();
            $orderedproduct_db -> addProduct($supply_order_id, $product_id, $category,  $packaging, $quantity);
            
      // extra products
           $extra_products = array();
           foreach ($result as $item){
                if (is_array($item)){ 
                    $product = array();
                    foreach ($item as $attr){
                        $product[] = $attr;
                    }
                    $extra_products[] = $product; 
                }                              
            }

            foreach ($extra_products as $extra){
                $product_id = $extra[1];
                $category = $extra[0];
                $quantity = $extra[2];
                $packaging = $extra[3];
                
                $orderedproduct_db = new Application_Model_DbTable_OrderedProduct();
                $orderedproduct_db -> addProduct($supply_order_id, $product_id, $category,  $packaging, $quantity);
            }
        }
        else {
//              $abd = 'e';
        }
            
            
//         $this -> view -> extra = $extra_products;
//        $this -> view -> supplier = $contents;
    }


}







