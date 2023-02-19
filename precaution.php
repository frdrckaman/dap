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
	if (Input::exists('post')) {print_r(Input::get('precaution'));
	
		if(Input::get('precaution')){
			if($override->getNews('precaution', 'user_id', $user->data()->id, 'comply_date', date('Y-m-d'))){
			Redirect::to('dashboard.php');
			}else{
				$user->createRecord('precaution', array(
                        'user_id' => $user->data()->id,
						'comply_date' =>  date('Y-m-d'),
						));
			Redirect::to('dashboard.php');
			}
		}else{
			$errorMessage = 'Please, you must comply to the datacenter precaution!';
		}
		
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
    
    <title>DATACENTER  PORTAL</title>

   <?php include 'head.php'?>
    
</head>
<body>
    
    <div class="loginBlock" id="login" style="display: block;">
        <h1><b>Datacenter Precautions</b></h1>
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
                <ul>
                    <li>No Smoking is allowed in the Datacenter.</li>
                    <li>No food is allowed in the Datacenter.</li>
                    <li>No bevarage is allowed in the datacenter.</li>
                    <li>No un-authorized access.</li>
                </ul>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-top: 5px;">
                            <label class="checkbox"><input name="precaution" type="checkbox" value="1"> I have read, understood and accept the above outlined precautions</label>
                        </div>
                    </div>
                    <div class="col-md-4 pull-right">
						<input type="hidden" name="id" value="1">
                        <input type="submit" class="btn btn-default btn-block">
						<!-- <a href='dashboard.html' class="btn btn-default btn-block">Submit</a> -->
                    </div>
                </div>
            </form>
            <div class="dr"><span></span></div>
        </div>
    </div>
    
</body>

</html>