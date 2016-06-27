<?php
/**
 * Created by PhpStorm.
 * User: cyberkiller
 * Date: 6/27/16
 * Time: 8:23 AM
 */
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;
function verify($permissions){
	$jwt = $_GET['jwt'];
	$key = "example_key";
	try{
		$decoded = JWT::decode($jwt, $key, array('HS256'));
	}catch (Exception $e){
		$data['status'] = false;
		$data['message'] = 'Data tampered with';
		return $data;
	}
	$permissions_missing = array_diff($permissions, $decoded->permissions);
	if(count($permissions_missing)>0){
		$data['status'] = false;
		$data['message'] = 'Missing permissions:' .implode(', ', $permissions_missing);
		return $data;
	}else{
		return true;
	}
}
