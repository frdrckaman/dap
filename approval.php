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
if ($user->isLoggedIn() and $user->data()->power ==1) {
	if (Input::exists('post')) {
        if (Input::get('approve_request')) {
            $validate = new validate();
            $validate = $validate->check($_POST, array(
               
                
            ));
            if ($validate->passed()) {
               
                try {
                    $user->updateRecord('request', array(
                        'status' => 1,
						'approval_date' => date('Y-m-d h:i:s'),
						'approval_id' => $user->data()->id,
                    ),Input::get('id'));
                    $successMessage = 'Request Approved Successful';
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                $pageError = $validate->errors();
            }
        }elseif(Input::get('decline_request')){
			$user->updateRecord('request', array(
                'status' => 2,
				'approval_date' => date('Y-m-d h:i:s'),
				'approval_id' => $user->data()->id,
			),Input::get('id'));
            $successMessage = 'Request Declined Successful';
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
    
    <title>Datacenter Access Portal</title>

    <?php include 'head.php'?>
    
</head>
<body>
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
                    <div class="col-md-12">
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>List of Request</h1>
                            <ul class="buttons">
                                <li><a href="#" class="isw-download"></a></li>
                                <li><a href="#" class="isw-attachment"></a></li>
                                <li>
                                    <a href="#" class="isw-settings"></a>
                                    <ul class="dd-list">
                                        <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                        <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                        <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="block-fluid">
                            <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall" /></th>
                                    <th width="15%">Requester Name</th>
                                    <th width="10%">Requester ID</th>
                                    <th width="15%">Visitor Name</th>
                                    <th width="30%">Visitor Reason</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach($override->get('request', 'status', 0) as $request){?>
									   <tr>
											<td><input type="checkbox" name="checkbox" /></td>
											<td><?=$request['requester_name']?></td>
											<td><?=$request['requester_id']?></td>
											<td><?=$request['visitor_name']?></td>
											<td><?=$request['textarea']?></td>
											<td>
												<a href="#view<?=$request['id']?>" role="button" class="btn btn-default" data-toggle="modal">View</a>
												<a href="#approve<?=$request['id']?>" role="button" class="btn btn-info" data-toggle="modal">Approve</a>
												<a href="#decline<?=$request['id']?>" role="button" class="btn btn-danger" data-toggle="modal">Decline</a>
											</td>
										</tr>
										<div class="modal fade" id="view<?=$request['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<form method="post">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4>View Request</h4>
														</div>
														<div class="modal-body modal-body-np">
															<div class="row">
																<div class="block-fluid">
																	<div class="row-form clearfix">
																		<div class="col-md-3">Requester Name:</div>
																		<div class="col-md-9">
																			<input class="validate[required]" value="<?=$request['requester_name']?>" type="text" name="requester_name" id="requester_name" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Requester ID:</div>
																		<div class="col-md-9">
																			<input class="validate[required]" value="<?=$request['requester_id']?>" type="text" name="requester_id" id="requester_id" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Department</div>
																		<div class="col-md-9">
																			<select name="department" style="width: 100%;" required>
																				<option value=""><?=$request['department']?></option>
																				
																			</select>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Unit</div>
																		<div class="col-md-9">
																			<select name="unit" style="width: 100%;" required>
																				<option value=""><?=$request['unit']?></option>
																			
																			</select>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Visitor Name:</div>
																		<div class="col-md-9">
																			<input class="validate[required]" value="<?=$request['visitor_name']?>" type="text" name="visitor_name" id="visitor_name" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Visitor Organisation:</div>
																		<div class="col-md-9">
																			<input class="validate[required]" value="<?=$request['visitor_org']?>" type="text" name="visitor_org" id="visitor_org" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Visitor Phone Number:</div>
																		<div class="col-md-9"><input value="<?=$request['visitor_phone']?>" class="" type="text" name="visitor_phone" id="phone" required disabled/> <span>Example: 0700 000 111</span></div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Visitor Email Address:</div>
																		<div class="col-md-9"><input value="<?=$request['visitor_email']?>" class="validate[required,custom[email]]" type="text" name="visitor_email" id="email" disabled/> <span>Example: someone@nowhere.com</span></div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Visitor Address:</div>
																		<div class="col-md-9">
																			<input value="<?=$request['visitor_address']?>" class="validate[required]" type="text" name="visitor_address" id="visitor_address" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Start Date:</div>
																		<div class="col-md-9">
																			<input value="<?=$request['start_date']?>" class="validate[required,custom[date]]" type="text" name="start_date" id="start_date" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Start Time:</div>
																		<div class="col-md-9">
																			<input value="<?=$request['start_time']?>" class="validate[required]" type="text" name="start_time" id="start_time" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">End Date:</div>
																		<div class="col-md-9">
																			<input value="<?=$request['end_date']?>" class="validate[required,custom[date]]" type="text" name="end_date" id="end_date" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">End Time:</div>
																		<div class="col-md-9">
																			<input value="<?=$request['end_time']?>" class="validate[required]" type="text" name="end_time" id="end_time" disabled/>
																		</div>
																	</div>
																	<div class="row-form clearfix">
																		<div class="col-md-3">Reasons:</div>
																		<div class="col-md-9">
																		   <textarea name="textarea" placeholder="Reason for visit..." disabled><?=$request['textarea']?></textarea>
																		</div>
																	</div>
																	<div class="dr"><span></span></div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="hidden" name="id" value="">
																<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="modal fade" id="approve<?=$request['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<form method="post">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4>Approve Request</h4>
														</div>
														<div class="modal-body">
															<p>Are you sure you want to approve this request</p>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id" value="<?=$request['id']?>">
															<input type="submit" name="approve_request" value="Approve" class="btn btn-success">
															<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="modal fade" id="decline<?=$request['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<form method="post">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4>Approve Decline</h4>
														</div>
														<div class="modal-body">
															<strong style="font-weight: bold;color: red">
																<p>Are you sure you want to decline this request</p>
															</strong>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id" value="<?=$request['id']?>">
															<input type="submit" name="decline_request" value="Decline" class="btn btn-danger">
															<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
														</div>
													</div>
												</form>
											</div>
										</div>
								<?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="dr"><span></span></div>
            </div>
            </div>
        </div>
    </div>
</body>

</html>
