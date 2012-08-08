<?php

class Application_Form_Products extends Zend_Form
{

    public function init()
    {
        $this -> setName("products");
        $this -> setAttrib('enctype', 'multipart/form-data');
        
        $product_id = new Zend_Form_Element_Hidden('product_id');
        $product_id -> addFilter("Int");
        
        $category_id = new Zend_Form_Element_Hidden('category_id');
        $category_id -> addFilter("Int");
        
        $product_name = new Zend_Form_Element_Text('product_name');
        $product_name -> setLabel('Product Name')
                      -> setRequired(true)
                      -> addFilter('StripTags')
                      -> addFilter('StringTrim')
                      -> addValidator('NotEmpty');
        
        $product_code = new Zend_Form_Element_Text('product_code');
        $product_code -> setLabel('Product Code')
                      -> setRequired(true)
                      -> addFilter('StripTags')
                      -> addFilter('StringTrim')
                      -> addValidator('NotEmpty');
        
        $categories_db = new Application_Model_DbTable_ProductsCategory();
        $categories = $categories_db ->fetchAll();
        $subcategories = $categories_db ->fetchAll();
        $category_list = array();
        foreach ($categories as $category) {
            if ($category -> parent_id == 0){
            $category_list[$category -> product_category_id] = $category -> category_name;
               foreach ($subcategories as $subcategory){
                   if ($subcategory -> parent_id == $category -> product_category_id){
                       $category_list[$subcategory -> product_category_id] = '----------'.$subcategory -> category_name;
                   }
               }
            }
        }
        
        $this -> addElement('select','$category_id',array(
            'label' => 'Cateogory' ,
            'multiOptions' => $category_list,
            'order' => 4,
        ));
//        $product_category = new Zend_Form_Element_Select($category_id);
//        
//        $product_category  ->setLabel('Category')
//                           ->addMultiOptions($category_list);
                           
        
        $product_size = new Zend_Form_Element_Text('product_size');
        $product_size -> setLabel('Product Size')
                        -> setRequired(true)
                        -> addFilter('StripTags')
                        -> addFilter('StringTrim')
                        -> addValidator('NotEmpty'); 
        
        $product_weight = new Zend_Form_Element_Text('product_weight');
        $product_weight -> setLabel('Product Weight')
                        -> addFilter('Int');
        
        $product_images = new Zend_Form_Element_File('product_images');
        $product_images -> setLabel('Product Image')
                        -> setDestination('images/products/' );
        
        $product_price = new Zend_Form_Element_Text('product_price');
        $product_price -> setLabel('Product Price')
                       -> setRequired(true)
                       -> addFilter('Int');
        
        $product_cost = new Zend_Form_Element_Text('product_cost');
        $product_cost -> setLabel('Product Cost')
                       -> setRequired(true)
                       -> addFilter('Int');
        
        $supplier_db = new Application_Model_DbTable_Supplier();
        $supplier_list = $supplier_db -> allSupplier();    
        $supplier = new Zend_Form_Element_Select('supplier');
        $supplier -> setLabel('Supplier')
                  -> addMultiOptions($supplier_list);
                 
        
        $description = new Zend_Form_Element_Textarea('description');
        $description -> setLabel("Description")
                    -> setAttrib('COLS',80)
                    -> setAttrib('ROWS',25);
        
         $submit = new Zend_Form_Element_Submit('submit');
         
         $this -> addElements (array( $product_id, $category_id, $product_name, $product_code, $product_size, $product_weight, $product_images, $product_price, $product_cost, $supplier, $description, $submit));
         
    }


}

