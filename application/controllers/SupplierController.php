<?php

class SupplierController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $suppliers = new Application_Model_DbTable_Supplier();
        $list = $suppliers ->fetchAll();
        $this -> view -> all = $list;
    }

    public function addAction()
    {
        $form = new Application_Form_Supplier();
        $form -> submit -> setLabel("Add");
        $this -> view -> form = $form;
        
        if($this -> getRequest() -> isPost()){
            $formData = $this -> getRequest() -> getPost();
            if ($form -> isValid($formData)){
                $supplier_name = $form -> getValue("supplier_name");
                $contact_name = $form -> getValue("contact_name");
                $phone = $form -> getValue("phone");
                $address = $form -> getValue('address');
                $qq = $form -> getValue('qq');
                $email = $form -> getValue('email');
                
                $supplier = new Application_Model_DbTable_Supplier();
                $supplier ->addSupplier($supplier_name, $contact_name, $phone, $address, $qq, $email);
                $this -> _helper -> redirector('index');               
            }
            else{
                $form -> populate($formData);
            }        
        }
    }

    public function editAction()
    {
       $form = new Application_Form_Supplier();
        $form -> submit -> setLabel("Update");
        $this -> view -> form = $form;
        
        if($this -> getRequest() -> isPost()){
            $formData = $this -> getRequest() -> getPost();
            if ($form -> isValid($formData)){
                $supplier_id = $form -> getValue("supplier_id");
                $supplier_name = $form -> getValue("supplier_name");
                $contact_name = $form -> getValue("contact_name");
                $phone = $form -> getValue("phone");
                $address = $form -> getValue('address');
                $qq = $form -> getValue('qq');
                $email = $form -> getValue('email');
                
                $supplier = new Application_Model_DbTable_Supplier();
                $supplier ->updateSupplier($supplier_id, $supplier_name, $contact_name, $phone, $address, $qq, $email);
                $this -> _helper -> redirector('index');               
            }
            else{
                $form -> populate($formData);
            }        
        }
        else {
            $id = $this-> _getParam('id',0);
            if ($id > 0){
                $supplier = new Application_Model_DbTable_Supplier();                
                $form -> populate($supplier -> getSupplier($id));
            }                        
        }
    }

   
     public function deleteAction()
    {
        if($this -> getRequest() -> isPost()) {
            $del = $this -> getRequest() -> getPost('del');
            if ($del == 'Yes') {
                $id = $this ->_getParam('id');
                $product = new Application_Model_DbTable_Supplier();
                $product -> deleteSupplier($id);
            }
            $this -> _helper -> redirector('index');
        }
        else{
            $id = $this ->_getParam('id',0);
            $product = new Application_Model_DbTable_Supplier();
            $this -> view -> product = $product -> getSupplier($id);
        }
    }

}







