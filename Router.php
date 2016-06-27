<?php

/**
 * Created by PhpStorm.
 * User: cyberkiller
 * Date: 6/27/16
 * Time: 8:57 AM
 */
class Router
{
	private $request_url;
	function __construct($request_url = null)
	{
		$this->request_url = $request_url;

	}
	public function getController(){
		if($this->request_url == '/')
			return 'Welcome';
		$request = explode('/',$this->request_url);
		return ucfirst($request[1]);
	}
	public function getMethod(){
		if($this->request_url == '/')
			return 'index';
		$request = explode('/',$this->request_url);
		return array_key_exists(2, $request)?$request[2]:'index';
	}

	public function setRequestUrl($request_url)
	{
		$this->request_url = $request_url;

		return $this;
	}
}