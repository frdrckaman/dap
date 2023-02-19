<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ERROR | E_PARSE);
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
$validate = new validate();
$successMessage = null;
$pageError = null;
$errorMessage = null;
if ($user->isLoggedIn() ) {
	if (Input::exists('post')) {
		if(Input::get('search_checklist')){
			$checklist_date=Input::get('checklist_date');
            $successMessage = 'Checklist Searched Successful';
			
		}
        if (Input::get('ora_dba')) {
            $validate = new validate();
            $validate = $validate->check($_POST, array(
                   
            ));
            if ($validate->passed()) {
               
                try {
					if($user->data()->accessLevel == 1){
						$user->updateRecord('ora_dba_checklist', array(
							'status' => Input::get('approve'),
							'it_manager_date' => date('Y-m-d'),
							'it_manager_id' => $user->data()->id,
						),Input::get('id'));
					
					}elseif($user->data()->accessLevel == 2){
						$user->updateRecord('ora_dba_checklist', array(
							'status' => Input::get('approve'),
							'approved_date' => date('Y-m-d'),
							'approver_id' => $user->data()->id,
							'approver_comment'=>Input::get('comments'),
							'approved_timestamp' => date('Y-m-d h:i:s'),
						),Input::get('id'));
					}
                    $successMessage = 'Checklist Updated Successful';
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                $pageError = $validate->errors();
            }
        }elseif(Input::get('sql_dba')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('sql_dba_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('sql_dba_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('fin_eoy')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('fin_eoy_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('fin_eoy_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('ena')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('ena_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('ena_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('patch')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('patch_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('patch_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('sparrow_eod')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('sparrow_eod_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('sparrow_eod_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('sparrow_weekly')){
			
			if($user->data()->accessLevel == 1){
				$user->updateRecord('sparrow_weekly_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('sparrow_weekly_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('datacentre_facility')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('datacentre_facility_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('datacentre_facility_checklist', array(
                'status' => Input::get('approve'),
				'approved_date' => date('Y-m-d'),					
				'approver_id' => $user->data()->id,
				'approver_comment'=>Input::get('comments'),
				'approved_timestamp' => date('Y-m-d h:i:s'),
             ),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('netbackup_prd')){
			if($user->data()->accessLevel == 2){
				$user->updateRecord('netbackup_prd_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('netbackup_prd_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('sod')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('sod_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('sod_checklist', array(
                'status' => Input::get('approve'),
				'approved_date' => date('Y-m-d'),					
				'approver_id' => $user->data()->id,
				'approver_comment'=>Input::get('comments'),
				'approved_timestamp' => date('Y-m-d h:i:s'),
             ),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('dr_restore')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('dr_restore_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('dr_restore_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('finacle_eod')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('finacle_eod_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('finacle_eod_checklist', array(
					'status' => Input::get('approve'),
					'approved_date' => date('Y-m-d'),					
					'approver_id' => $user->data()->id,
					'approver_comment'=>Input::get('comments'),
					'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
			
		}elseif(Input::get('ods_eod')){
			if($user->data()->accessLevel == 1){
				$user->updateRecord('ods_eod_checklist', array(
					'status' => Input::get('approve'),
					'it_manager_date' => date('Y-m-d'),
					'it_manager_id' => $user->data()->id,
				),Input::get('id'));
			}elseif($user->data()->accessLevel == 2){
				$user->updateRecord('ods_eod_checklist', array(
						'status' => Input::get('approve'),
						'approved_date' => date('Y-m-d'),					
						'approver_id' => $user->data()->id,
						'approver_comment'=>Input::get('comments'),
						'approved_timestamp' => date('Y-m-d h:i:s'),
				),Input::get('id'));
			}
			
            $successMessage = 'Checklist Updated Successful';
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
						<div class="col-md-12">
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>Today Checklist</h1>
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
                                    <th width="40%">Checklist Name</th>
									<th width="20%">Status</th>
									<?php if($user->data()->power == 1){?>
										<th width="20%">Action</th>
									<?php }?>
                                </tr>
                                </thead>
                                <tbody>
								
									<tr>
										<td> ORACLE DBA Checklist </td>
										<td>
											<?php $ora_dba=$override->get('ora_dba_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($ora_dba){if($ora_dba['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ora_dba['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($ora_dba['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a> <p><?=$ora_dba['it_manager_comment']?></p>
												<?php }elseif($ora_dba['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($ora_dba){if($user->data()->accessLevel == 2 && $ora_dba['status']==2){?>
												<a href="#ora_dba<?=$ora_dba['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $ora_dba['status']==4){?>
												<a href="#ora_dba<?=$ora_dba['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="ora_dba<?=$ora_dba['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$ora_dba['id']?>">
																	<input type="submit" name="ora_dba" value="Approve" class="btn btn-success" <?php if($ora_dba['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> SQL DBA Checklist </td>
										<td>
											<?php $sql_dba=$override->get('sql_dba_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($sql_dba){if($sql_dba['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sql_dba['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($sql_dba['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($sql_dba['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($sql_dba){if($user->data()->accessLevel == 2 && $sql_dba['status']==2){?>
												<a href="#sql_dba<?=$sql_dba['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $sql_dba['status']==4){?>
												<a href="#sql_dba<?=$sql_dba['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="sql_dba<?=$sql_dba['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$sql_dba['id']?>">
																	<input type="submit" name="sql_dba" value="Approve" class="btn btn-success" <?php if($sql_dba['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> Finacle EOY Checklist </td>
										<td>
											<?php $fin_eoy=$override->get('fin_eoy_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($fin_eoy){if($fin_eoy['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($fin_eoy['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($fin_eoy['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($fin_eoy['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($fin_eoy){if($user->data()->accessLevel == 2 && $fin_eoy['status']==2){?>
												<a href="#fin_eoy<?=$fin_eoy['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $fin_eoy['status']==4){?>
												<a href="#fin_eoy<?=$fin_eoy['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="fin_eoy<?=$fin_eoy['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$fin_eoy['id']?>">
																	<input type="submit" name="fin_eoy" value="Approve" class="btn btn-success" <?php if($fin_eoy['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> ENA Checklist </td>
										<td>
											<?php $ena=$override->get('ena_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($ena){if($ena['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ena['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($ena['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($ena['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($ena){if($user->data()->accessLevel == 2 && $ena['status']==2){?>
												<a href="#ena<?=$ena['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $ena['status']==4){?>
												<a href="#ena<?=$ena['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="ena<?=$ena['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$ena['id']?>">
																	<input type="submit" name="ena" value="Approve" class="btn btn-success" <?php if($ena['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> Patch Deployment Checklist-PRD </td>
										<td>
											<?php $patch=$override->get('patch_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($patch){if($patch['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($patch['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($patch['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($patch['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($patch){if($user->data()->accessLevel == 2 && $patch['status']==2){?>
												<a href="#patch<?=$patch['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $patch['status']==4){?>
												<a href="#patch<?=$patch['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="patch<?=$patch['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$patch['id']?>">
																	<input type="submit" name="patch" value="Approve" class="btn btn-success" <?php if($patch['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td>Sparrow EOD Checklist</td>
										<td>
											<?php $sparrow_eod=$override->get('sparrow_eod_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($sparrow_eod){if($sparrow_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sparrow_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($sparrow_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($sparrow_eod['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($sparrow_eod){if($user->data()->accessLevel == 2 && $sparrow_eod['status']==2){?>
												<a href="#sparrow_eod<?=$sparrow_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $sparrow_eod['status']==4){?>
												<a href="#sparrow_eod<?=$sparrow_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="sparrow_eod<?=$sparrow_eod['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$sparrow_eod['id']?>">
																	<input type="submit" name="sparrow_eod" value="Approve" class="btn btn-success" <?php if($sparrow_eod['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> Sparrow Weekly Maintenance Checklist</td>
										<td>
											<?php $sparrow_weekly=$override->get('sparrow_weekly_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($sparrow_weekly){if($sparrow_weekly['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sparrow_weekly['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Team Leader Approval</a>
												<?php }elseif($sparrow_weekly['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($sparrow_weekly['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											
											<?php if($sparrow_weekly){if($user->data()->accessLevel == 2 && $sparrow_weekly['status']==2){?>
												<a href="#sparrow_weekly<?=$sparrow_weekly['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $sparrow_weekly['status']==4){?>
												<a href="#sparrow_weekly<?=$sparrow_weekly['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="sparrow_weekly<?=$sparrow_weekly['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$sparrow_weekly['id']?>">
																	<input type="submit" name="sparrow_weekly" value="Approve" class="btn btn-success" <?php if($sparrow_weekly['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td>Datacentre Facility Checklist</td>
										<td>
											<?php $datacentre_facility=$override->get('datacentre_facility_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($datacentre_facility){if($datacentre_facility['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($datacentre_facility['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning"> Team Leader Approval</a>
												<?php }elseif($datacentre_facility['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($datacentre_facility['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($datacentre_facility){if($user->data()->accessLevel == 2 && $datacentre_facility['status']==2){?>
												<a href="#datacentre_facility<?=$datacentre_facility['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $datacentre_facility['status']==4){?>
												<a href="#datacentre_facility<?=$datacentre_facility['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="datacentre_facility<?=$datacentre_facility['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$datacentre_facility['id']?>">
																	<input type="submit" name="datacentre_facility" value="Approve" class="btn btn-success" <?php if($datacentre_facility['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> Daily Backups (Netbackup PRD) Checklist</td>
										<td>
											<?php $netbackup_prd=$override->get('netbackup_prd_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($netbackup_prd){if($netbackup_prd['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($netbackup_prd['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($netbackup_prd['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($netbackup_prd['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($netbackup_prd){if($user->data()->accessLevel == 2 && $netbackup_prd['status']==2){?>
												<a href="#netbackup_prd<?=$netbackup_prd['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $netbackup_prd['status']==4){?>
												<a href="#netbackup_prd<?=$netbackup_prd['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="netbackup_prd<?=$netbackup_prd['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$netbackup_prd['id']?>">
																	<input type="submit" name="netbackup_prd" value="Approve" class="btn btn-success" <?php if($netbackup_prd['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td> SOD Checklist </td>
										<td>
											<?php $sod=$override->get('sod_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($sod){if($sod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($sod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($sod['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($sod){if($user->data()->accessLevel == 2 && $sod['status']==2){?>
												<a href="#sod<?=$sod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $sod['status']==4){?>
												<a href="#sod<?=$sod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="sod<?=$sod['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$sod['id']?>">
																	<input type="submit" name="sod" value="Approve" class="btn btn-success" <?php if($sod['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td>DR Restore Weekly Checklist</td>
										<td>
											<?php $dr_restore=$override->get('dr_restore_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($dr_restore){if($dr_restore['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($dr_restore['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($dr_restore['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a> <strong><p style="color:orange;font-weight:bplder"><?=$dr_restore['it_manager_comment']?></p></strong>
												<?php }elseif($dr_restore['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($dr_restore){if($user->data()->accessLevel == 2 && $dr_restore['status']==2){?>
												<a href="#dr_restore<?=$dr_restore['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $dr_restore['status']==4){?>
												<a href="#dr_restore<?=$dr_restore['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="dr_restore<?=$dr_restore['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$dr_restore['id']?>">
																	<input type="submit" name="dr_restore" value="Approve" class="btn btn-success" <?php if($dr_restore['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td>Finacle EOD Checklist</td>
										<td>
											<?php $finacle_eod=$override->get('finacle_eod_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($finacle_eod){if($finacle_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($finacle_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($finacle_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($finacle_eod['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($finacle_eod){if($user->data()->accessLevel == 2 && $finacle_eod['status']==2){?>
												<a href="#finacle_eod<?=$finacle_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $finacle_eod['status']==4){?>
												<a href="#finacle_eod<?=$finacle_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="finacle_eod<?=$finacle_eod['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$finacle_eod['id']?>">
																	<input type="submit" name="finacle_eod" value="Approve" class="btn btn-success" <?php if($finacle_eod['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>
									</tr>
									<tr>
										<td>ODS Checklist for EOD</td>
										<td>
											<?php $ods_eod=$override->get('ods_eod_checklist', 'checklist_date', date('Y-m-d'))[0];
												if($ods_eod){if($ods_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ods_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" > Team Leader Approval</a>
												<?php }elseif($ods_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }elseif($ods_eod['status'] == 4){?>
													<a href="#" role="button" class="btn btn-warning" >IT Manager Approval</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										<?php if($user->data()->power == 1){?>
											<td>
											<?php if($ods_eod){if($user->data()->accessLevel == 2 && $ods_eod['status']==2){?>
												<a href="#ods_eod<?=$ods_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }elseif($user->data()->accessLevel == 1 && $ods_eod['status']==4){?>
												<a href="#ods_eod<?=$ods_eod['id']?>" role="button" class="btn btn-default" data-toggle="modal">Approve</a>
											<?php }}?>
												<div class="modal fade" id="ods_eod<?=$ods_eod['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<form method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																	<h4>Approve Request</h4>
																</div>
																
																<div class="row-form clearfix">
																	<div class="col-md-3">Approval</div>
																	<div class="col-md-9">
																		<select name="approve" style="width: 100%;" required>
																			<option value="">Select</option>
																			<option value="<?php if($user->data()->accessLevel==1){echo'1';}elseif($user->data()->accessLevel==2){echo '4';}?>">Approve</option>
																			<option value="3">Reject</option>
																		</select>
																	</div>
																</div>
																<div class="row-form clearfix">
																	<div class="col-md-3">Comments:</div>
																	<div class="col-md-9">
																	   <textarea name="comments" placeholder="Additional comments..."></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?=$ods_eod['id']?>">
																	<input type="submit" name="ods_eod" value="Approve" class="btn btn-success" <?php if($ods_eod['status'] == 1){echo 'disabled';}else{echo '';}?>>
																	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</td>
										<?php }?>										
									</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<?php }elseif($_GET['id'] == 2){?>
						<div class="col-md-12">
						<div class="head clearfix">
                            <div class="isw-ok"></div>
                            <h1>Search by Date</h1>
						</div>
                        <div class="block-fluid">
							<form id="validation" method="post">
								<div class="row-form clearfix">
									<div class="col-md-1">Date:</div>
									<div class="col-md-4">
										<input value="" class="validate[required,custom[date]]" type="text" name="checklist_date" id="checklist_date" />
									</div>
									<div class="col-md-2">
										<input type="submit" name="search_checklist" value="Search" class="btn btn-info">
									</div>
								</div>
						</form>
						</div>
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>Checklist History</h1>
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
                            <?php if($checklist_date){?>
								<table cellpadding="0" cellspacing="0" width="100%" class="table">
                                <thead>
                                <tr>
                                    <th width="20%">Checklist Name</th>
									<th width="10%">Date</th>
									<th width="10%">Performed By</th>
									<th width="10%">Team Leader Approved</th>
									<th width="10%">IT Manager Approved</th>
									<th width="30%">Comments</th>
									<th width="20%">Status</th>
									
                                </tr>
                                </thead>
                                <tbody>
								
									<tr>
									<?php $ora_dba=$override->get('ora_dba_checklist', 'checklist_date',$checklist_date)[0];?>
										<td> ORACLE DBA Checklist </td>
										<td><?=$ora_dba['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $ora_dba['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ora_dba['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ora_dba['it_manager_id'])[0]['username'] ?></td>
										<td><?=$ora_dba['approver_comment'] ?></td>
										<td>
											<?php if($ora_dba){if($ora_dba['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ora_dba['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($ora_dba['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
									</tr>
									<tr>
										<?php $sql_dba=$override->get('sql_dba_checklist', 'checklist_date',$checklist_date)[0];?>
										<td> SQL DBA Checklist </td>
										<td><?=$sql_dba['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $sql_dba['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sql_dba['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sql_dba['it_manager_id'])[0]['username'] ?></td>
										<td><?=$sql_dba['approver_comment'] ?></td>
										<td>
											<?php if($sql_dba){if($sql_dba['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sql_dba['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($sql_dba['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
									<?php $fin_eoy=$override->get('fin_eoy_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> Finacle EOY Checklist </td>
										<td><?=$fin_eoy['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $fin_eoy['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $fin_eoy['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $fin_eoy['it_manager_id'])[0]['username'] ?></td>
										<td><?=$fin_eoy['approver_comment'] ?></td>
										<td>
											<?php if($fin_eoy){if($fin_eoy['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($fin_eoy['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($fin_eoy['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $ena=$override->get('ena_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> ENA Checklist </td>
										<td><?=$ena['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $ena['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ena['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ena['it_manager_id'])[0]['username'] ?></td>
										<td><?=$ena['approver_comment'] ?></td>
										<td>
											<?php if($ena){if($ena['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ena['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($ena['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $patch=$override->get('patch_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> Patch Deployment Checklist-PRD </td>
										<td><?=$patch['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $patch['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $patch['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $patch['it_manager_id'])[0]['username'] ?></td>
										<td><?=$patch['approver_comment'] ?></td>
										<td>
											<?php if($patch){if($patch['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($patch['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($patch['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $sparrow_eod=$override->get('sparrow_eod_checklist', 'checklist_date', $checklist_date)[0];?>
										<td>Sparrow EOD Checklist</td>
										<td><?=$sparrow_eod['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_eod['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_eod['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_eod['it_manager_id'])[0]['username'] ?></td>
										<td><?=$sparrow_eod['approver_comment'] ?></td>
										<td>
											<?php if($sparrow_eod){if($sparrow_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sparrow_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($sparrow_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $sparrow_weekly=$override->get('sparrow_weekly_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> Sparrow Weekly Maintenance Checklist</td>
										<td><?=$sparrow_weekly['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_weekly['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_weekly['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sparrow_weekly['it_manager_id'])[0]['username'] ?></td>
										<td><?=$sparrow_weekly['approver_comment'] ?></td>
										<td>
											<?php if($sparrow_weekly){if($sparrow_weekly['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sparrow_weekly['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($sparrow_weekly['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $datacentre_facility=$override->get('datacentre_facility_checklist', 'checklist_date', $checklist_date)[0];?>
										<td>Datacentre Facility Checklist</td>
										<td><?=$datacentre_facility['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $datacentre_facility['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $datacentre_facility['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $datacentre_facility['it_manager_id'])[0]['username'] ?></td>
										<td><?=$datacentre_facility['approver_comment'] ?></td>
										<td>
											<?php if($datacentre_facility){if($datacentre_facility['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($datacentre_facility['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($datacentre_facility['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $netbackup_prd=$override->get('netbackup_prd_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> Daily Backups (Netbackup PRD) Checklist</td>
										<td><?=$netbackup_prd['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $netbackup_prd['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $netbackup_prd['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $netbackup_prd['it_manager_id'])[0]['username'] ?></td>
										<td><?=$netbackup_prd['approver_comment'] ?></td>
										<td>
											<?php if($netbackup_prd){if($netbackup_prd['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($netbackup_prd['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($netbackup_prd['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $sod=$override->get('sod_checklist', 'checklist_date', $checklist_date)[0];?>
										<td> SOD Checklist </td>
										<td><?=$sod['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $sod['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sod['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $sod['it_manager_id'])[0]['username'] ?></td>
										<td><?=$sod['approver_comment'] ?></td>
										<td>
											<?php if($sod){if($sod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($sod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($sod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $dr_restore=$override->get('dr_restore_checklist', 'checklist_date', $checklist_date)[0];?>
										<td>DR Restore Weekly Checklist</td>
										<td><?=$dr_restore['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $dr_restore['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $dr_restore['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $dr_restore['it_manager_id'])[0]['username'] ?></td>
										<td><?=$dr_restore['approver_comment'] ?></td>
										<td>
											<?php if($dr_restore){if($dr_restore['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($dr_restore['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($dr_restore['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $finacle_eod=$override->get('finacle_eod_checklist', 'checklist_date', $checklist_date)[0];?>
										<td>Finacle EOD Checklist</td>
										<td><?=$finacle_eod['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $finacle_eod['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $finacle_eod['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $finacle_eod['it_manager_id'])[0]['username'] ?></td>
										<td><?=$finacle_eod['approver_comment'] ?></td>
										<td>
											<?php if($finacle_eod){if($finacle_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($finacle_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($finacle_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
										
									</tr>
									<tr>
										<?php $ods_eod=$override->get('ods_eod_checklist', 'checklist_date', $checklist_date)[0];?>
										<td>ODS Checklist for EOD</td>
										<td><?=$ods_eod['checklist_date'] ?></td>
										<td><?=$override->get('user', 'id', $ods_eod['staff_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ods_eod['approver_id'])[0]['username'] ?></td>
										<td><?=$override->get('user', 'id', $ods_eod['it_manager_id'])[0]['username'] ?></td>
										<td><?=$ods_eod['approver_comment'] ?></td>
										<td>
											<?php if($ods_eod){if($ods_eod['status'] == 1){?>
													<a href="#" role="button" class="btn btn-success" >Approved</a>
												<?php }elseif($ods_eod['status'] == 2){?>
													<a href="#" role="button" class="btn btn-warning" >Waiting for Approval</a>
												<?php }elseif($ods_eod['status'] == 3){?>
													<a href="#" role="button" class="btn btn-danger" >Rejected</a>
												<?php }else {?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }}else{?>
													<a href="#" role="button" class="btn btn-default" >Not Done</a>
											<?php }?>
										</td>
																				
									</tr>
                                </tbody>
                            </table>
							<?php }?>
                        </div>
                    </div>
					<?php }?>
                <div class="dr"><span></span></div>
            </div>
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
