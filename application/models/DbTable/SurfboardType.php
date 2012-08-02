<?php

class Application_Model_DbTable_SurfboardType extends Zend_Db_Table_Abstract
{

    protected $_name = 'surfboard_type';

    public function getSurfboardType()
    {
        $types = $this -> fetchAll();
        $typelist = array();
        foreach ($types as $type){
            $typelist[$type->type_name] = $type->type_name;
        }
        return $typelist;
    }
}

