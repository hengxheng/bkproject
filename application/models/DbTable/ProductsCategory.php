<?php

class Application_Model_DbTable_ProductsCategory extends Zend_Db_Table_Abstract
{

    protected $_name = 'products_category';
    
    public function getCategory($id)
    {
        $id = (int)$id;
        $query = "SELECT * FROM products_category WHERE product_category_id = '".$id."'";
        $row = $this ->getAdapter() -> query ($query);
        
        return $row ->fetch();
    }
    
    public function getCategoryName($id)
    {
        $id = (int)$id;
        $query = "SELECT category_name FROM products_category WHERE product_category_id = '".$id."'";
        $row = $this ->getAdapter() -> query ($query);
//        $row = $this -> fetchRow('product_category_id= ', $id);
        $category = $row ->fetch();
        return $category['category_name'];
    }
    
    
    public function addCategory($parent_id,$name)
    {
       $data = array(           
            'parent_id' => $parent_id,
            'category_name' => $name,
       ); 
       $this->insert($data);
    }
    
    public function updateCategory($id, $parent_id, $name)
    {
        $id = (int)$id;
        $query = "UPDATE products_category SET parent_id =" .$parent_id.", category_name ='".$name."' WHERE product_category_id = '".$id."'";
        $this ->getAdapter() -> query ($query);
    }
    
    public function deleteCategory($id)
    {
        $this->delete('product_category_id = '.(int)$id);
    }
    
    public function showCategory()
    {
        $categorys = $this -> fetchAll();
        $category_list = array("0" => "---------------------");
        foreach ($categorys as $category){
            $category_list[$category->product_category_id] = $category->category_name;
        }
        return $category_list;  
    }
}

