<?php

class Application_Model_DbTable_SupplyOrder extends Zend_Db_Table_Abstract
{

    protected $_name = 'supply_order';
 
    public function addOrder($order_date, $deposit, $finalpayment, $freight, $localfee, $supplier_id)
    {
        $data = array(
            'order_date' => $order_date,
            'deposit' => $deposit,
            'final_payment' => $finalpayment,
            'freight' => $freight,
            'local_fee' => $localfee,
            'supplier_id' => $supplier_id,
        );
        
        return $this -> insert($data);
    }
    
    public function getOrder($id)
    {
        $select = $this -> select() -> where('supply_order_id = ?',$id); 
        $rows = $this ->fetchAll($select);
        return $rows[0] -> toArray();
    }

}

