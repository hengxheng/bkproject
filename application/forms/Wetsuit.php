<?php

class Application_Form_Wetsuit extends Zend_Form
{

    public function init()
    {
       $this-> setName('New Wetsuit');
       $this-> setAttrib('enctype', 'multipart/form-data');
       
       $id = new Zend_Form_Element_Hidden('product_id');
       $id->addFilter('Int');
       
       $category_id = new Zend_Form_Element_Hidden('product_category_id');
       $category_id -> addFilter('Int'); 
             
       $name = new Zend_Form_Element_Text('product_name');
       $name -> setLabel('Name')
             -> setRequired(true)
             -> addFilter('StripTags')
             -> addFilter('StringTrim')
             -> addValidator('NotEmpty');
             
       $item_code = new Zend_Form_Element_Text('item_code');
       $item_code -> setLabel('Item Code')
                  -> setRequired(true)
                  -> addFilter('StripTags')
                  -> addFilter('StringTrim')
                  -> addValidator('NotEmpty');
       
       $type = new Zend_Form_Element_Select('type');
       $type -> setLabel('Type: ')
             -> addMultiOptions( array('Women'=>'Women','Man'=>'Man', 'Kid'=>'Kid'));
       
       
       $price = new Zend_Form_Element_Text('price');
       $price -> setLabel('Price')
              -> setRequired(true)
              -> addFilter('Int');
           
       $images = new Zend_Form_Element_File('images');
       $images -> setLabel('Product Image: ')
               -> setDestination('images/products/' );
//               -> addValidator ('Count', false, 1) //ensure only 1 file
//               -> addValidator ('Extension', false, 'jpg,png,gif')
//               -> addValidator ('NotExists', false, $productimages );
       
       
       $size = new Zend_Form_Element_Text('size');
       $size -> setLabel('Size')
             -> setRequired(true)
             -> addFilter('StripTags')
             -> addFilter('StringTrim')
             -> addValidator('NotEmpty'); 
       
        $submit = new Zend_Form_Element_Submit('submit');
       $submit -> setAttrib('id', 'submitbutton');
       
       $this -> addElements(array($id, $category_id, $name, $item_code, $type, $price, $images, $size,$submit));
    }


}
