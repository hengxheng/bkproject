<?php

class Application_Form_Categories extends Zend_Form
{

    public function init()
    {
       $this -> setName('Create Category');
       
       $product_category_id = new Zend_Form_Element_Hidden('product_category_id');
            
       $category_name = new Zend_Form_Element_Text('category_name');
       $category_name -> setLabel('Category Name')
                      -> setRequired(true)
                      -> addFilter('StripTags')
                      -> addFilter('StringTrim');
       
       $parents_db = new Application_Model_DbTable_ProductsCategory();
       $parents = $parents_db ->showCategory();
       
       $parent = new Zend_Form_Element_Select('parent_id');
       $parent -> setLabel('Parent Category (if it is a top category, dont change)')
               -> addMultiOptions($parents);
       
       $submit = new Zend_Form_Element_Submit('submit');
       $submit -> setLabel ('Create')
               ->setAttrib('id', 'submit');
       
       $this -> addElements(array($product_category_id,$category_name, $parent, $submit));
       
    }


}

