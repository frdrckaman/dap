<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ERROR | E_PARSE);
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();$usr=null;
$email = new Email();$st=null;
$random = new Random();
$pageError = null;$successMessage = null;$errorM = false;$errorMessage = null;
if(!$user->isLoggedIn()) {
    if (Input::exists('post')) {
        if (Token::check(Input::get('token'))) {
			$username = Input::get('username');
            $validate = new validate();
            $validate = $validate->check($_POST, array(
                
            ));
            if ($validate->passed()) { 
                		
				$userCheck=$override->get('user', 'username', $username);
//					if(!$userCheck){
//						$user->createRecord('user', array(
//							'username' => Input::get('username'),
//						));
//					}
//					$login = $user->ldapLogin(Input::get('username'), Input::get('password'), 'user');
                    $login = $user->loginUser(Input::get('username'), Input::get('password'), 'user');
                       if ($login) { 
                           $lastLogin = $override->get('user','id',$user->data()->id);
                           if($lastLogin[0]['last_login'] == date('Y-m-d')){}else{
                               try {
                                   $user->updateRecord('user', array(
                                       'last_login' => date('Y-m-d H:i:s'),
                                       'count' => 0,
                                   ), $user->data()->id);
                               } catch (Exception $e) {}
                           }
                           try {
                               $user->updateRecord('user', array(
                                   'count' => 0,
                               ), $user->data()->id);
                           } catch (Exception $e) {}

                           Redirect::to('precaution.php');
                       }
                       else {
                           $usr=$override->get('user','username',Input::get('username'));
                           if($usr && $usr[0]['count'] < 3){
							  try {
								   $user->updateRecord('user', array(
								   'count' => $usr[0]['count'] + 1,
									), $usr[0]['id']);
									} catch (Exception $e) {
								}
                                $errorMessage = 'Wrong username or password';
                            }
                            else{
                                try {
                                    $user->updateRecord('user', array(
                                        'count' => $usr[0]['count'] + 1,
                                    ), $usr[0]['id']);
                                } catch (Exception $e) {
                                }
                                $email->deactivation($usr[0]['email_address'],$usr[0]['lastname'],'Account Deactivated');
                                $errorMessage = 'You Account have been deactivated,Someone was trying to access it with wrong credentials. Please contact your system administrator';
                            }
                        }
            } else {
                $pageError = $validate->errors();
            }
        }
    }
}else{
    Redirect::to('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>DATACENTER  PORTAL</title>

    <?php include 'head.php'?>
    
</head>
<body>
    
    <div class="loginBlock" id="login" style="display: block;">
		<h1 align=center><?php include 'img.php'?><br><b>DATACENTER  PORTAL</b></h1>
		<div class="dr"><span></span></div>
		<?php if($errorMessage){?>
			<div class="alert alert-danger">
			<h4>Error!</h4>
			<?=$errorMessage?>
			</div>
			<?php }elseif($pageError){?>
			<div class="alert alert-danger">
			<h4>Error!</h4>
			<?php foreach($pageError as $error){echo $error.' , ';}?>
			</div>
			<?php }elseif($successMessage){?>
			<div class="alert alert-success">
			<h4>Success!</h4>
			<?=$successMessage?>
			</div>
			<?php }?>
        <div class="loginForm">
            <form class="form-horizontal" action="" method="post" id="validation"><br>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="text" name="username" id="inputusername" placeholder="Username" class="form-control validate[required]"/>
                    </div>                
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control validate[required]"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <input type="hidden" name="token" value="<?=Token::generate();?>">
                    <input type="submit" value="Sign in" class="btn btn-default btn-block"><br>
                </div>
                </div>
            </form>  
            <div class="dr"><span></span></div>
		
        </div>
		<?php include 'sig.php'?>
    </div>
    
</body>

</html>