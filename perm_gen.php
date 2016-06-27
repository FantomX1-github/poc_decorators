<?php
/**
 * Created by PhpStorm.
 * User: cyberkiller
 * Date: 6/27/16
 * Time: 8:23 AM
 */
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = "example_key";
$token = array(
	"iss" => "http://example.org",
	"aud" => "http://example.com",
	"iat" => 1356999524,
	"nbf" => 1357000000,
	"permissions" => explode(',',$_GET['permissions']),
);

$jwt = JWT::encode($token, $key);
//$decoded = JWT::decode($jwt, $key, array('HS256'));
echo $jwt;