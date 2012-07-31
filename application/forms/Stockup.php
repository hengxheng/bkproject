<?php

class Application_Form_StockUp extends Zend_Form
{

    public function init()
    {
        $supplier_db = new Application_Model_DbTable_Supplier();
        $supplier_list = $supplier_db -> allSupplier();    
        $supplier = new Zend_Form_Element_Select('supplier');
        $supplier -> setLabel('Supplier')
                  -> addMultiOptions($supplier_list)
                  -> setOrder(1);
        
        $category_db = new Application_Model_DbTable_ProductsCategory();
        $category_list = $category_db ->showCategory();     
        $category = new Zend_Form_Element_Select('category');
        $category -> setLabel("Category")
                  -> addMultiOptions($category_list)
                  -> setOrder(2);
        
        $quantity = new Zend_Form_Element_Text('quantity');
        $quantity -> setLabel("Quantity")
                  -> addFilter("Int")
                  -> setOrder(4);
        
        $date = new ZendX_JQuery_Form_Element_DatePicker('order_date');
        $date -> setLabel('Stock up date')
              -> setOrder(5);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit -> setLabel('Submit')
                -> setOrder(10);
        
        $this -> addElements(array($supplier, $category, $quantity, $date, $submit));
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

