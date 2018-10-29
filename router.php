router
<?
public function add($route, $params = []){

    $route = preg_replace('/\//', '\\/', $route);
    $route = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[a-z-]+)', $route);
    $route = '/^' . $route . '$/i';
    $this->routes[$route] = $params;

}

public function assign($url){
  $url = $this->removeQueryVariables($url);
  if($this->matchURL($url)){
    $controller = $this->params['controller'];
    $controller = $this->studlyCapsConversion($controller);
    $controller = $this->getNamespace() . $controller;
    if(class_exists($controller)){
      $controller_obj = new $controller($this->params);
      $action = $this->params['action'];
      $action = $this->camelCaseConversion($action);
      if(is_callable([$controller_obj, $action])){
        $controller_obj->$action();
    	}
	}
  }
}
