<?php

class Application_Model_DbTable_Supplier extends Zend_Db_Table_Abstract
{

    protected $_name = 'supplier';

    public function getSupplier($id){
        $supplier_id = (int)$id;
        $row = $this-> fetchRow("supplier_id=". $supplier_id);
        return $row -> toArray();
    }
    
    public function addSupplier($supplier_name, $contact_name, $phone, $address, $qq, $email){
        $data = array (
            "supplier_name" => $supplier_name,
            "contact_name" => $contact_name,
            "phone" => $phone,
            "address" => $address,
            "qq" => $qq,
            "email" => $email,
        );
        $this -> insert ($data);
    }
    
    public function editSupplier($id, $supplier_name, $contact_name, $phone, $address, $qq, $email){
        $data = array (
            "supplier_name" => $supplier_name,
            "contact_name" => $contact_name,
            "phone" => $phone,
            "address" => $address,
            "qq" => $qq,
            "email" => $email,
        );
        $this -> update($data, "supplier_id=".$id);
    }
    
    public function deleteSupplier($id){
        $this -> delete("supplier_id=".$id);
    }
}

