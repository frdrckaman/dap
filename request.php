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
		if (!$user->data()->power == 1){
	    if (Input::exists('post')) {
        if (Input::get('add_user')) {
            $validate = new validate();
            $validate = $validate->check($_POST, array(
               
                
            ));
            if ($validate->passed()) {
               
                try {
                    $user->createRecord('request', array(
                        'requester_name' => Input::get('requester_name'),
                        'requester_id' => Input::get('requester_id'),
                        'department' => Input::get('department'),
                        'unit' => Input::get('unit'),
                        'visitor_name' => Input::get('visitor_name'),
						'visitor_org' => Input::get('visitor_org'),
						'visitor_phone' => Input::get('visitor_phone'),
						'visitor_email' => Input::get('visitor_email'),
						'visitor_address' => Input::get('visitor_address'),
						'start_date' => Input::get('start_date'),
						'start_time' => Input::get('start_time'),
						'end_date' => Input::get('end_date'),
						'end_time' => Input::get('end_time'),
						'textarea' => Input::get('textarea'),
                        'staff_id' => $user->data()->id,
                    ));
                    $successMessage = 'Request Created Successful';
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                $pageError = $validate->errors();
            }
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
    
    <title>DATACENTER  PORTAL</title>

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
                    <div class="col-md-offset-1 col-md-8">
                            <div class="head clearfix">
                                <div class="isw-ok"></div>
                                <h1>Add Request</h1>
                            </div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Requester Name:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="requester_name" id="requester_name" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Requester ID:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="requester_id" id="requester_id" />
                                        </div>
                                    </div>

                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Department</div>
                                        <div class="col-md-9">
                                            <select name="department" style="width: 100%;" required>
                                                <option value="">Select Department</option>
                                                <option value="IT">Information Technology (IT)</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Unit</div>
                                        <div class="col-md-9">
                                            <select name="unit" style="width: 100%;" required>
                                                <option value="">Select Unit</option>
                                                <option value="Application">Application</option>
                                                <option value="Datacenter">Datacenter</option>
                                                <option value="IT Channel">IT Channel</option>
                                                <option value="IT Peripheral">IT Peripheral</option>
                                                <option value="IT Security">IT Security</option>
                                                <option value="Real Estate">Real Estate</option>
                                                <option value="IT Infrastructure">IT Infrastructure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Visitor Name:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="visitor_name" id="visitor_name" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Visitor Organisation:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="visitor_org" id="visitor_org" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Visitor Phone Number:</div>
                                        <div class="col-md-9"><input value="" class="" type="text" name="visitor_phone" id="phone" required /> <span>Example: 0700 000 111</span></div>
                                    </div>

                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Visitor Email Address:</div>
                                        <div class="col-md-9"><input value="" class="validate[required,custom[email]]" type="text" name="visitor_email" id="email" /> <span>Example: someone@nowhere.com</span></div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Visitor Address:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="visitor_address" id="visitor_address" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Start Date:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required,custom[date]]" type="text" name="start_date" id="start_date" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Start Time:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="start_time" id="start_time" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">End Date:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required,custom[date]]" type="text" name="end_date" id="end_date" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">End Time:</div>
                                        <div class="col-md-9">
                                            <input value="" class="validate[required]" type="text" name="end_time" id="end_time" />
                                        </div>
                                    </div>
                                    <div class="row-form clearfix">
                                        <div class="col-md-3">Reasons:</div>
                                        <div class="col-md-9">
                                           <textarea name="textarea" placeholder="Reason for visit..."></textarea>
                                        </div>
                                    </div>

                                    <div class="footer tar">
                                        <input type="submit" name="add_user" value="Submit" class="btn btn-default">
                                    </div>

                                </form>
                            </div>

                </div>

                <div class="dr"><span></span></div>

            </div>

        </div>   
    </div>
</body>

</html>
