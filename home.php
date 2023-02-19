<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();$usr=null;
$email = new Email();$st=null;
$random = new Random();
$pageError = null;$successMessage = null;$errorM = false;$errorMessage = null;
if(!$user->isLoggedIn()) {
    if (Input::exists('post')) {
        if (Token::check(Input::get('token'))) {
            $validate = new validate();
            $validate = $validate->check($_POST, array(
                'username' => array('required' => true),
                'password' => array('required' => true)
            ));
            if ($validate->passed()) {
                $st=$override->get('user','username',Input::get('username'));
                if($st){
                    if($st[0]['count'] >3){
                        $errorMessage = 'You Account have been deactivated,Someone was trying to access it with wrong credentials. Please contact your system administrator';
                    }
                    else{
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

                            Redirect::to('dashboard.php');
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
                    }
                }else{
                    $errorMessage = 'Invalid username, Please check your credentials and try again';
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
    <title> Login - HetaCov </title>
    <?php // include 'head.php'?>
</head>
<body>

<div class="loginBlock" id="login" style="display: block;">
    <h1>Welcome. Please Sign In</h1>
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
        <form class="form-horizontal" method="post" id="validation">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="text" name="username" id="inputEmail" placeholder="Username" class="form-control validate[required]"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control validate[required]"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group" style="margin-top: 5px;">
                        <label class="checkbox"><input type="checkbox"> Remember me</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden" name="token" value="<?=Token::generate();?>">
                    <input type="submit" value="Sign in" class="btn btn-default btn-block">
                </div>
            </div>
        </form>
        <div class="dr"><span></span></div>
        <div class="controls">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-link btn-block" onClick="loginBlock('#forgot');">Forgot password?</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="loginBlock" id="forgot">
    <h1>Forgot your password?</h1>
    <div class="dr"><span></span></div>
    <div class="loginForm">
        <form class="form-horizontal" method="post">
            <p>This form help you return your password. Please, enter your password, and send request</p>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="text" placeholder="Your email" class="form-control"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-default btn-block">Send request</button>
                </div>
            </div>
        </form>
        <div class="dr"><span></span></div>
        <div class="controls">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-link" onClick="loginBlock('#login');">&laquo; Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
