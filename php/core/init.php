<?php
session_start();

$GLOBALS['config'] = array(
  'mysql' => array(
      'host' => 'localhost',
      'username' => 'dap',
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



if(Cookie::exists(config::get('remember/cookie_name')) && !Session::exists(config::get('session/session_name'))){
$hash= Cookie::get(config::get('remember/cookie_name'));
$hashCheck = DB::getInstance()->get('user_session',array('hash','=',$hash));
if($hashCheck->count()){

 $user = new User($hashCheck->first()->user_id);
 $user->login();
 }
}