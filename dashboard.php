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
	//$email->sendEmail('fredrick.amani@stanbic.co.tz', 'Alert Test');
	if (Input::get('approve_request')) {
            $validate = new validate();
            $validate = $validate->check($_POST, array(
                   
            ));
            if ($validate->passed()) {
               
                try {
					$user->updateRecord('request', array(
						'status' => 1,
						'approval_date' => date('Y-m-d'),
						'approval_comment' => Input::get('comments'),
						'approval_id' => $user->data()->id,
						),Input::get('id'));
                    $successMessage = 'Checklist Updated Successful';
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                $pageError = $validate->errors();
            }
        }elseif(Input::get('decline_request')){
			try {
					$user->updateRecord('request', array(
						'status' => 2,
						'approval_comment' => Input::get('comments'),
						'approval_date' => date('Y-m-d'),
						'approval_id' => $user->data()->id,
						),Input::get('id'));
                    $successMessage = 'Checklist Updated Successful';
                } catch (Exception $e) {
                    die($e->getMessage());
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
    <div class="wrapper"> 
            
        <?php include 'header.php'?>

        <?php include 'menu.php'?>

        <div class="content">


            <div class="breadLine">

                <ul class="breadcrumb">
                    <li><a href="#">Simple Admin</a> <span class="divider"></span></li>                
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
                    <div class="col-md-12">

                        <div class="widgetButtons">                        
                            <div class="bb"><a href="request.php" class="tipb" title="Add"><span class="ibw-edit"></span></a></div>
                            <div class="bb">
                                <a href="#" class="tipb" title="Upload"><span class="ibw-folder"></span></a>
                                <div class="caption red">31</div>
                            </div>
                            <div class="bb"><a href="request.php" class="tipb" title="Add new"><span class="ibw-plus"></span></a></div>
                            <div class="bb"><a href="#" class="tipb" title="Add to favorite"><span class="ibw-favorite"></span></a></div>
                            <div class="bb">
                                <a href="#" class="tipb" title="Send mail"><span class="ibw-mail"></span></a>
                                <div class="caption green">31</div>
                            </div>
                            <div class="bb"><a href="#" class="tipb" title="Settings"><span class="ibw-settings"></span></a></div>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">                    
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>Pending Approvals</h1>
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
                                    <th width="15%">Visitor Name</th>
                                    <th width="40%">Visitor Reason</th>
									<th width="10%">Status</th>
									<th width="10%">Time Extension</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php if($user->data()->power == 1){$data=$override->get('request', 'status', 0);$time=$override->get('time_extension', 'status', 0);}
								else{$data=$override->getNews('request', 'staff_id', $user->data()->id, 'status', 0);$time=$override->getNews('time_extension', 'staff_id', $user->data()->id, 'status', 0);} 
								foreach($data as $request){if($request['approval_id']){$staff=$override->get('user', 'id', $request['approval_id'])[0]['username'];}?>
									   <tr>
											<td><input type="checkbox" name="checkbox" /></td>
											<td><?=$request['visitor_name']?></td>
											<td><?=$request['textarea']?></td>
											<td>
												<?php if($request['status'] == 1){?>
												<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($request['status'] == 2) { ?>
												<a href="#" role="button" class="btn btn-danger" >Declined</a>
												<?php }else {?>
												<a href="#" role="button" class="btn btn-warning" >Pending</a>
												<?php }?>
										
											</td>
											<td>
												<?php if($time){if($time[0]['status']==1){?>
													<a href="#extend<?=$request['id']?>" role="button" class="btn btn-info" data-toggle="modal">Extend Time</a>
												<?php }}?>
											</td>
											<td>
												<a href="#view<?=$request['id']?>" role="button" class="btn btn-default" data-toggle="modal">View</a>
												<?php if($user->data()->power == 1){?>
													<a href="#approve<?=$request['id']?>" role="button" class="btn btn-success" data-toggle="modal" <?php if($request['status'] == 1){echo 'disabled';}else{echo '';}?>>Approve</a>
													<a href="#decline<?=$request['id']?>" role="button" class="btn btn-danger" data-toggle="modal"  <?php if($request['status'] == 1){echo 'disabled';}else{echo '';}?>>Decline</a>
												<?php }?>
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
																		<div class="col-md-3">Location:</div>
																		<div class="col-md-9">
																			<input class="validate[required]" value="<?=$request['location']?>" type="text" name="location" id="location" disabled/>
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
															<?php if($request['approval_comment']){?>
																<p style='color: red;'>This was inital decline by <strong><?=$staff?></strong> with reason : <strong><?=$request['approval_comment']?></strong></p>
															<?php }?>
															<p style='color: orange;'><strong>Are you sure you want to approve this request?</strong></p>
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
															<h4>Decline Request</h4>
														</div>
														
														<div class="row-form clearfix">
															<div class="col-md-3">Comments:</div>
																<div class="col-md-9">
																   <textarea name="comments" placeholder="Reason for decline..." required></textarea>
																</div>
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
										<div class="modal fade" id="extend<?=$request['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<form method="post">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4>Extend Time for the Visitor</h4>
														</div>
														<div class="modal-body modal-body-np">
															<div class="row">
																<div class="block-fluid">
																	
																	<div class="row-form clearfix">
																		<div class="col-md-3">Start Time:</div>
																		<div class="col-md-9">
																			<input value="" class="validate[required]" type="text" name="start_time" id="start_time" />
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
																		   <textarea name="reasons" placeholder="Reason for extending time..." ></textarea>
																		</div>
																	</div>
																	<div class="dr"><span></span></div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="hidden" name="id" value="<?=$request['id']?>">
																<input type="submit" name="extend_time" value="Submit" class="btn btn-success">
																<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
															</div>
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

                </div>

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
