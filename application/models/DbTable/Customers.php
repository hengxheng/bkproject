<?php

class Application_Model_DbTable_Customers extends Zend_Db_Table_Abstract
{

    protected $_name = 'buyer';

    public function add($name, $postcode, $contact){
        $data = array(
            'name' => $name,
            'postcode' => $postcode,
            'contact' => $contact,
        );
        return $this -> insert($data);
    }
    
    public function getCustomer($id){
        $id = (int)$id;
        $row = $this-> fetchRow('buyer_id= '. $id);
        return $row -> toArray();
    }
}

