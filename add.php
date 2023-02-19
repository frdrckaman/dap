<?php
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
$validate = new validate();
$successMessage = null;
$pageError = null;
$errorMessage = null;
if ($user->isLoggedIn()) {
    if (1 == 1){
        if (Input::exists('post')) {
            if($_GET['id'] == 1){
                if (Input::get('add_permission')) {
                    $validate = new validate();
                    $validate = $validate->check($_POST, array(

                    ));
					switch(Input::get('title_id')){
						case 1:
							$power=1;$accessLevel=1;
							break;
						case 2:
							$power=1;$accessLevel=2;
							break;
						case 3:
							$power=0;$accessLevel=3;
							break;
						case 4:
							$power=0;$accessLevel=4;
							break;
						case 5:
							$power=0;$accessLevel=5;
							break;
						default:
							$power=0;$accessLevel=0;
							break;
					}
                    if ($validate->passed()) {

                        try {
                            $user->updateRecord('user', array(
                                'power' => $power,
								'accessLevel' => $accessLevel,
                            ),Input::get('staff_id'));
                            $successMessage = 'User Permission Updated Successful';
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }
                    } else {
                        $pageError = $validate->errors();
                    }
                }
            }elseif ($_GET['id'] == 2){
                
            }elseif ($_GET['id'] == 3){
               
            }elseif ($_GET['id'] == 4){
               
            }elseif ($_GET['id'] == 5){
              
            }elseif ($_GET['id'] == 6){
				
            }elseif ($_GET['id'] == 7){
				
            }elseif ($_GET['id'] == 8){

            }elseif ($_GET['id'] == 9){

            }elseif ($_GET['id'] == 10){

            }elseif ($_GET['id'] == 11){

            }elseif ($_GET['id'] == 12){

            }elseif ($_GET['id'] == 2){

            }elseif ($_GET['id'] == 2){

            }elseif ($_GET['id'] == 2){

            }
        }
    }else {
        Redirect::to('dashboard.php');
    }
} else {
    Redirect::to('index.php');
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

    <title> DATACENTER PORTAL </title>

    <?php include 'head.php'?>
</head>
<body>
<div class="wrapper">

    <?php include 'header.php'?>

    <?php include 'menu.php'?>

    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li class="active">Dashboard</li>
            </ul>
            <ul class="buttons">
                <li>
                    <a href="#" class="link_bcPopupList"><span class="glyphicon glyphicon-user"></span><span class="text">Users list</span></a>
                    <div id="bcPopupList" class="popup">
                        <div class="head clearfix">
                            <div class="arrow"></div>
                            <span class="isw-users"></span>
                            <span class="name">List users</span>
                        </div>
                        <div class="body-fluid users">
                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">admin</a>
                                    <span>online</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-default" type="button">Add new</button>
                            <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
                        </div>
                    </div>

                </li>
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="glyphicon glyphicon-search"></span><span class="text">Search</span></a>
                    <div id="bcPopupSearch" class="popup">
                        <div class="head clearfix">
                            <div class="arrow"></div>
                            <span class="isw-zoom"></span>
                            <span class="name">Search</span>
                        </div>
                        <div class="body search">
                            <input type="text" placeholder="Some text for search..." name="search"/>
                        </div>
                        <div class="footer">
                            <button class="btn btn-default" type="button">Search</button>
                            <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="workplace">
            <div class="row">
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
                <?php if($_GET['id'] == 1){?>
                   <div class="col-md-offset-1 col-md-8">
                        <div class="head clearfix">
                            <div class="isw-ok"></div>
                            <h1>Add User Permission</h1>
                        </div>
                        <div class="block-fluid">
                            <form id="validation" method="post">
                                <div class="row-form clearfix">
                                    <div class="col-md-3">Staff:</div>
                                    <div class="col-md-9">
                                        <select name="staff_id" id="s2_1" style="width: 100%;" required>
                                            <option value="">Choose Staff...</option>
                                            <?php foreach ($override->getData('user') as $staff){?>
                                                <option value="<?=$staff['id']?>"><?=$staff['username']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row-form clearfix">
                                    <div class="col-md-3">Title:</div>
                                    <div class="col-md-9">
                                        <select name="title_id" style="width: 100%;" required>
                                            <option value="">Choose Title...</option> 
											<option value="1">Manager</option> 
											<option value="2">Team Leader</option> 
											<option value="3">Datacenter</option> 
											<option value="4">DBA</option> 
											<option value="5">Application</option> 
											<option value="0">Others</option> 
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="footer tar">
                                    <input type="submit" name="add_permission" value="Submit" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }elseif ($_GET['id'] == 2){?>
                    
                <?php }elseif ($_GET['id'] == 3){?>
                    
                <?php }elseif ($_GET['id'] == 4){?>
                    
                <?php }elseif ($_GET['id'] == 5){?>
                    
                <?php }elseif ($_GET['id'] == 6){?>
					
                <?php }elseif ($_GET['id'] == 7){?>
					
                <?php }elseif ($_GET['id'] == 8){?>
	
                <?php }elseif ($_GET['id'] == 9){?>

                <?php }elseif ($_GET['id'] == 10){?>

                <?php }elseif ($_GET['id'] == 11){?>

                <?php }elseif ($_GET['id'] == 12){?>
				
				<?php }elseif ($_GET['id'] == 13){?>
				
				<?php }elseif ($_GET['id'] == 14){?>
				
				<?php }elseif ($_GET['id'] == 15){?>
				
				<?php }elseif ($_GET['id'] == 16){?>
				
				<?php }elseif ($_GET['id'] == 17){?>

                <?php }?>

                <div class="dr"><span></span></div>

            </div>

        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
