<?php

class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract 
{
    
    public function loggedInAs()
    {
        $auth = Zend_Auth::getInstance();
        
        if ($auth-> hasIdentity()){
            $username = $auth -> getIdentity() -> name; 
            $logoutUrl = $this -> view -> url (array('controller' => 'login',
                                                     'action' => 'logout'),null,true);
            
            return 'Welcome '.$username. '.<a href="'.$logoutUrl. '">Logout</a>';
        }
        
        
        // if the current page is /login/index, ask user to login
        
        $request = Zend_Controller_Front::getInstance() -> getRequest();
        
        $controller = $request->getControllerName();
        $action = $request-> getActionName();
        
        if($controller == 'login' && $action == 'index'){
            return '';
            
        }
        
        $loginUrl = $this -> view -> url (array('controller' => 'login', 'action' => 'index'));
        return '<a href="'.$loginUrl. '">Login</a>';
    }
}

?>
