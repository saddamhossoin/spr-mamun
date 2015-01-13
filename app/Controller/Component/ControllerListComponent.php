<?php

class ControllerListComponent extends Component {

    public function getList(Array $controllersToExclude = array('PagesController')) {
        $controllersToExclude[] = 'AppController';
        $controllerClasses =  App::objects('Controller');
		 
		$controllerClasses = array_diff($controllerClasses, array('AppController'));
 		
        $result = array();

        foreach($controllerClasses as $controller) {
            $controllerName = str_replace('Controller', '', $controller);
            $result[$controller]['name'] = $controllerName;
            $result[$controller]['displayName'] = Inflector::humanize(Inflector::underscore($controllerName));
            $result[$controller]['actions'] = $this->getActions($controller);
        }

        return $result;
    }
    
    public function getcontrollerlist() {
        $controllers = $this->getList(array());
        $result = array();
        
        foreach( $controllers as $controller => $info ) {
            $result[$info['name']] = $info['displayName'];
        }
        
        return $result;
    }
    
    /**
     * Retrieves the list of actions of the given controller
     * 
     * @param string $controller_name Name of the controller whose actions are to be retrieved. Without the "Controller" suffix.
     * @return array
     */
    public function getactionlist($controller_name) {
        $controller_actions = $this->getActions($controller_name.'Controller');
        $ttl = count($controller_actions);
        $actions = array();
        
        for( $i = 0; $i < $ttl; $i++ ) {
            $actions[$controller_actions[$i]] = $controller_actions[$i];
        }
        
        return $actions;
    }
    
    public function get() {
        $controllers = $this->getList(array());
        $result = array();
        
        foreach( $controllers as $controller => $info ) {
            $result[$info['name']] = $info['actions'];
        }
        
        return $result;
    }

    private function getActions($controller) {
        App::uses($controller, 'Controller');
        $methods = get_class_methods($controller);
        $methods = $this->removeParentMethods($methods);
        $methods = $this->removePrivateActions($methods);

        return $methods;
    }

    private function removeParentMethods(Array $methods) {
        $appControllerMethods = get_class_methods('AppController');

        return array_diff($methods, $appControllerMethods);
    }

    private function removePrivateActions(Array $methods) {
        return $methods;
    }
}
