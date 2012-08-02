<?php

class Application_Form_SalesUpdate extends Zend_Form
{

    public function init()
    {
        $this -> setName("Sales Update");
        
        $id = new Zend_Form_Element_Hidden("sales_id");
        $id -> addFilter("Int");
        
          
        $category = new Zend_Form_Element_Text('product_category_id');
        $category -> setLabel("Category")
                  -> setOrder(1);
        
        $quantity = new Zend_Form_Element_Text('product_quantity');
        $quantity -> setLabel("Quantity")
                  -> addFilter("Int")
                  -> setOrder(3);
        
        $price = new Zend_Form_Element_Text('price');
        $price -> setLabel("Price")
               -> addFilter("Int")
                -> setOrder(4);
        
        $charged_postage = new Zend_Form_Element_Text('charged_postage');
        $charged_postage -> setLabel("Charged Postage")
                    -> addFilter("Int")
                   -> setOrder(5);
        
        $real_postage = new Zend_Form_Element_Text('real_postage');
        $real_postage -> setLabel("Real Postage")
                -> addFilter("Int")
                -> setOrder(6);
        
        $date = new ZendX_JQuery_Form_Element_DatePicker('date', array('jQueryParams'=> array('dataFormat' => 'yy-mm-dd'),));
        $date -> setLabel("Date")
                -> setOrder(7);
        
        $dispatch = new ZendX_JQuery_Form_Element_DatePicker('dispatch_date');
        $dispatch -> setLabel("Dispatch date")
                -> setOrder(8);
        
        $source = new Zend_Form_Element_Select('source');
        $source -> setLabel("Sales source")
                -> addMultiOptions(array(
                    "ebay" => "ebay",
                    "ausurfing" => "ausurfing",
                    "newlifestyle" => "newlifestyle",
                ))
                -> setOrder(9);
        
        $status = new Zend_Form_Element_Select('status');
        $status -> setLabel ("Status")
                -> addMultiOptions(array(
                    "Append" => "Append",
                    "Paid" => "Paid",
                    "Sent" => "Sent",                 
                ))
                -> setOrder(10);
        
        $comment = new Zend_Form_Element_Textarea('comment');
        $comment -> setLabel("Comments")
                 -> setOrder(11)
                 -> setAttrib('COLS',30)
                 -> setAttrib('ROWS',4);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit -> setLabel("Submit")
                -> setOrder(12);
        
        $this -> addElements (array($id, $category, $quantity, $price, $charged_postage, $real_postage, $date, $dispatch, $source, $status, $comment, $submit));      
    }
    
    public function addProductField($name, $value)
    {
        $this -> addElement('text',$name, array(
            'value' => $value,
        ));
    }
    
    public function preValidation(array $data)
    { 
        function findFields($field){
            if (strpos($field, 'product')!== false){
                return $field;
            }
        }
        
        $productField = array_filter(array_keys($data),'findFields');      
        
        foreach ($productField as $fieldName){
            $this -> addProductField($fieldName, $data[$fieldName]);
        }
    }



}
