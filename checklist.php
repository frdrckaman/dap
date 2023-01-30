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
    
    <title> DATACENTER  PORTAL </title>

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
							<h4>Error!</h4><?=$errorMessage?>
						</div>
					<?php }elseif($pageError){?>
						<div class="alert alert-danger"><h4>Error!</h4>
						<?php foreach($pageError as $error){echo $error.' , ';}?>
						</div>
					<?php }elseif($successMessage){?>
						<div class="alert alert-success"><h4>Success!</h4>
							<?=$successMessage?>
						</div>
					<?php }?>
                    <?php if($_GET['id'] == 1){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Oracle DBA Checklist</h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_report" type="checkbox" value="1"> Send BizWize Daily reports to respective stakeholders
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="recon_auto" type="checkbox" value="1"> Recon Automation Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="crm_audit" type="checkbox" value="1"> CRM Audit Trail Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="recoveries_reports" type="checkbox" value="1"> Recoveries Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="credit_caet" type="checkbox" value="1"> Run Credit CAET Reports every 1st day of the Month
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_server_availability" type="checkbox" value="1"> ORACLE - Connect and confirm availability of database servers, if not available escalate to network team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_disk_space" type="checkbox" value="1"> ORACLE - Ensure there is enough disk space on the filesystems, if not backup and clear old files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_listener" type="checkbox" value="1"> ORACLE - Ensure listeners and their services are up and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_db_status" type="checkbox" value="1"> ORACLE - Ensure database Status is OPEN from gv$ instance view, if not investigate and start up the instance
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_db_space_archive" type="checkbox" value="1"> ORACLE - Ensure space for Archive Switching is available, if not backup and clear old archives.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_cluster" type="checkbox" value="1"> ORACLE - Ensure all Grid Infrastructure services from Cluster are online, if not investigate and start the Grid services
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_backup_config" type="checkbox" value="1"> ORACLE - Ensure backups are configured properly and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_backup_status" type="checkbox" value="1"> ORACLE - Confirm database backup completeness. If not completed/FAILED investigate and run the backups manually
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_users" type="checkbox" value="1"> ORACLE - Check if there are locked, expired and inactive users, if found investigate and action accordingly
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_table_space" type="checkbox" value="1"> ORACLE - Check if space used on permanent and temporary table spaces are below 80%, if not Increase tablespace
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_asm" type="checkbox" value="1"> ORACLE - Check the ASM disks on same disk group must have evenly distributed space usage, rebalance disks and or log an IR to have storage added to disk groups
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="oral_replication" type="checkbox" value="1"> ORACLE - Ensure database replication between Production and DR is running, if not running investigate and rectify accordingly
                                    </div>

                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 2){?>
						<div class="col-md-offset-1 col-md-8">
						<div class="head clearfix">
                            <div class="isw-ok"></div>
                            <h1>SQL DBA Checklist</h1>
                        </div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_backup_config" type="checkbox" value="1"> SQL - Ensure backups are configured properly and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_backup_status" type="checkbox" value="1"> SQL - Confirm database backup completeness. If not completed/FAILED investigate and run the backups manually
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_disk_space" type="checkbox" value="1"> SQL - Ensure there is enough disk space on the database servers, if not backup and clear old files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_availability" type="checkbox" value="1"> SQL - Connect and confirm availability of database servers, if not available escalate to network team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_users" type="checkbox" value="1"> SQL - Check if there are locked, expired and inactive users, if found investigate and action accordingly
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_sync" type="checkbox" value="1"> SQL - Ensure cluster servers are in sync between Production and DR
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_services" type="checkbox" value="1"> SQL - Ensure listeners and their services are up and running
                                    </div>
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 3){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Finacle EOY Checklist </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="mmf" type="checkbox" value="1"> NOTE: In the morning confirm MMF has been run successful
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow" type="checkbox" value="1"> Run Sparrow ATM EOD/EOY (ref: Atm eod ? procedure)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pct" type="checkbox" value="1"> Excute query to check table space for CUSTOM_TBLS, the PCT. Free should be >20%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cap" type="checkbox" value="1"> Check disk space for all disk in CAP and JAP servers used space should not be more than 80%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="fin" type="checkbox" value="1"> Restart Finacle services for PTZCORCAPW1 & PTZCORCAPW2 node by node
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gpod" type="checkbox" value="1"> Confirm GPOD EOD has run and and file received in TBMS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cheque" type="checkbox" value="1"> Confirm CHQENC (Cheque encashment) job has run in control m
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pricing" type="checkbox" value="1"> Confirm if there is no file in /gpfsfcb/prd/TZ/in/pricing. If there is a file backup in different, dirrectorry and delete the file in pricing directory after confirmation from pricing team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="tbms" type="checkbox" value="1"> Check the space on TBMS both nodes (df )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="services" type="checkbox" value="1"> CHECK ALL SERVICES ARE UP: (admin view option)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="bjs" type="checkbox" value="1"> Check all EOY jobs in BJS if they have correct dates (SELECT * FROM TBAADM.BJS WHERE JOB_FREG_TYPE='Y' AND DEL_FLG='N';)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="unfreeze" type="checkbox" value="1"> Unfreeze the suspence and income accounts to allow zerolisation (to be shared by application team)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="eoy" type="checkbox" value="1"> Confirm the EOY jobs are loaded with the correct dates
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="hbkcop" type="checkbox" value="1"> Hold the HBKCOP job before starting EOY and will be released once the pricing files are received
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="controlm" type="checkbox" value="1"> Start finacle EOY - from ControL'M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="caf" type="checkbox" value="1"> Confirm if there are 20 .dat files and 20 .done files in the path: /gpfssun/prd/tz/Mediation/CAF/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="det" type="checkbox" value="1"> Below commands must return a count of 20 (or more if an extra file was generated during the day) ls -lrt SUNPRIACCTDET*.dat | wc -l ls -lrt SUNPRIACCTDET*.dat.done | wc -l
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="wld" type="checkbox" value="1"> Hold TZ_EOD_JOB_GRP_007 job from control m and release when SNPRIBALANCEDWLD received under gpfsun/prd/Mediation/Bal/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="jobs" type="checkbox" value="1"> PRICING processing(Release TBMS jobs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="fin_eoy" type="checkbox" value="1"> Proceed With Finacle EOY
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="post_eoy" type="checkbox" value="1"> Post EOY Checks
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="zero" type="checkbox" value="1"> Confirm with Finance to check the reports and confirm zerolisation
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gbm" type="checkbox" value="1"> GBM team to pull their data and confirm
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="datastore" type="checkbox" value="1"> Check if all the EOD reports have been indexed to datastore10.231.128.117)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="code" type="checkbox" value="1"> Run query to return freeze code as before (shared by application team)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="glirr" type="checkbox" value="1"> Copy GLIRR reports to its respective folder
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ods" type="checkbox" value="1"> Start ODS EOY
                                    </div>

                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 4){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>ENA CHECKLIST </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="ictf" type="checkbox" value="1"> Copy ICTF file from the Connect Direct Server (BPWIN7\CDTransfers\Sparrow\bin) to Sparrow (sparrow/TZ/PRD/sparrow8/floppy)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="floppy" type="checkbox" value="1"> In floppy path,rename the file to inctf01.i01
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chmod_1" type="checkbox" value="1"> Change the file permission to chmod 660 on inctf01.i01 file
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ena" type="checkbox" value="1"> Login to the ENA FOREGROUND Super->Archive/Purge Expired B1 Type C (accept the default options)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="base_ctf" type="checkbox" value="1"> BASE II Stanbic CTF Clearing
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ctf" type="checkbox" value="1"> Accept the default format CTF-file name [a:inctf01.i01 ] NOTE: If the following message is displayed at this stage Settlement date [*****] postings already exist in logs. Continue or Quit C/Q (If you get this error it mean the ICTF for this day has been processed already, continuing will cause duplicates on FINACLE)**** Investigate first
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_c_cont" type="checkbox" value="1"> Type C to Continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="record_processed" type="checkbox" value="1"> Records processed - Press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="auto_ctf" type="checkbox" value="1"> Automated CTF processing completed without errors - Press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="rpt_chargeback" type="checkbox" value="1"> S/Rpt->Outgoing Chargeback Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="accept_default" type="checkbox" value="1"> Accept default date
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type" type="checkbox" value="1"> Y (Yes)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_c" type="checkbox" value="1"> Type C
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="printer" type="checkbox" value="1"> Select printer
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chargeback_opc" type="checkbox" value="1"> Send the Chargeback Report to OPC(Card production Team) and wait for their go ahead before uploading the file
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cd_bak" type="checkbox" value="1"> Cd /sparrow/TZ/PRD/sparrow8/floppy/bak
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_extract" type="checkbox" value="1"> Copy the pst*** files to /sparrow/TZ/PRD/sparrow8/extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chmod_2" type="checkbox" value="1"> change files permissions to chmod 660
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_ena_rpt" type="checkbox" value="1"> Login to the ENA FOREGROUND -> A/Rpt
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_not_cleared_txn" type="checkbox" value="1"> A/Rpt B1 Not Cleared txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_cleared_txn" type="checkbox" value="1"> A/Rpt B1 Cleared txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_not_auth_txn" type="checkbox" value="1"> A/Rpt B1 Not Authed txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_auth_txn" type="checkbox" value="1"> A/Rpt - B1 Authed txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_tnx" type="checkbox" value="1"> A/Rpt - B1 All txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chgbk_logs" type="checkbox" value="1"> Maint-> Purge Outgoing Chgbk Logs
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_sparrow" type="checkbox" value="1"> Login to Sparrow Foreground(spalogon.sh)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ena_b2_files" type="checkbox" value="1"> Upload ENA B2 Posting Files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_ena" type="checkbox" value="1"> Login to ENA Foreground(enalogon.sh)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="csv_extracts" type="checkbox" value="1"> S/Rpt-> CSV Extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="settlement" type="checkbox" value="1"> S/Rpt-> Settlement Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="rename_ena" type="checkbox" value="1"> Rename .ena file to settlementDDMMYY
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_rejected_tran" type="checkbox" value="1"> Copy rejected transactions PST*.spa to \sbictanfls02\d$\transactability\settlement\rejections
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_success_tran" type="checkbox" value="1"> Copy success transactions pst*.spa to \sbictanfls02\d$\transactability\settlement\pst
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_settlement" type="checkbox" value="1"> Copy settlementDDMMYY, base1-authorizedtransactions, ICHARGBK, IREPORT & TE513 from visa, T731 & D108 from master card to \\10.231.128.41\Recon_Automation\from_TZ
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_upi" type="checkbox" value="1"> Coppy UPI Reports from connect direct UPI folder to \\sbictanfls02\d$\transactability\settlement\upi
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_b1" type="checkbox" value="1"> Copy B1 Reports to authorization and non-authorization folder
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="confirm" type="checkbox" value="1"> Confirm all the above processes has been done
                                    </div>
									
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 5){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Patch Deployment Checklist-PRD </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="download_patch" type="checkbox" value="1"> Download patches and release notes to your PC
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="read_release" type="checkbox" value="1"> Read the release notes carefully to understand the content/other details of a particular patch
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="transfer_patch" type="checkbox" value="1"> Transfer downloaded patches to ../APDM/Patches in binary mode with 770 as permission
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_finacle" type="checkbox" value="1"> Login to Finacle CAP1 and invoke admin command
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="section_6_option" type="checkbox" value="1"> Select 6 option - select number 1 option
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="apdm_copy_paste" type="checkbox" value="1"> On APDM tool copy and paste all the patches required for deployment in sequence,max number of patches per deployment is 10 patches
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="deploy_apdm_tool" type="checkbox" value="1"> Start deploying the patches using APDM tool
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="repeat_sequency" type="checkbox" value="1"> Repeat the same sequency if you have more that 10 patches for deployment
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="apdm_work" type="checkbox" value="1"> Go to /APDM/APDM_WORK/explode /PRxx_CORE_yyy_cust and check for sqls(find . -name *.sql)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="path_sqls" type="checkbox" value="1"> Go to the path containing the sqls and login to the database using sqlplus command
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="execute_sqls" type="checkbox" value="1"> Execute sqls/configurations/BPDs that came with the patch
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_developer" type="checkbox" value="1"> Check in the SQL developer if the patches has been deployed successful select * from apdmadm.apdm_rep where patch_id like '%xxxxxx%';
                                    </div>
  
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 6){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Sparrow EOD Checklist</h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Before starting EOD please run internal Backup: (Do not stop Sparrow)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Daily - General Ledger Balancing (a) OK to process Y/N (b) Waiting for ATMs to complete GL Total reporting, press S to Skip (c) Marked all ATMs as having reported GL Totals any key to continue (d) Business Day Cutover complete any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Daily Transaction File Upload (a) Once upload completes go online to host (s) (b) Send Current/Last Other log C/L/O (c) OK to proceed with transaction file upload Y/N (d) Retry/Skip/skip All/Quit R/S/A/Q Go online Y/N
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> SNet - SparrowNet Status
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Select the required report from the menu options and send to printer: Select the print_cmd.cfg printer for printing hard copies. Daily Reports Local ATM Activity Report ATM Uptime report- select C to clear after printing then Q to quit after clearing Atm daily usage report Deposit Report per branch/ATM Card Exception Report AUDIT REPORT BILL PAYMENTS REPORT DEVICE EXCEPTIONS REPORT REJECTED TRANSACTIONS REPORT STATEMENT REQUESTS BY BRANCH Monthly Reports ATM Activity (Monthly) ATM Activity by Value
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Super Sparrow Diagnostics (a) Type O (b) Transaction Requested -Transactions Rejected -Transactions Timed out at Host -Transactions treated as Offline -Host average response time (c) Type C (d) Type Q (e) Type Q
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Sparrow Main Menu MIS CSV Extracts ENA S/Rpt CSV Extracts Select CVS Extracts from the MIS menu on the Sparrow Foreground: Extract Card File Type C Press F6 Type Y Transaction Log Type T Type start business day Type end business day Type Y ATM Uptime Type A Type ATM ID from and to Type E
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Select CSV Extracts from the S/Rpt menu on the ENA Foreground: Extract ENA log Type E Type start business day Type end business day
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Run the CSV MOD Files Renaming on the System Maintenance menu option The following files will be created in /sparrow/TZ/PRD/sparrow8/extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Daily Update Card and ATM History
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Daily Transaction Archive/Purge Super
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Electronic Log Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> print network rejected transaction report on daily basis and share to @Mwakisambwe, Maria M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Go to sparrow logon, under super (Purge EMV ICC Activity log) on Log record order than put 15 days press enter to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Under sparrow foreground super menu (Purge archived Transactions) press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Super (Card and ATM History Purge).This can be run every jan of each year Start year put the current year you are in and end year put the last year.
                                    </div>

                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 7){?>
					<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Sparrow Weekly Maintenance Checklist</h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="super_archive" type="checkbox" value="1"> Super Archive/Purge ExpiredB1 Type C to continue with default settings Press any key Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_logs" type="checkbox" value="1"> Maint - Purge Settlm Logs Input date YYDDD (Julian date format) and Press Enter Type C Wait until Purging has been completed Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_outgoing" type="checkbox" value="1"> Maint - Purge Outgoing Chgbk Logs Input date YYDDD (Julian date format) and Press Enter Type C Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_event_log" type="checkbox" value="1"> Diag - Purge the event log Input date YYMMDD Press any key Input date YYMMDD Press any key Input date YYMMDD Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_emv" type="checkbox" value="1"> Super - Purge EMV ICC Activity Log Press any key Type Y Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="snet" type="checkbox" value="1"> SNET Clear SparrowNet Log Press any key Type 0001 Press ENTER
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="files" type="checkbox" value="1"> Files - Service Maintenance Type C Type F6 Type Y
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="main_menu" type="checkbox" value="1"> Main Menu Sparrow System Control Login as ptzspwusr Type spastop.sh
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="monthly_process" type="checkbox" value="1"> This process to be conducted once in a month (i.e. the second week (Wednesday) of every month) Sparrow Files Compress and Rebuild process Main Menu System Maintenance Press Enter Press Enter Press Enter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="logon_pccspwmgr" type="checkbox" value="1"> Logon as pccspwmgr and Run Weekly Bintable Update Sparrow Main Menu System Maintenance Scroll down to Weekly Bintable Update Follow the step in the below table -Do you wish to continue with this process? (Y/N) *Please note that Sparrow will be stopped* -Do the sum and file sizes match those sent by Centre? (Y/N) -Send screenshot to centre team If an: ERROR is displayed process stops. Get the latest file bintable.ntr.gz onto extracts and re-do the process Type Y ? Press Enter Type Y ? if the sizes match Type N ? if they don?t match (Old bintable will be restored) Press
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="backup" type="checkbox" value="1"> Backup spn*logs Delete all spn*_log files of previous week(s)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="start_sparrow" type="checkbox" value="1"> Start Sparrow
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_foreground" type="checkbox" value="1"> Sparrow Foreground Files - Service Maintenance
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_0__type6" type="checkbox" value="1"> Type O Type F6 Type Y
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="run_script" type="checkbox" value="1"> Run script A file named filelist.txt will be created on /sparrow/XX/PRD/sparrow8/files.
                                    </div>
								
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 8){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Datacentre Facility Checklist </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any visible or audible alerts from the racks
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any alerts displayed on the power distribution units (PDUs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any alerts displayed on the power supplies of the servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any alerts displayed on the storage disks of the servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any alerts displayed on the I/O door of the tape libraries
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any messy cabling in the Datacenter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Ensure no airflow blockage in front of racks and AC
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check AC temperature levels in Datacenter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Ensure pollutants and dust are cleaned from the floor and the walls
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if the walls and ceilings are intact with no cracks or holes
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any alerts displayed on the fire suppression system dashboard
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check AC temperature levels in the UPS room
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check Generator and confirm fuel and battery levels
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check and report any UPS alerts/alarms in the UPS room	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Cleaning staff to attend Datacenter on Monday, Wednesday and Friday
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Cleaning staff to attend UPS room on Fridays
                                    </div>

                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 9){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Daily Backups (Netbackup PRD) </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> COGNOS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_COGNOS Backup selections: \\00172TANSQLPR1V\SQLBackups\Cognos\FULL\00172TANSQLPR2V Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> NIDA Server name: 00172TANNIDA02V IP address: 10.231.128.201 Netbackup Policy: 00172TANNIDA02V_NIDA Backup selections: \\00172TANSQLPR1V\SQLBackups\NIDA\FULL\00172TANNIDA02V Run info: Scheduled to run from 0400HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> CIMS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_CIMS Backup selections: \\00172TANSQLPR1V\SQLBackups\CIMS\FULL\00172TANCIMS02V Run info: Scheduled to run from 2000HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> PBB Server name: 39154TZAPBBCM08V IP address: 10.231.116.57 Netbackup Policy: 39154TZAPBBCM08V Backup selections: (a) C:\Notes (b) D:\Everything Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> MDM Server name: 00172TANMDMPR1V IP address: 10.231.116.49 Netbackup Policy: 00172TANSQLPR1V_MDM Backup selections: \\00172TANSQLPR1V\SQLBackups\MDM\FULL\00172tanmdmpr1v Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> USERS Server name: sbictanfls02 IP address: 10.231.128.41 Netbackup Policy: sbictanfls02 Backup selections:(a)DepartmentHeads (b)Departments (c)ExcoMembers (d)Managers (e)Officers (f)TeamLeaders Run info: Scheduled to run from 2100HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> DSX Server name: 00172tandswprd1 IP address: 10.231.128.82 Netbackup Policy: 00172TANSQLPR1V_DSX Backup selections: \\00172TANSQLPR1V\SQLBackups\DatastoreDSX\FULL\00172tandswprd1 Netbackup Policy: 00172tandswprd1_Filesystem Backup selections: (a)D:\Program Files\Microsoft SQL Server\MSSQL10_50.MSSQLSERVER\MSSQL\DATA (b)D:\Program Files\Hitec Laboratories Ltd\DatastoreDSX (c)E:\WDMDevice (d)I:\WDMDevice (e)I:\VirtualMedia (f)D:\dsxwork (g)D:\DSX (h)E:\DSX_Migration_WDMDevice (i)D:\DSX_Import Run info: Scheduled to run from 0000HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Inhouse Development tools 1 (Forex portal,Dangote,Documents trackers,e-market forms,Forotra,RAA) IP Address: 10.231.116.73 Netbackup Policy: Forex_tool Backup selections:(a)/data/mysql (b)/diskb (c)/etc/httpd (d) /usr/lib/systemd/system Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> GPOD Server names: 00172TANGPOD01v,00172TANGPOD02v IP addresses: 10.231.116.121,10.231.116.126 Netbackup Policy: 00172TANSQLPR1V_GPOD Backup selections: \\00172TANSQLPR1V\SQLBackups\GPOD\FULL\00172TANGPOD01V Netbackup Policy:00172tangpod01v Backup selections: E:\GPOD\DatabaseBackups Netbackup Policy:00172tangpod02v Backup selections:(a)E:\GCE\BackPath (b)E:\GPOD\DailyReports (c)E:\GCE\DatabaseBackups (d)E:\GPOD\DatabaseBackups Run info:Scheduled to run from 2200HRS	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> CAMS Server name: 00172TANCAMS1v IP address: 10.231.116.83 Netbackup policy: 00172TANCAMS1v Backup selections: D:\ Run info: Scheduled to run from 2100HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> CDM database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_CDM Backup selections: \\00172TANSQLPR1V\SQLBackups\CDM\FULL\00172TANBNAPR2V Run info: Scheduled to run from 0430HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> DAP database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_DAP Backup selections: \\00172TANSQLPR1V\SQLBackups\DAP\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> DTS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_DTS Backup selections: \\00172TANSQLPR1V\SQLBackups\DTS\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> GePG database Server: 00172TANGPGPR1V IP address: 10.231.123.102 Netbackup Policy: 00172TANSQLPR1V_GePG Backup selections: \\00172TANSQLPR1V\SQLBackups\DTS\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> KPrinter database Server: 00172TANKPPR01V IP address: 10.231.116.78 Netbackup Policy: 00172TANSQLPR1V_KPRINTER Backup selections: \\00172TANSQLPR1V\SQLBackups\KPRINTER\00172TANKPPR01V\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Mobile Bulk Payment: 00172tanmbppr1v IP address: 10.231.128.201 Backup selections: /opt/mobilepayments/app/Input /opt/mobilepayments/app/Output Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> IBM Datapower: esbedpp01v.tz.sbicdirectory.com esbedpp02v.tz.sbicdirectory.com esbedppv.tz.sbicdirectory.com (VIP) IP address: 10.231.123.84 10.231.123.85 10.231.123.90 Backup selections: All_Local_drives Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> E-Journal & Custodian tool: 00172TANDETR02V IP address: 10.231.128.30 Netbacup policy: \\00172TANSQLPR1V\SQLBackups\DISTRIBUTOR\PRD Backup selections: C:\ D:\ F:\ Run info: Scheduled to run from 2300HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Inhouse Development tools 2 (almuntazirintegration) IP ADDRESS 10.231.116.75 Netbackup Policy: Forex_tool Backup selections:(a)/data/mysql (b)/diskb (c)/etc/httpd (d) /usr/lib/systemd/system Run info: Scheduled to run from 2200HRS
                                    </div>

                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 10){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Datacentre Facility Checklist </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm if the payment jobs have been loaded in today's schedule on Control M. This should be checked early before 08:00 AM daily. VPSBT,CUDEL,PYNPY,AOUDF10,AOUDF01,AOUDF02,AOUDF03 ->For Public holidays, Saturday and Sunday the jobs should not be seen in today's schedule.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm if Datastore & Datastore DSXcold services are up and runnning in DatastoreDSX server (10.231.128.82) DR server 10.231.145.90
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm Cash Encashment job is loaded
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> CHQENC- On weekly CHQENC1- on Saturday CHQENC2 on Sunday
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Copy VISA, UPI & MASTERCARD files from sparrow to transactability folder for recon
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Perform Base II ENA processing
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm CFAO and Maurel statements has been sent
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Perform Sparrow restore from NetBackup Appliance. Sparrow Restore source 10.231.33.97 for DR restore and 10.231.35.244 for PRD restore Sparrow restore destination 10.231.35.244 for DR restore and 10.231.33.97 for PRD restore please exclude the ssock.dat and vsock.dat files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Monitoring Backups in NetBackup and report for any failed backups.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm if sparrow EOD reports are available in datastore
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Perform Finacle source refresh from Prod to DR (This has to be done on Sundays)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> CODAC&PRTG monitoring
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Control M health check
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Copy Netbackup report from outlook to \\sbictanfls02\Departments\IT\IT Shared Folder\Data Center Docs\finacle notes\Netbackup\Netbackup daily report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Run query every morning month end for optimization of PSP02 Job Performance during EOD.Path to access the query \\sbictanfls02\Departments\IT\IT Shared Folder\Data Center Docs\EOD Database queries
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if SparrowNET and Host required status is showing ONLINE-ONLINE
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm Connectivity to DR Site (ping 10.231.145.18)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Monitoring incomplete Production or UAT EOD run
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> LINUX - Ensure there is enough disk space on the filesystems, if not clear files or escalate to respective teams
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> LINUX - Ensure Cluster services are up and running with no errors
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Copy Linux server logs from ptzjump1:/tools/dailylogs/ to \\SBICTANFLS02\Operating systems\
                                    </div>
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 11){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>DR Restore Weekly Checklist </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Datastore(DSX) (10.231.145.90)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> E:DSX_Migration_WDMDevice -Depot1 -Depot3 -Depot4
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> I:WDMDevice -Depot2
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> From SQL server: .KYC_Lookup .DatastoreReporting .DatastoreCold .Datastore .Customers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> GePG server Source : 10.231.123.102 C:\xampp C:\Users Destination IP Adress:10.231.29.215 Server name: 00172TANGPGDR1V Folders to be restored C:\xampp C:\Users
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Nida restore source 10.231.128.201 and Destination 10.231.145.143
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> DB Restore for GePG server IP Adress:10.231.29.221 Path : 00172tansqlpr1v/SQLBACKUPS/GEPG/FULL
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> DB Restore for NIDA 10.231.116.247\SQLBackups\NIDA\FULL\00172TANNIDA02V
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Test /validate 00172TANGPGDR1V (GEPG) data are available with the correct date
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Test/validate 00172TANNIDA02V (NIDA) data are available with the correct date
                                    </div>
									
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 12){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Finacle EOD Checklist</h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Run Sparrow ATM EOD (ref: Sparrow eod checklist)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Execute query to check table space for CUSTOM_TBLS, the PCT. Free space should be >20%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check disk space for all disk in CORCAPW and CORJAPW servers. Used space should not be more than 80% (use df -k)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm GPOD EOD has run and the files are received in TBMS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm CHQENC (Cheque encashment) job has run in Control M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check space for uodora, gpfsfcb and gpfsfin (admin, 4,1,0)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm EOD jobs are loaded with the correct dates
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Hold the HBKCOP job on Control M before starting EOD and will be released once the pricing files are received.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Hold MMF jobs on EOM run date on EOD
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm if there is no file in /gpfsfcb/prd/TZ/in/pricing path within CORCAPW servers. If there is a file backup in different directory and delete the file in pricing directory after confirmation from pricing team	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> UPDATE PATCHES (If any available for the day)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Restart Finacle services and JBOSS services for CORCAPW1 & CORCAPW2 node by node and CORJAPW1 and CORJAPW2 node by node
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if all Finacle services are up(admin view)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check the space on TBMS both nodes (df - k )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm if MQREAD service has been restarted (Check the PID if is updated)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if there is any additional evening EFT session for the day
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if below query will return any record, If yes call Application team before EOD started for logs to be collected and escalation to be done. select * from tbaadm.aed where TRACE_NUM2 in (select concat ('PAYEX-',instn_no) from custom.c_procpay_st where status='R' and to_date(process_date,'DD-MM-YYYY')=trunc(sysdate) and bank_id='TZ' )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Hold TZ_EOD_JOB_GRP_007 job from control m and release when SNPRIBALANCEDWLD received under gpfsun/prd/Mediation/Bal/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Start finacle EOD - from ControL M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> PRICING processing(Release TBMS jobs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Copy GL interest substitution report (GLIRR) to \\sbictanfls02\Departments\Sub Departments\GLIRR Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Prepare and circulate the finacle EOD, Pricing EOD and FAILED JOBS reports.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Post EOD Checks- Check if reports have been indexed to datastore server
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> SAA Swift Incoming / Outgoing Messages
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Branch Cash Holding Part 1 & 2 (found under Finacle PDF Reports)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> ATM Activity report(Under sparrow EOD report)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Release MMF jobs after leg2 job from pricing is done
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Run gatherstats for Database optimization(To be run on weekly basis on Saturday) and send confirmation email
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> After the reports run go to /fincor/clog/TZPRD/cdci_logs/TZBJMS and /fincor/clog/TZPRD/cdci_logs/CRTLM directory in CORCAPW server and run this command find. -name fatal*
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Extract all the resulting fatal logs from the command above with respect to branch number and job name
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check all the failed jobs from the Jobwise report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Send the extracted fatal logs and failed jobs above to Core Banking team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Once services restart is done for CORJAPW servers check the sever.log for any service failure /fincor/japp/TZPRD/jboss-eap[1]7.1/standalone/log
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check on the below logs if transactions are going through successful for TBMS,EE,NBL,Internet banking etc on the below path /fincor/japp/TZPRD/common/log/fsb/ in CORJAPW servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Starting ODS EOD
                                    </div>

                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 13){?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>ODS Checklist for EOD </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if you are able to login to the ODS Production Server, using PUTTY. Use dsadm as a username If you are facing issues with login immediately raise an IR with Linux team and investigate on the same and have it fixed ASAP. This is critical as any issues here would have EOD impact.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Login into DSGW1 using PUTTY and check if all the disk spaces are below 70 % usage. Fire the below command to get the list. df - g In the generated list look for %used column to identify. If any is above 70 % raise an IR with Linux team to have it increased accordingly.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Confirm Control M login is working fine. If any issue with login raise IR with Control M team.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Before the EOD starts ensure no job under is red (aborted). If so investigate ASAP to check if its server issue or not. If situation persists raise IR with Linux and Control M team to assist and also get assistance of ODS team.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if all Inbound files arriving at input directory using fteagent & MQFTE are having permissions of 660. This may cause ODS jobs for the peripherals to abort due to invalid permissions. So if you notice job aborting because of this then login using fteagent credentials in DSGW1/DSGW2 And change the permissions to 660. If issue persists get in touch African Integration Service Team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> After ODS EOD starts Check if no job is getting aborted. If yes get the SYSOUT description from Control M job. Also login using director to investigate and fix. Try to do a re-run of the job once. If still problem persists contact the Infosys resources.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Once EOD finishes go to Output folder and check if all the files are picked up. Also check the count of each individual outbound file in the scratch folder too to confirm all files were generated for the current EOD date. If any difference in the number of files kindly investigate. If any file is stuck in output folder get in touch with MQFTE team to have it picked.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> If any Inbound file hasn't arrived even after the EOD has finished and if it is blocking the run of another job them raise an IR with MQFTE to find the reason behind the missing file and follow up until it's resolved as it could have business impact.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> If it's a Month-End run then Extra files would be generated for CRB and PROBE. Ensure that happens and check if the files are generated after Month-End run finishes.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Once EOD is completed make sure that Daily STATS are sent out. In normal conditions ODS EOD should finish in 4 hours 30 min. If you notice a different behavior then, send a mail to the BANK ODS team to investigate on this. This could be because of Server/DB load.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Once probe jobs competed, run the attached query to check if data for the current date updated/generated
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="precaution" type="checkbox" value="1"> Check if the BIZWIZE job completed successful and the files are generated and transferred
                                    </div>
									
                                    
                                    <div class="footer tar">
                                        <input type="submit" name="ora_dba" value="Submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 14){?>
					<?php }elseif($_GET['id'] == 15){?>
					<?php }elseif($_GET['id'] == 16){?>
					<?php }elseif($_GET['id'] == 17){?>
					<?php }?>
					

                <div class="dr"><span></span></div>

            </div>

        </div>   
    </div>
</body>

</html>
