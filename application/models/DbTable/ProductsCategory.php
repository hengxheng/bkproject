<?php

class Application_Model_DbTable_ProductsCategory extends Zend_Db_Table_Abstract
{

    protected $_name = 'products_category';
    
    public function getCategory($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ', $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function addCategory($name)
    {
       $data = array(
            'product_category_id' => ' ',
            'category_name' => $name,
       ); 
       $this->insert($data);
    }
    
    public function updateCategory($id, $name)
    {
        $data = array(
            'product_category_id' => $id,
            'category_name' => $name,
        );
        $this->update($data, 'product_category_id = ',(int)$id);
    }
    
    public function deleteCategory($id)
    {
        $this->delete('product_category_id = '.(int)$id);
    }
    
    public function showCategory()
    {
        $categorys = $this -> fetchAll();
        $category_list = array();
        foreach ($categorys as $category){
            $category_list[$category->product_category_id] = $category->category_name;
        }
        return $category_list;  
    }
}

