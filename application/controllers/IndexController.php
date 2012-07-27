<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
//      $this->view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
    }

    public function indexAction()
    {
      $this->view->assign('title','Blackhawk');
    }

    public function productAction()
    {
        $categories = new Application_Model_DbTable_ProductsCategory();
        $this->view->categories = $categories->fetchAll();     
               
    }

    public function stockupAction()
    {
        // action body
    }

    public function salesAction()
    {
        
    }

    public function reportsAction()
    {
        
    }

    public function logoutAction()
    {
        
    }

    public function productlistAction()
    {
        $id = $this ->_getParam('id',0);
        
        switch ($id){
            case 1:              
                $this-> _helper -> redirector( "list","surfboard" );
                break;
            case 2:
                $this-> _helper -> redirector( "list","fin" );
                break;
            case 3:
                $this-> _helper -> redirector( "list","wetsuit" );
                break;
            case 4:
                $this-> _helper -> redirector( "list","cover" );
                break;
            case 5: 
                $this-> _helper -> redirector( "list","fireplace" );
                break;
            case 6:
                $this-> _helper -> redirector( "list","tent" );
                break;
            case 7:
                $this-> _helper -> redirector( "list","table" );
                break;
            case 8:
                $this-> _helper -> redirector( "list","umbrela" );
                break;
            case 9:
                $this-> _helper -> redirector( "list","sleepingbag" );
                break;
            case 10:
                $this-> _helper -> redirector( "list","cookingset" );
                break;
            default:
               
        }        
                 
    }


}



