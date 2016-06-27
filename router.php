<?php
require_once 'Router.php';

$router = new Router($_SERVER['REQUEST_URI']);

$controller = $router->getController();
$method = $router->getMethod();
$file = __DIR__.'/application/controllers/'.$controller.'.php';

if(!file_exists($file)){
	echo '404';
	die();
}

require_once $file;

$instance = new $controller();
if(!method_exists($instance, $method)){
	echo "404";
	die();
}
//check permission first.
$mirror = new ReflectionClass($controller);
$mirror_method = $mirror->getMethod($method);
$comments = $mirror_method->getDocComment();

if($comments && preg_match("/@permissions (.+)/",$mirror_method->getDocComment(),$matches)){
	if(array_key_exists(1,$matches)){
		//check permission here.
		$permission = $matches[1];
		$permissions = explode(' ', $permission);
		$result = verify($permissions);
		if($result !== true){
			die("Error: " . $result['message']);
		}
	}
}

$instance->$method();
