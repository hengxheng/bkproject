<?php

class Application_Form_Order extends Zend_Form
{
   public $elementDecorators = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array('Label', array('tag' => 'td')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );

    public $buttonDecorators = array(
        'ViewHelper',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );
    
    public function addRow(){
//        $product_categories = new Application_Model_DbTable_ProductsCategory();
//        $categories = 
        $row_form = new Zend_Form(
              array('elements'=>array(
                        'category' => array('type' => 'select'),
                        'product'=> array('type'=>'select'),
                        'quantity'=> array('type'=>'text'),
                        'packaging'=> array('type'=>'text'),
                          ),
                    'decorators' => array('FormElements',array('HtmlTag',array('tag'=>'tr'))),
                    'elementDecorators' => array('ViewHelper', array('HtmlTag',array('tag' => 'td')))
        ));
        
        $new_form_index = count($this->_subForms)+1;
        $row_form -> setElementsBelongTo($new_form_index);
        $this ->addSubForm($row_form, $new_form_index);
    }
    
    public function init()
    {
        $this -> setName("New Order");
        
        
        $suppliers = new Application_Model_DbTable_Supplier();
        $all_suppliers = $suppliers -> allSupplier();
        
        $this -> addElement('hidden','row_num',array(
            'value'=>1,
        ));
     
        
        $this -> addElement('hidden','supply_order_id',array(
            'filter'=> 'Int',
        ));
        
         $this -> addElement('select','supplier',array(
            'label' => 'Supplier name' ,
            'multiOptions' => $all_suppliers,
            'order' => 2,
        ));
        
        
        $date = new ZendX_JQuery_Form_Element_DatePicker(
                        'order_date',
                        array('label' => 'Order Date:',
                              'order' => 3,));
        $this->addElement($date);
        
        $this->addElement('text','deposit',array(
            'label' => 'Deposit:',
            'filter' => 'Int',
            'order' => 5,
        ));
        
        $this -> addElement('text','finalpayment',array(
            'label' => 'Final Payment:',
            'filter' => 'Int',
            'order' => 6,
        ));
        
        $this -> addElement('text','freight',array(
            'label' => 'Freight:',
            'filter' => 'Int', 
            'order' => 7,
        ));
        
        $this -> addElement('text','localfee',array(
            'label' => 'Local Fee:',
            'filter' => 'Int',            
            'order' => 8,
        ));
        
        
//        $this -> addPrefixPath('ZFExt_Form_Decorator','ZFExt/Form/Decorator/','Decorator');
//        $this ->setDecorators(array(
//            'FormElements',array(
//                  'SimpleTable',array(
//                      'columns'=> array(
//                          'Category',
//                          'Product',
//                          'Quantity',
//                          'Package'),
//                      'class'=> 'more_product'
//                      )
//                ),'Form'
//            ));
        
        
        $this -> addElement('button','addRow',array(
            'label' => 'Add',
            'decorator' => array( 'ViewHelper', array(array('td'=>'HtmlTay'), array('tag' => 'td', 'colspan' =>3)), array(array('tr'=> 'HtmlTag'), array('tag' => 'tr')) ),
            'order' => 99,
        ));
        
        $this -> addElement('button', 'removeRow', array(
            'label' => 'Remove',
            'order' => 98,
        ));
       
        $this->addElement('submit', 'submit', array(
             'label' => 'Submit',
             'order' => 100
        ));
        
       
        
//        $this -> addRow();
//        $this -> addRow();
//        $this -> addRow();
        
//        $this -> getElement('addRow') -> setDecorators( array( 'ViewHelper', array(array('td'=>'HtmlTay'), array('tag' => 'td', 'colspan' =>3)), array(array('tr'=> 'HtmlTag'), array('tag' => 'tr')) ));
//        $this -> getElement('addRow')-> setOrder(100);
        
//        $this -> getElement('buttonRemove') -> setDecorators( array( 'ViewHelper', array(array('td'=>'HtmlTay'), array('tag' => 'td', 'colspan' =>3)), array(array('tr'=> 'HtmlTag'), array('tag' => 'tr')) ));
//        $this -> getElement('buttonRemove')-> setOrder(101);
       
    }
    
    public function preValidation(array $data){
         // array_filter callback
    function findFields($field) {
      // return field names that include 'newName'
      if (strpos($field, 'newName') !== false) {
        return $field;
      }
    }
    
    // Search $data for dynamically added fields using findFields callback
    $newFields = array_filter(array_keys($data), 'findFields');
    
    foreach ($newFields as $fieldName) {
      // strip the id number off of the field name and use it to set new order
      $order = ltrim($fieldName, 'newName') + 2;
      $this->addNewField($fieldName, $data[$fieldName], $order);
    }
    }
    
    /**
    * Adds new fields to form
    *
    * @param string $name
    * @param string $value
    * @param int    $order
    */
    public function addNewField($name, $value, $order) {

        $this->addElement('text', $name, array(
        'required'       => true,
        'label'          => 'Name',
        'value'          => $value,
        'order'          => $order
        ));
    } 
}
