<?php
session_start();

$GLOBALS['config'] = array(
  'mysql' => array(
      'host' => 'localhost',
      'username' => '',
      'password' => '',
      'db' => 'ptzdap'
  	),
  'remember' =>array(
      'cookie_name' => 'hash',
      'cookie_expiry' => '3600'
  	),
  'session' =>array (
     'session_name' =>'user',
     'token_name' => 'token',
      'session_table' => 'tableName'
  	 )
);

spl_autoload_register(function($class){
	require_once 'php/classes/'.$class.'.php';
});
date_default_timezone_set("Africa/Nairobi");
//include_once 'php/functions/sanitize.php';
//include_once 'php/classes/OverideData.php';
//include_once 'php/classes/class.upload.php';
include_once "php/phpMailer/PHPMailer.php";
include_once "php/phpMailer/Exception.php";
include_once "php/phpMailer/SMTP.php";
include_once "php/phpMailer/POP3.php";
include_once "php/phpMailer/OAuth.php";


if(Cookie::exists(config::get('remember/cookie_name')) && !Session::exists(config::get('session/session_name'))){
$hash= Cookie::get(config::get('remember/cookie_name'));
$hashCheck = DB::getInstance()->get('user_session',array('hash','=',$hash));
if($hashCheck->count()){

 $user = new User($hashCheck->first()->user_id);
 $user->login();
 }
}