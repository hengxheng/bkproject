<?php

class Application_Form_Order extends Zend_Form
{

    
    public function addRow(){
        $row_form = new Zend_Form(
              array('elements'=>array(
                        'Category' => array('type' => 'select'),
                        'Product'=> array('type'=>'select'),
                        'Quantity'=> array('type'=>'text'),
                        'Packaging'=> array('type'=>'text'),
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
        
        
        $this -> addElement('hidden','supplier_id',array(
            'filter'=> 'Int',
        ));
        
        $this -> addElement('text','name',array(
           'required' => true,
            'label' => 'Supplier name:',
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
        
        $this -> addElement('button','addRow',array(
            'label' => 'Add',
            'order' => 91,
        ));
        
        $this->addElement('button', 'removeRow', array(
            'label' => 'Remove',
            'order' => 92
        ));
       
        $this->addElement('submit', 'submit', array(
             'label' => 'Submit',
             'order' => 100
        ));
        
        $this -> addPrefixPath('ZFExt_Form_Decorator','ZFExt/Form/Decorator/','Decorator');
        $this ->setDecorators(array(
            'FormElements',array(
                  'SimpleTable',array(
                      'columns'=> array(
                          'Category',
                          'Product',
                          'Quantity',
                          'Package')
                      )
                ),'Form'
            ));
        
        $this -> addRow();
        $this -> addRow();
        $this -> addRow();
        
//        $this -> getElement('submit') -> setDecorators( array( 'ViewHelper', array(array('td'=>'HtmlTay'), array('tag' => 'td', 'colspan' =>3)), array(array('tr'=> 'HtmlTag'), array('tag' => 'tr')) ));
//        $this -> getElement('submit')-> setOrder(100);
       
    }
}

