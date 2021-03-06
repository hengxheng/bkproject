<?php

class Application_Form_Supplier extends Zend_Form
{

    public function init()
    {
        $this -> setName('Suppliers');
        $this ->setAttrib('enctype', 'multipart/form-data');
        
        $id = new Zend_Form_Element_Hidden('supplier_id');
        $id -> addFilter('Int');
        
        $name = new Zend_Form_Element_Text('supplier_name');
        $name -> setLabel('Supplier name')
             -> setRequired(true)
             -> addFilter('StripTags')
             -> addFilter('StringTrim')
             -> addValidator('NotEmpty');
        
        $contact_name = new Zend_Form_Element_Text('contact_name');
        $contact_name -> setLabel('Contact name')
                      -> addFilter('StripTags')
                     -> addFilter('StringTrim');
        
        $phone = new Zend_Form_Element_Text('phone');
        $phone -> setLabel('Phone')
                -> addFilter('StripTags')
                -> addFilter('StringTrim');
        
        $address = new Zend_Form_Element_Text('address');
        $address -> setLabel('Address')
                -> addFilter('StripTags')
                -> addFilter('StringTrim');
        
        $qq = new Zend_Form_Element_Text('qq');
        $qq -> setLabel('QQ')
                -> addFilter('stripTags')
                -> addFilter('StringTrim');
        
        $email = new Zend_Form_Element_Text('email');
        $email -> setLabel('Email')
                -> addFilter('stripTags')
                -> addFilter('StringTrim');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit ->setAttrib('id','submit');
        
        $this -> addElements(array($id, $name, $contact_name, $phone, $address, $qq, $email, $submit));
        
    }


}

