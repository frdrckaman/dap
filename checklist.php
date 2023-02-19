<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
$validate = new validate();
$successMessage = null;
$pageError = null;
$errorMessage = null;$data=false;
if ($user->isLoggedIn()) {
	if (Input::exists('post')) {
		if($_GET['id'] == 1){
			if (Input::get('ora_draft') || Input::get('ora_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('ora_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('ora_dba_checklist', array(
							'daily_report' => Input::get('daily_report'),
							'recon_auto' => Input::get('recon_auto'),
							'crm_audit' => Input::get('crm_audit'),
							'recoveries_reports' => Input::get('recoveries_reports'),
							'credit_caet' => Input::get('credit_caet'),
							'ora_server_availability' => Input::get('ora_server_availability'),
							'ora_disk_space' => Input::get('ora_disk_space'),
							'ora_listener' => Input::get('ora_listener'),
							'ora_db_status' => Input::get('ora_db_status'),
							'ora_db_space_archive' => Input::get('ora_db_space_archive'),
							'ora_cluster' => Input::get('ora_cluster'),
							'ora_backup_config' => Input::get('ora_backup_config'),
							'ora_backup_status' => Input::get('ora_backup_status'),
							'ora_users' => Input::get('ora_users'),
							'ora_table_space' => Input::get('ora_table_space'),
							'ora_asm' => Input::get('ora_asm'),
							'oral_replication' => Input::get('oral_replication'),
							'checklist_date' => date('Y-m-d'),
							'staff_id' => $user->data()->id,
							'status' => $status,
							'staff_comment' => Input::get('staff_comment'),
						),Input::get('id'));
						}else{
							$user->createRecord('ora_dba_checklist', array(
							'daily_report' => Input::get('daily_report'),
							'recon_auto' => Input::get('recon_auto'),
							'crm_audit' => Input::get('crm_audit'),
							'recoveries_reports' => Input::get('recoveries_reports'),
							'credit_caet' => Input::get('credit_caet'),
							'ora_server_availability' => Input::get('ora_server_availability'),
							'ora_disk_space' => Input::get('ora_disk_space'),
							'ora_listener' => Input::get('ora_listener'),
							'ora_db_status' => Input::get('ora_db_status'),
							'ora_db_space_archive' => Input::get('ora_db_space_archive'),
							'ora_cluster' => Input::get('ora_cluster'),
							'ora_backup_config' => Input::get('ora_backup_config'),
							'ora_backup_status' => Input::get('ora_backup_status'),
							'ora_users' => Input::get('ora_users'),
							'ora_table_space' => Input::get('ora_table_space'),
							'ora_asm' => Input::get('ora_asm'),
							'oral_replication' => Input::get('oral_replication'),
							'checklist_date' => date('Y-m-d'),
							'staff_id' => $user->data()->id,
							'status' => $status,
							'staff_comment' => Input::get('staff_comment'),
						));
						}
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}
		}elseif($_GET['id'] == 2){
			if (Input::get('sql_draft') || Input::get('sql_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('sql_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('sql_dba_checklist', array(
								'sql_backup_config' => Input::get('sql_backup_config'),
								'sql_backup_status' => Input::get('sql_backup_status'),
								'sql_disk_space' => Input::get('sql_disk_space'),
								'sql_availability' => Input::get('sql_availability'),
								'sql_users' => Input::get('sql_users'),
								'sql_sync' => Input::get('sql_sync'),
								'sql_services' => Input::get('sql_services'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('sql_dba_checklist', array(
								'sql_backup_config' => Input::get('sql_backup_config'),
								'sql_backup_status' => Input::get('sql_backup_status'),
								'sql_disk_space' => Input::get('sql_disk_space'),
								'sql_availability' => Input::get('sql_availability'),
								'sql_users' => Input::get('sql_users'),
								'sql_sync' => Input::get('sql_sync'),
								'sql_services' => Input::get('sql_services'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}
		}elseif($_GET['id'] == 3){
			if (Input::get('finacle_eoy_draft') || Input::get('finacle_eoy_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('finacle_eoy_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('fin_eoy_checklist', array(
								'mmf' => Input::get('mmf'),
								'sparrow' => Input::get('sparrow'),
								'pct' => Input::get('pct'),
								'cap' => Input::get('cap'),
								'fin' => Input::get('fin'),
								'gpod' => Input::get('gpod'),
								'cheque' => Input::get('cheque'),
								'pricing' => Input::get('pricing'),
								'tbms' => Input::get('tbms'),
								'services' => Input::get('services'),
								'bjs' => Input::get('bjs'),
								'unfreeze' => Input::get('unfreeze'),
								'eoy' => Input::get('eoy'),
								'hbkcop' => Input::get('hbkcop'),
								'controlm' => Input::get('controlm'),
								'caf' => Input::get('caf'),
								'det' => Input::get('det'),
								'wld' => Input::get('wld'),
								'jobs' => Input::get('jobs'),
								'fin_eoy' => Input::get('fin_eoy'),
								'post_eoy' => Input::get('post_eoy'),
								'zero' => Input::get('zero'),
								'gbm' => Input::get('gbm'),
								'datastore' => Input::get('datastore'),
								'code' => Input::get('code'),
								'glirr' => Input::get('glirr'),
								'ods' => Input::get('ods'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('fin_eoy_checklist', array(
								'mmf' => Input::get('mmf'),
								'sparrow' => Input::get('sparrow'),
								'pct' => Input::get('pct'),
								'cap' => Input::get('cap'),
								'fin' => Input::get('fin'),
								'gpod' => Input::get('gpod'),
								'cheque' => Input::get('cheque'),
								'pricing' => Input::get('pricing'),
								'tbms' => Input::get('tbms'),
								'services' => Input::get('services'),
								'bjs' => Input::get('bjs'),
								'unfreeze' => Input::get('unfreeze'),
								'eoy' => Input::get('eoy'),
								'hbkcop' => Input::get('hbkcop'),
								'controlm' => Input::get('controlm'),
								'caf' => Input::get('caf'),
								'det' => Input::get('det'),
								'wld' => Input::get('wld'),
								'jobs' => Input::get('jobs'),
								'fin_eoy' => Input::get('fin_eoy'),
								'post_eoy' => Input::get('post_eoy'),
								'zero' => Input::get('zero'),
								'gbm' => Input::get('gbm'),
								'datastore' => Input::get('datastore'),
								'code' => Input::get('code'),
								'glirr' => Input::get('glirr'),
								'ods' => Input::get('ods'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_feoy')){
				$preData=$override->get('fin_eoy_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('fin_eoy_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('fin_eoy_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 4){
			if (Input::get('ena_draft') || Input::get('ena_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('ena_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('ena_checklist', array(
								'ictf' => Input::get('ictf'),
								'floppy' => Input::get('floppy'),
								'chmod_1' => Input::get('chmod_1'),
								'ena' => Input::get('ena'),
								'base_ctf' => Input::get('base_ctf'),
								'ctf' => Input::get('ctf'),
								'type_c_cont' => Input::get('type_c_cont'),
								'record_processed' => Input::get('record_processed'),
								'auto_ctf' => Input::get('auto_ctf'),
								'rpt_chargeback' => Input::get('rpt_chargeback'),
								'accept_default' => Input::get('accept_default'),
								'yes_y' => Input::get('y'),
								'type_c' => Input::get('type_c'),
								'printer' => Input::get('printer'),
								'chargeback_opc' => Input::get('chargeback_opc'),
								'cd_bak' => Input::get('cd_bak'),
								'copy_extract' => Input::get('copy_extract'),
								'chmod_2' => Input::get('chmod_2'),
								'login_ena_rpt' => Input::get('login_ena_rpt'),
								'b1_not_cleared_txn' => Input::get('b1_not_cleared_txn'),
								'b1_cleared_txn' => Input::get('b1_cleared_txn'),
								'b1_not_auth_txn' => Input::get('b1_not_auth_txn'),
								'b1_auth_txn' => Input::get('b1_auth_txn'),
								'login_tnx' => Input::get('login_tnx'),
								'chgbk_logs' => Input::get('chgbk_logs'),
								'login_sparrow' => Input::get('login_sparrow'),
								'ena_b2_files' => Input::get('ena_b2_files'),
								'login_ena' => Input::get('login_ena'),
								'csv_extracts' => Input::get('csv_extracts'),
								'settlement' => Input::get('settlement'),
								'rename_ena' => Input::get('rename_ena'),
								'copy_rejected_tran' => Input::get('copy_rejected_tran'),
								'copy_success_tran' => Input::get('copy_success_tran'),
								'copy_settlement' => Input::get('copy_settlement'),
								'copy_upi' => Input::get('copy_upi'),
								'copy_b1' => Input::get('copy_b1'),
								'confirm' => Input::get('confirm'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
						), Input::get('id'));
						}else{
							$user->createRecord('ena_checklist', array(
								'ictf' => Input::get('ictf'),
								'floppy' => Input::get('floppy'),
								'chmod_1' => Input::get('chmod_1'),
								'ena' => Input::get('ena'),
								'base_ctf' => Input::get('base_ctf'),
								'ctf' => Input::get('ctf'),
								'type_c_cont' => Input::get('type_c_cont'),
								'record_processed' => Input::get('record_processed'),
								'auto_ctf' => Input::get('auto_ctf'),
								'rpt_chargeback' => Input::get('rpt_chargeback'),
								'accept_default' => Input::get('accept_default'),
								'yes_y' => Input::get('yes_y'),
								'type_c' => Input::get('type_c'),
								'printer' => Input::get('printer'),
								'chargeback_opc' => Input::get('chargeback_opc'),
								'cd_bak' => Input::get('cd_bak'),
								'copy_extract' => Input::get('copy_extract'),
								'chmod_2' => Input::get('chmod_2'),
								'login_ena_rpt' => Input::get('login_ena_rpt'),
								'b1_not_cleared_txn' => Input::get('b1_not_cleared_txn'),
								'b1_cleared_txn' => Input::get('b1_cleared_txn'),
								'b1_not_auth_txn' => Input::get('b1_not_auth_txn'),
								'b1_auth_txn' => Input::get('b1_auth_txn'),
								'login_tnx' => Input::get('login_tnx'),
								'chgbk_logs' => Input::get('chgbk_logs'),
								'login_sparrow' => Input::get('login_sparrow'),
								'ena_b2_files' => Input::get('ena_b2_files'),
								'login_ena' => Input::get('login_ena'),
								'csv_extracts' => Input::get('csv_extracts'),
								'settlement' => Input::get('settlement'),
								'rename_ena' => Input::get('rename_ena'),
								'copy_rejected_tran' => Input::get('copy_rejected_tran'),
								'copy_success_tran' => Input::get('copy_success_tran'),
								'copy_settlement' => Input::get('copy_settlement'),
								'copy_upi' => Input::get('copy_upi'),
								'copy_b1' => Input::get('copy_b1'),
								'confirm' => Input::get('confirm'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_ena')){
				$preData=$override->get('ena_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('ena_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('ena_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 5){
			if (Input::get('patch_dep_draft') || Input::get('patch_dep_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('patch_dep_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('patch_checklist', array(
								'download_patch' => Input::get('download_patch'),
								'read_release' => Input::get('read_release'),
								'transfer_patch' => Input::get('transfer_patch'),
								'login_finacle' => Input::get('login_finacle'),
								'section_6_option' => Input::get('section_6_option'),
								'apdm_copy_paste' => Input::get('apdm_copy_paste'),
								'deploy_apdm_tool' => Input::get('deploy_apdm_tool'),
								'repeat_sequency' => Input::get('repeat_sequency'),
								'apdm_work' => Input::get('apdm_work'),
								'path_sqls' => Input::get('path_sqls'),
								'execute_sqls' => Input::get('execute_sqls'),
								'sql_developer' => Input::get('sql_developer'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('patch_checklist', array(
								'download_patch' => Input::get('download_patch'),
								'read_release' => Input::get('read_release'),
								'transfer_patch' => Input::get('transfer_patch'),
								'login_finacle' => Input::get('login_finacle'),
								'section_6_option' => Input::get('section_6_option'),
								'apdm_copy_paste' => Input::get('apdm_copy_paste'),
								'deploy_apdm_tool' => Input::get('deploy_apdm_tool'),
								'repeat_sequency' => Input::get('repeat_sequency'),
								'apdm_work' => Input::get('apdm_work'),
								'path_sqls' => Input::get('path_sqls'),
								'execute_sqls' => Input::get('execute_sqls'),
								'sql_developer' => Input::get('sql_developer'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_patch')){
				$preData=$override->get('patch_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('patch_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('patch_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 6){
			if (Input::get('sparrow_eod_draft') || Input::get('sparrow_eod_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('sparrow_eod_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('sparrow_eod_checklist', array(
								'before_starting' => Input::get('before_starting'),
								'daily_gl' => Input::get('daily_gl'),
								'daily_tl' => Input::get('daily_tl'),
								'snet' => Input::get('snet'),
								'print_cmd' => Input::get('print_cmd'),
								'super_sparrow	' => Input::get('super_sparrow'),
								'sparrow_main' => Input::get('sparrow_main'),
								'csv_extracts' => Input::get('csv_extracts'),
								'csv_mod' => Input::get('csv_mod'),
								'daily_update' => Input::get('daily_update'),
								'daily_transaction' => Input::get('daily_transaction'),
								'electronic_log' => Input::get('electronic_log'),
								'print_network' => Input::get('print_network'),
								'sparrow_logon' => Input::get('sparrow_logon'),
								'sparrow_foreground' => Input::get('sparrow_foreground'),
								'super_menu' => Input::get('super_menu'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('sparrow_eod_checklist', array(
								'before_starting' => Input::get('before_starting'),
								'daily_gl' => Input::get('daily_gl'),
								'daily_tl' => Input::get('daily_tl'),
								'snet' => Input::get('snet'),
								'print_cmd' => Input::get('print_cmd'),
								'super_sparrow' => Input::get('super_sparrow'),
								'sparrow_main' => Input::get('sparrow_main'),
								'csv_extracts' => Input::get('csv_extracts'),
								'csv_mod' => Input::get('csv_mod'),
								'daily_update' => Input::get('daily_update'),
								'daily_transaction' => Input::get('daily_transaction'),
								'electronic_log' => Input::get('electronic_log'),
								'print_network' => Input::get('print_network'),
								'sparrow_logon' => Input::get('sparrow_logon'),
								'sparrow_foreground' => Input::get('sparrow_foreground'),
								'super_menu' => Input::get('super_menu'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_speod')){
				$preData=$override->get('sparrow_eod_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('sparrow_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('sparrow_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 7){
			if (Input::get('sparrow_weekly_draft') || Input::get('sparrow_weekly_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('sparrow_weekly_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('sparrow_weekly_checklist', array(
								'super_archive' => Input::get('super_archive'),
								'purge_logs' => Input::get('purge_logs'),
								'purge_outgoing' => Input::get('purge_outgoing'),
								'purge_event_log' => Input::get('purge_event_log'),
								'purge_emv' => Input::get('purge_emv'),
								'snet' => Input::get('snet'),
								'files' => Input::get('files'),
								'main_menu' => Input::get('main_menu'),
								'monthly_process' => Input::get('monthly_process'),
								'logon_pccspwmgr' => Input::get('logon_pccspwmgr'),
								'backup' => Input::get('backup'),
								'start_sparrow' => Input::get('start_sparrow'),
								'sparrow_foreground' => Input::get('sparrow_foreground'),
								'type_0__type6' => Input::get('type_0__type6'),
								'run_script' => Input::get('run_script'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('sparrow_weekly_checklist', array(
								'super_archive' => Input::get('super_archive'),
								'purge_logs' => Input::get('purge_logs'),
								'purge_outgoing' => Input::get('purge_outgoing'),
								'purge_event_log' => Input::get('purge_event_log'),
								'purge_emv' => Input::get('purge_emv'),
								'snet' => Input::get('snet'),
								'files' => Input::get('files'),
								'main_menu' => Input::get('main_menu'),
								'monthly_process' => Input::get('monthly_process'),
								'logon_pccspwmgr' => Input::get('logon_pccspwmgr'),
								'backup' => Input::get('backup'),
								'start_sparrow' => Input::get('start_sparrow'),
								'sparrow_foreground' => Input::get('sparrow_foreground'),
								'type_0__type6' => Input::get('type_0__type6'),
								'run_script' => Input::get('run_script'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
					
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_spweekly')){
				$preData=$override->get('sparrow_weekly_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('sparrow_weekly_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('sparrow_weekly_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 8){
			if (Input::get('dc_facility_draft') || Input::get('dc_facility_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('dc_facility_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('datacentre_facility_checklist', array(
								'audible_alerts' => Input::get('audible_alerts'),
								'pdu' => Input::get('pdu'),
								'pwr_sup' => Input::get('pwr_sup'),
								'storage' => Input::get('storage'),
								'alert_tape' => Input::get('alert_tape'),
								'messy_cabling' => Input::get('messy_cabling'),
								'rack_airflow' => Input::get('rack_airflow'),
								'ac_temperature' => Input::get('ac_temperature'),
								'dust_clean' => Input::get('dust_clean'),
								'cracks_holes' => Input::get('cracks_holes'),
								'alert_suppression_system' => Input::get('alert_suppression_system'),
								'ac_temp_ups' => Input::get('ac_temp_ups'),
								'check_generator' => Input::get('check_generator'),
								'alerts_ups_room' => Input::get('alerts_ups_room'),
								'cleaning_datacenter' => Input::get('cleaning_datacenter'),
								'cleaning_ups_room' => Input::get('cleaning_ups_room'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('datacentre_facility_checklist', array(
								'audible_alerts' => Input::get('audible_alerts'),
								'pdu' => Input::get('pdu'),
								'pwr_sup' => Input::get('pwr_sup'),
								'storage' => Input::get('storage'),
								'alert_tape' => Input::get('alert_tape'),
								'messy_cabling' => Input::get('messy_cabling'),
								'rack_airflow' => Input::get('rack_airflow'),
								'ac_temperature' => Input::get('ac_temperature'),
								'dust_clean' => Input::get('dust_clean'),
								'cracks_holes' => Input::get('cracks_holes'),
								'alert_suppression_system' => Input::get('alert_suppression_system'),
								'ac_temp_ups' => Input::get('ac_temp_ups'),
								'check_generator' => Input::get('check_generator'),
								'alerts_ups_room' => Input::get('alerts_ups_room'),
								'cleaning_datacenter' => Input::get('cleaning_datacenter'),
								'cleaning_ups_room' => Input::get('cleaning_ups_room'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_datacenter')){
				$preData=$override->get('datacentre_facility_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('datacentre_facility_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('datacentre_facility_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 9){
			if (Input::get('daily_backups_draft') || Input::get('daily_backups_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('daily_backups_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('netbackup_prd_checklist', array(
								'cognos' => Input::get('cognos'),
								'nida' => Input::get('nida'),
								'cims' => Input::get('cims'),
								'pbb' => Input::get('pbb'),
								'mdm' => Input::get('mdm'),
								'users' => Input::get('users'),
								'dsx' => Input::get('dsx'),
								'inhouse_dev_1' => Input::get('inhouse_dev_1'),
								'gpod' => Input::get('gpod'),
								'cams' => Input::get('cams'),
								'cdm' => Input::get('cdm'),
								'dap' => Input::get('dap'),
								'dts' => Input::get('dts'),
								'gepg' => Input::get('gepg'),
								'kprinter' => Input::get('kprinter'),
								'mobile' => Input::get('mobile'),
								'ibm_datapower' => Input::get('ibm_datapower'),
								'e_journal' => Input::get('e_journal'),
								'inhouse_dev_2' => Input::get('inhouse_dev_2'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('netbackup_prd_checklist', array(
								'cognos' => Input::get('cognos'),
								'nida' => Input::get('nida'),
								'cims' => Input::get('cims'),
								'pbb' => Input::get('pbb'),
								'mdm' => Input::get('mdm'),
								'users' => Input::get('users'),
								'dsx' => Input::get('dsx'),
								'inhouse_dev_1' => Input::get('inhouse_dev_1'),
								'gpod' => Input::get('gpod'),
								'cams' => Input::get('cams'),
								'cdm' => Input::get('cdm'),
								'dap' => Input::get('dap'),
								'dts' => Input::get('dts'),
								'gepg' => Input::get('gepg'),
								'kprinter' => Input::get('kprinter'),
								'mobile' => Input::get('mobile'),
								'ibm_datapower' => Input::get('ibm_datapower'),
								'e_journal' => Input::get('e_journal'),
								'inhouse_dev_2' => Input::get('inhouse_dev_2'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_netbackup')){
				$preData=$override->get('netbackup_prd_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('netbackup_prd_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('netbackup_prd_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 10){
			if (Input::get('sod_draft') || Input::get('sod_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('sod_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('sod_checklist', array(
								'payment' => Input::get('payment'),
								'datastore' => Input::get('datastore'),
								'cash_encashment' => Input::get('cash_encashment'),
								'cheque' => Input::get('cheque'),
								'visa' => Input::get('visa'),
								'base_ii_ena' => Input::get('base_ii_ena'),
								'cfao' => Input::get('cfao'),
								'sparrow_restore' => Input::get('sparrow_restore'),
								'monitoring_backups' => Input::get('monitoring_backups'),
								'sparrow_eod_reports' => Input::get('sparrow_eod_reports'),
								'finacle_src_refresh' => Input::get('finacle_src_refresh'),
								'codac' => Input::get('codac'),
								'control_m' => Input::get('control_m'),
								'netbackup' => Input::get('netbackup'),
								'optimization' => Input::get('optimization'),
								'sparrow_net' => Input::get('sparrow_net'),
								'connectivity' => Input::get('connectivity'),
								'uat_eod' => Input::get('uat_eod'),
								'linux_disk_space' => Input::get('linux_disk_space'),
								'linux_cluster' => Input::get('linux_cluster'),
								'linux_logs' => Input::get('linux_logs'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('sod_checklist', array(
								'payment' => Input::get('payment'),
								'datastore' => Input::get('datastore'),
								'cash_encashment' => Input::get('cash_encashment'),
								'cheque' => Input::get('cheque'),
								'visa' => Input::get('visa'),
								'base_ii_ena' => Input::get('base_ii_ena'),
								'cfao' => Input::get('cfao'),
								'sparrow_restore' => Input::get('sparrow_restore'),
								'monitoring_backups' => Input::get('monitoring_backups'),
								'sparrow_eod_reports' => Input::get('sparrow_eod_reports'),
								'finacle_src_refresh' => Input::get('finacle_src_refresh'),
								'codac' => Input::get('codac'),
								'control_m' => Input::get('control_m'),
								'netbackup' => Input::get('netbackup'),
								'optimization' => Input::get('optimization'),
								'sparrow_net' => Input::get('sparrow_net'),
								'connectivity' => Input::get('connectivity'),
								'uat_eod' => Input::get('uat_eod'),
								'linux_disk_space' => Input::get('linux_disk_space'),
								'linux_cluster' => Input::get('linux_cluster'),
								'linux_logs' => Input::get('linux_logs'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_sod')){
				$preData=$override->get('sod_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('sod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('sod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 11){
			if (Input::get('dr_weekly_draft') || Input::get('dr_weekly_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('dr_weekly_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('dr_restore_checklist', array(
								'datastore' => Input::get('datastore'),
								'migration' => Input::get('migration'),
								'wdmdevice' => Input::get('wdmdevice'),
								'sql_server' => Input::get('sql_server'),
								'gepg' => Input::get('gepg'),
								'nida' => Input::get('nida'),
								'db_gepg' => Input::get('db_gepg'),
								'db_nida' => Input::get('db_nida'),
								'test_gepg' => Input::get('test_gepg'),
								'test_nida' => Input::get('test_nida'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('dr_restore_checklist', array(
								'datastore' => Input::get('datastore'),
								'migration' => Input::get('migration'),
								'wdmdevice' => Input::get('wdmdevice'),
								'sql_server' => Input::get('sql_server'),
								'gepg' => Input::get('gepg'),
								'nida' => Input::get('nida'),
								'db_gepg' => Input::get('db_gepg'),
								'db_nida' => Input::get('db_nida'),
								'test_gepg' => Input::get('test_gepg'),
								'test_nida' => Input::get('test_nida'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}
		}elseif($_GET['id'] == 12){
			if (Input::get('finacle_eod_draft') || Input::get('finacle_eod_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('finacle_eod_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('finacle_eod_checklist', array(
								'run_sparrow' => Input::get('run_sparrow'),
								'table_free_space' => Input::get('table_free_space'),
								'disk_space' => Input::get('disk_space'),
								'gpod_eod' => Input::get('gpod_eod'),
								'cheque' => Input::get('cheque'),
								'check_uodora' => Input::get('check_uodora'),
								'confirm_eod' => Input::get('confirm_eod'),
								'hold_hbkcop' => Input::get('hold_hbkcop'),
								'hold_mmf' => Input::get('hold_mmf'),
								'confirm_no_file' => Input::get('confirm_no_file'),
								'update_patches' => Input::get('update_patches'),
								'restart_finacle_services' => Input::get('restart_finacle_services'),
								'check_finacle_services' => Input::get('check_finacle_services'),
								'tbns_check_space' => Input::get('tbns_check_space'),
								'confirm_mqread' => Input::get('confirm_mqread'),
								'eft' => Input::get('eft'),
								'query_run' => Input::get('query_run'),
								'controlm_job' => Input::get('controlm_job'),
								'start_eod' => Input::get('start_eod'),
								'pricing_tbms' => Input::get('pricing_tbms'),
								'copy_gl' => Input::get('copy_gl'),
								'eod_reoprts' => Input::get('eod_reoprts'),
								'post_eod_checks' => Input::get('post_eod_checks'),
								'saa_swift' => Input::get('saa_swift'),
								'branch_cash' => Input::get('branch_cash'),
								'atm_activity' => Input::get('atm_activity'),
								'release_mmf' => Input::get('release_mmf'),
								'gatherstats' => Input::get('gatherstats'),
								'after_reports' => Input::get('after_reports'),
								'extract_all' => Input::get('extract_all'),
								'check_all_failed' => Input::get('check_all_failed'),
								'send_extract' => Input::get('send_extract'),
								'once_service' => Input::get('once_service'),
								'check_below' => Input::get('check_below'),
								'start_ods_eod' => Input::get('start_ods_eod'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('finacle_eod_checklist', array(
								'run_sparrow' => Input::get('run_sparrow'),
								'table_free_space' => Input::get('table_free_space'),
								'disk_space' => Input::get('disk_space'),
								'gpod_eod' => Input::get('gpod_eod'),
								'cheque' => Input::get('cheque'),
								'check_uodora' => Input::get('check_uodora'),
								'confirm_eod' => Input::get('confirm_eod'),
								'hold_hbkcop' => Input::get('hold_hbkcop'),
								'hold_mmf' => Input::get('hold_mmf'),
								'confirm_no_file' => Input::get('confirm_no_file'),
								'update_patches' => Input::get('update_patches'),
								'restart_finacle_services' => Input::get('restart_finacle_services'),
								'check_finacle_services' => Input::get('check_finacle_services'),
								'tbns_check_space' => Input::get('tbns_check_space'),
								'confirm_mqread' => Input::get('confirm_mqread'),
								'eft' => Input::get('eft'),
								'query_run' => Input::get('query_run'),
								'controlm_job' => Input::get('controlm_job'),
								'start_eod' => Input::get('start_eod'),
								'pricing_tbms' => Input::get('pricing_tbms'),
								'copy_gl' => Input::get('copy_gl'),
								'eod_reoprts' => Input::get('eod_reoprts'),
								'post_eod_checks' => Input::get('post_eod_checks'),
								'saa_swift' => Input::get('saa_swift'),
								'branch_cash' => Input::get('branch_cash'),
								'atm_activity' => Input::get('atm_activity'),
								'release_mmf' => Input::get('release_mmf'),
								'gatherstats' => Input::get('gatherstats'),
								'after_reports' => Input::get('after_reports'),
								'extract_all' => Input::get('extract_all'),
								'check_all_failed' => Input::get('check_all_failed'),
								'send_extract' => Input::get('send_extract'),
								'once_service' => Input::get('once_service'),
								'check_below' => Input::get('check_below'),
								'start_ods_eod' => Input::get('start_ods_eod'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}elseif(Input::get('handover_feod')){
				$preData=$override->get('finacle_eod_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('finacle_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('finacle_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
		}elseif($_GET['id'] == 13){
			if (Input::get('ods_eod_draft') || Input::get('ods_eod_final')) {
				$validate = new validate();
				$validate = $validate->check($_POST, array());
				if ($validate->passed()) {
						
					if(Input::get('ods_eod_final')){$status=2;
						$checklist_alert = 'Checklist sent Successful for Approval';
					}else{$status=0;
						$checklist_alert = 'Checklist save as Draft';
					}
					   
					try {
						if(Input::get('id')){
							$user->updateRecord('ods_eod_checklist', array(
								'ods_login' => Input::get('ods_login'),
								'dsgw' => Input::get('dsgw'),
								'control_m' => Input::get('control_m'),
								'before_eod' => Input::get('before_eod'),
								'inbound_files' => Input::get('inbound_files'),
								'ods_eod_start' => Input::get('ods_eod_start'),
								'ods_eod_complete' => Input::get('ods_eod_complete'),
								'inbound_arrived' => Input::get('inbound_arrived'),
								'month_end_run' => Input::get('month_end_run'),
								'eod_completed_daily_stats' => Input::get('eod_completed_daily_stats'),
								'prob_jobs_completed' => Input::get('prob_jobs_completed'),
								'check_bizwize' => Input::get('check_bizwize'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							),Input::get('id'));
						}else{
							$user->createRecord('ods_eod_checklist', array(
								'ods_login' => Input::get('ods_login'),
								'dsgw' => Input::get('dsgw'),
								'control_m' => Input::get('control_m'),
								'before_eod' => Input::get('before_eod'),
								'inbound_files' => Input::get('inbound_files'),
								'ods_eod_start' => Input::get('ods_eod_start'),
								'ods_eod_complete' => Input::get('ods_eod_complete'),
								'inbound_arrived' => Input::get('inbound_arrived'),
								'month_end_run' => Input::get('month_end_run'),
								'eod_completed_daily_stats' => Input::get('eod_completed_daily_stats'),
								'prob_jobs_completed' => Input::get('prob_jobs_completed'),
								'check_bizwize' => Input::get('check_bizwize'),
								'checklist_date' => date('Y-m-d'),
								'staff_id' => $user->data()->id,
								'status' => $status,
								'staff_comment' => Input::get('staff_comment'),
							));
						}
						
						$successMessage = $checklist_alert;
					} catch (Exception $e) {
						die($e->getMessage());
					}
				} else {
					$pageError = $validate->errors();
				}
			}
			elseif(Input::get('handover_ods')){
				$preData=$override->get('ods_eod_checklist', 'id', Input::get('id'));
				if($preData){
					$user->updateRecord('ods_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					),Input::get('id'));
				}else{
					$user->createRecord('ods_eod_checklist', array(
						'staff_id_2' => Input::get('staff'),
						'handover_timestamp' => date('Y-m-d H:i:s'),
						'handover_comment' => Input::get('comments'),
					));
				}
				$successMessage = 'Handover Completed Successful';
			}
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
                    <?php if($_GET['id'] == 1){ if($override->get('ora_dba_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('ora_dba_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Oracle DBA Checklist</h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_report" type="checkbox" value="1" <?php if($data){if($data['daily_report']){ echo 'checked';}}?>> Send BizWize Daily reports to respective stakeholders
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="recon_auto" type="checkbox" value="1" <?php if($data){if($data['recon_auto']){ echo 'checked';}}?>> Recon Automation Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="crm_audit" type="checkbox" value="1" <?php if($data){if($data['crm_audit']){ echo 'checked';}}?>> CRM Audit Trail Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="recoveries_reports" type="checkbox" value="1" <?php if($data){if($data['recoveries_reports']){ echo 'checked';}}?>> Recoveries Reports
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="credit_caet" type="checkbox" value="1" <?php if($data){if($data['credit_caet']){ echo 'checked';}}?>> Run Credit CAET Reports every 1st day of the Month
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_server_availability" type="checkbox" value="1" <?php if($data){if($data['ora_server_availability']){ echo 'checked';}}?>> ORACLE - Connect and confirm availability of database servers, if not available escalate to network team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_disk_space" type="checkbox" value="1" <?php if($data){if($data['ora_disk_space']){ echo 'checked';}}?>> ORACLE - Ensure there is enough disk space on the filesystems, if not backup and clear old files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_listener" type="checkbox" value="1" <?php if($data){if($data['ora_listener']){ echo 'checked';}}?>> ORACLE - Ensure listeners and their services are up and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_db_status" type="checkbox" value="1" <?php if($data){if($data['ora_db_status']){ echo 'checked';}}?>> ORACLE - Ensure database Status is OPEN from gv$ instance view, if not investigate and start up the instance
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_db_space_archive" type="checkbox" value="1" <?php if($data){if($data['ora_db_space_archive']){ echo 'checked';}}?>> ORACLE - Ensure space for Archive Switching is available, if not backup and clear old archives.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_cluster" type="checkbox" value="1" <?php if($data){if($data['ora_cluster']){ echo 'checked';}}?>> ORACLE - Ensure all Grid Infrastructure services from Cluster are online, if not investigate and start the Grid services
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_backup_config" type="checkbox" value="1" <?php if($data){if($data['ora_backup_config']){ echo 'checked';}}?>> ORACLE - Ensure backups are configured properly and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_backup_status" type="checkbox" value="1" <?php if($data){if($data['ora_backup_status']){ echo 'checked';}}?>> ORACLE - Confirm database backup completeness. If not completed/FAILED investigate and run the backups manually
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_users" type="checkbox" value="1" <?php if($data){if($data['ora_users']){ echo 'checked';}}?>> ORACLE - Check if there are locked, expired and inactive users, if found investigate and action accordingly
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_table_space" type="checkbox" value="1" <?php if($data){if($data['ora_table_space']){ echo 'checked';}}?>> ORACLE - Check if space used on permanent and temporary table spaces are below 80%, if not Increase tablespace
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ora_asm" type="checkbox" value="1" <?php if($data){if($data['ora_asm']){ echo 'checked';}}?>> ORACLE - Check the ASM disks on same disk group must have evenly distributed space usage, rebalance disks and or log an IR to have storage added to disk groups
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="oral_replication" type="checkbox" value="1" <?php if($data){if($data['oral_replication']){ echo 'checked';}}?>> ORACLE - Ensure database replication between Production and DR is running, if not running investigate and rectify accordingly
                                    </div>

                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="ora_draft" value="Save as Draft" class="btn btn-info" <?php if(!$data['status']==0){echo 'disabled';}?>>
										<input type="submit" name="ora_final" value="Save as Final" class="btn btn-warning" <?php if(!$data['status']==0){echo 'disabled';}?>>
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 2){ if($override->get('sql_dba_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('sql_dba_checklist', 'checklist_date', date('Y-m-d'))[0];} ?>
						<div class="col-md-offset-1 col-md-8">
						<div class="head clearfix">
                            <div class="isw-ok"></div>
                            <h1>SQL DBA Checklist</h1>
                        </div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_backup_config" type="checkbox" value="1" <?php if($data){if($data['sql_backup_config']){ echo 'checked';}}?>> SQL - Ensure backups are configured properly and running
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_backup_status" type="checkbox" value="1" <?php if($data){if($data['sql_backup_status']){ echo 'checked';}}?>> SQL - Confirm database backup completeness. If not completed/FAILED investigate and run the backups manually
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_disk_space" type="checkbox" value="1" <?php if($data){if($data['sql_disk_space']){ echo 'checked';}}?>> SQL - Ensure there is enough disk space on the database servers, if not backup and clear old files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_availability" type="checkbox" value="1" <?php if($data){if($data['sql_availability']){ echo 'checked';}}?>> SQL - Connect and confirm availability of database servers, if not available escalate to network team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_users" type="checkbox" value="1" <?php if($data){if($data['sql_users']){ echo 'checked';}}?>> SQL - Check if there are locked, expired and inactive users, if found investigate and action accordingly
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_sync" type="checkbox" value="1" <?php if($data){if($data['sql_sync']){ echo 'checked';}}?>> SQL - Ensure cluster servers are in sync between Production and DR
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_services" type="checkbox" value="1" <?php if($data){if($data['sql_services']){ echo 'checked';}}?>> SQL - Ensure listeners and their services are up and running
                                    </div>
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="sql_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="sql_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 3){  if($override->get('fin_eoy_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('fin_eoy_checklist', 'checklist_date', date('Y-m-d'))[0];} ?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Finacle EOY Checklist </h1>
								<div class="pull-right">
									<a href="#feoy<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="mmf" type="checkbox" value="1" <?php if($data){if($data['mmf']){ echo 'checked';}}?>> NOTE: In the morning confirm MMF has been run successful
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow" type="checkbox" value="1" <?php if($data){if($data['sparrow']){ echo 'checked';}}?>> Run Sparrow ATM EOD/EOY (ref: Atm eod ? procedure)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pct" type="checkbox" value="1" <?php if($data){if($data['pct']){ echo 'checked';}}?>> Excute query to check table space for CUSTOM_TBLS, the PCT. Free should be >20%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cap" type="checkbox" value="1" <?php if($data){if($data['cap']){ echo 'checked';}}?>> Check disk space for all disk in CAP and JAP servers used space should not be more than 80%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="fin" type="checkbox" value="1" <?php if($data){if($data['fin']){ echo 'checked';}}?>> Restart Finacle services for PTZCORCAPW1 & PTZCORCAPW2 node by node
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gpod" type="checkbox" value="1" <?php if($data){if($data['gpod']){ echo 'checked';}}?>> Confirm GPOD EOD has run and and file received in TBMS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cheque" type="checkbox" value="1" <?php if($data){if($data['cheque']){ echo 'checked';}}?>> Confirm CHQENC (Cheque encashment) job has run in control m
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pricing" type="checkbox" value="1" <?php if($data){if($data['pricing']){ echo 'checked';}}?>> Confirm if there is no file in /gpfsfcb/prd/TZ/in/pricing. If there is a file backup in different, dirrectorry and delete the file in pricing directory after confirmation from pricing team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="tbms" type="checkbox" value="1" <?php if($data){if($data['tbms']){ echo 'checked';}}?>> Check the space on TBMS both nodes (df )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="services" type="checkbox" value="1" <?php if($data){if($data['services']){ echo 'checked';}}?>> CHECK ALL SERVICES ARE UP: (admin view option)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="bjs" type="checkbox" value="1" <?php if($data){if($data['bjs']){ echo 'checked';}}?>> Check all EOY jobs in BJS if they have correct dates (SELECT * FROM TBAADM.BJS WHERE JOB_FREG_TYPE='Y' AND DEL_FLG='N';)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="unfreeze" type="checkbox" value="1" <?php if($data){if($data['unfreeze']){ echo 'checked';}}?>> Unfreeze the suspence and income accounts to allow zerolisation (to be shared by application team)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="eoy" type="checkbox" value="1" <?php if($data){if($data['eoy']){ echo 'checked';}}?>> Confirm the EOY jobs are loaded with the correct dates
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="hbkcop" type="checkbox" value="1" <?php if($data){if($data['hbkcop']){ echo 'checked';}}?>> Hold the HBKCOP job before starting EOY and will be released once the pricing files are received
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="controlm" type="checkbox" value="1" <?php if($data){if($data['controlm']){ echo 'checked';}}?>> Start finacle EOY - from ControL'M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="caf" type="checkbox" value="1" <?php if($data){if($data['caf']){ echo 'checked';}}?>> Confirm if there are 20 .dat files and 20 .done files in the path: /gpfssun/prd/tz/Mediation/CAF/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="det" type="checkbox" value="1" <?php if($data){if($data['det']){ echo 'checked';}}?>> Below commands must return a count of 20 (or more if an extra file was generated during the day) ls -lrt SUNPRIACCTDET*.dat | wc -l ls -lrt SUNPRIACCTDET*.dat.done | wc -l
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="wld" type="checkbox" value="1" <?php if($data){if($data['wld']){ echo 'checked';}}?>> Hold TZ_EOD_JOB_GRP_007 job from control m and release when SNPRIBALANCEDWLD received under gpfsun/prd/Mediation/Bal/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="jobs" type="checkbox" value="1" <?php if($data){if($data['jobs']){ echo 'checked';}}?>> PRICING processing(Release TBMS jobs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="fin_eoy" type="checkbox" value="1" <?php if($data){if($data['fin_eoy']){ echo 'checked';}}?>> Proceed With Finacle EOY
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="post_eoy" type="checkbox" value="1" <?php if($data){if($data['post_eoy']){ echo 'checked';}}?>> Post EOY Checks
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="zero" type="checkbox" value="1" <?php if($data){if($data['zero']){ echo 'checked';}}?>> Confirm with Finance to check the reports and confirm zerolisation
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gbm" type="checkbox" value="1" <?php if($data){if($data['gbm']){ echo 'checked';}}?>> GBM team to pull their data and confirm
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="datastore" type="checkbox" value="1" <?php if($data){if($data['datastore']){ echo 'checked';}}?>> Check if all the EOD reports have been indexed to datastore10.231.128.117)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="code" type="checkbox" value="1" <?php if($data){if($data['code']){ echo 'checked';}}?>> Run query to return freeze code as before (shared by application team)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="glirr" type="checkbox" value="1" <?php if($data){if($data['glirr']){ echo 'checked';}}?>> Copy GLIRR reports to its respective folder
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ods" type="checkbox" value="1" <?php if($data){if($data['ods']){ echo 'checked';}}?>> Start ODS EOY
                                    </div>

                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="finacle_eoy_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="finacle_eoy_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="ena<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Finacle EOY Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_feoy" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 4){ if($override->get('ena_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('ena_checklist', 'checklist_date', date('Y-m-d'))[0];} ?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>ENA CHECKLIST </h1>
								<div class="pull-right">
									<a href="#ena<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="ictf" type="checkbox" value="1" <?php if($data){if($data['ictf']){ echo 'checked';}}?>> Copy ICTF file from the Connect Direct Server (BPWIN7\CDTransfers\Sparrow\bin) to Sparrow (sparrow/TZ/PRD/sparrow8/floppy)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="floppy" type="checkbox" value="1" <?php if($data){if($data['floppy']){ echo 'checked';}}?>> In floppy path,rename the file to inctf01.i01
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chmod_1" type="checkbox" value="1" <?php if($data){if($data['chmod_1']){ echo 'checked';}}?>> Change the file permission to chmod 660 on inctf01.i01 file
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ena" type="checkbox" value="1" <?php if($data){if($data['ena']){ echo 'checked';}}?>> Login to the ENA FOREGROUND Super->Archive/Purge Expired B1 Type C (accept the default options)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="base_ctf" type="checkbox" value="1" <?php if($data){if($data['base_ctf']){ echo 'checked';}}?>> BASE II Stanbic CTF Clearing
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ctf" type="checkbox" value="1" <?php if($data){if($data['ctf']){ echo 'checked';}}?>> Accept the default format CTF-file name [a:inctf01.i01 ] NOTE: If the following message is displayed at this stage Settlement date [*****] postings already exist in logs. Continue or Quit C/Q (If you get this error it mean the ICTF for this day has been processed already, continuing will cause duplicates on FINACLE)**** Investigate first
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_c_cont" type="checkbox" value="1" <?php if($data){if($data['type_c_cont']){ echo 'checked';}}?>> Type C to Continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="record_processed" type="checkbox" value="1" <?php if($data){if($data['record_processed']){ echo 'checked';}}?>> Records processed - Press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="auto_ctf" type="checkbox" value="1" <?php if($data){if($data['auto_ctf']){ echo 'checked';}}?>> Automated CTF processing completed without errors - Press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="rpt_chargeback" type="checkbox" value="1" <?php if($data){if($data['rpt_chargeback']){ echo 'checked';}}?>> S/Rpt->Outgoing Chargeback Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="accept_default" type="checkbox" value="1" <?php if($data){if($data['accept_default']){ echo 'checked';}}?>> Accept default date
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="yes_y" type="checkbox" value="1" <?php if($data){if($data['yes_y']){ echo 'checked';}}?>> Y (Yes)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_c" type="checkbox" value="1" <?php if($data){if($data['type_c']){ echo 'checked';}}?>> Type C
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="printer" type="checkbox" value="1" <?php if($data){if($data['printer']){ echo 'checked';}}?>> Select printer
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chargeback_opc" type="checkbox" value="1" <?php if($data){if($data['chargeback_opc']){ echo 'checked';}}?>> Send the Chargeback Report to OPC(Card production Team) and wait for their go ahead before uploading the file
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cd_bak" type="checkbox" value="1" <?php if($data){if($data['cd_bak']){ echo 'checked';}}?>> Cd /sparrow/TZ/PRD/sparrow8/floppy/bak
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_extract" type="checkbox" value="1" <?php if($data){if($data['copy_extract']){ echo 'checked';}}?>> Copy the pst*** files to /sparrow/TZ/PRD/sparrow8/extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chmod_2" type="checkbox" value="1" <?php if($data){if($data['chmod_2']){ echo 'checked';}}?>> change files permissions to chmod 660
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_ena_rpt" type="checkbox" value="1" <?php if($data){if($data['login_ena_rpt']){ echo 'checked';}}?>> Login to the ENA FOREGROUND -> A/Rpt
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_not_cleared_txn" type="checkbox" value="1" <?php if($data){if($data['b1_not_cleared_txn']){ echo 'checked';}}?>> A/Rpt B1 Not Cleared txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_cleared_txn" type="checkbox" value="1" <?php if($data){if($data['b1_cleared_txn']){ echo 'checked';}}?>> A/Rpt B1 Cleared txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_not_auth_txn" type="checkbox" value="1" <?php if($data){if($data['b1_not_auth_txn']){ echo 'checked';}}?>> A/Rpt B1 Not Authed txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="b1_auth_txn" type="checkbox" value="1" <?php if($data){if($data['b1_auth_txn']){ echo 'checked';}}?>> A/Rpt - B1 Authed txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_tnx" type="checkbox" value="1" <?php if($data){if($data['login_tnx']){ echo 'checked';}}?>> A/Rpt - B1 All txn
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="chgbk_logs" type="checkbox" value="1" <?php if($data){if($data['chgbk_logs']){ echo 'checked';}}?>> Maint-> Purge Outgoing Chgbk Logs
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_sparrow" type="checkbox" value="1" <?php if($data){if($data['login_sparrow']){ echo 'checked';}}?>> Login to Sparrow Foreground(spalogon.sh)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ena_b2_files" type="checkbox" value="1" <?php if($data){if($data['ena_b2_files']){ echo 'checked';}}?>> Upload ENA B2 Posting Files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_ena" type="checkbox" value="1" <?php if($data){if($data['login_ena']){ echo 'checked';}}?>> Login to ENA Foreground(enalogon.sh)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="csv_extracts" type="checkbox" value="1" <?php if($data){if($data['csv_extracts']){ echo 'checked';}}?>> S/Rpt-> CSV Extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="settlement" type="checkbox" value="1" <?php if($data){if($data['settlement']){ echo 'checked';}}?>> S/Rpt-> Settlement Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="rename_ena" type="checkbox" value="1" <?php if($data){if($data['rename_ena']){ echo 'checked';}}?>> Rename .ena file to settlementDDMMYY
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_rejected_tran" type="checkbox" value="1" <?php if($data){if($data['copy_rejected_tran']){ echo 'checked';}}?>> Copy rejected transactions PST*.spa to \sbictanfls02\d$\transactability\settlement\rejections
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_success_tran" type="checkbox" value="1" <?php if($data){if($data['copy_success_tran']){ echo 'checked';}}?>> Copy success transactions pst*.spa to \sbictanfls02\d$\transactability\settlement\pst
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_settlement" type="checkbox" value="1" <?php if($data){if($data['copy_settlement']){ echo 'checked';}}?>> Copy settlementDDMMYY, base1-authorizedtransactions, ICHARGBK, IREPORT & TE513 from visa, T731 & D108 from master card to \\10.231.128.41\Recon_Automation\from_TZ
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_upi" type="checkbox" value="1" <?php if($data){if($data['copy_upi']){ echo 'checked';}}?>> Coppy UPI Reports from connect direct UPI folder to \\sbictanfls02\d$\transactability\settlement\upi
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_b1" type="checkbox" value="1" <?php if($data){if($data['copy_b1']){ echo 'checked';}}?>> Copy B1 Reports to authorization and non-authorization folder
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="confirm" type="checkbox" value="1" <?php if($data){if($data['confirm']){ echo 'checked';}}?>> Confirm all the above processes has been done
                                    </div>
									
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="ena_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="ena_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="ena<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>ENA Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_ena" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 5){  if($override->get('patch_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('patch_checklist', 'checklist_date', date('Y-m-d'))[0];} ?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Patch Deployment Checklist-PRD </h1>
								<div class="pull-right">
									<a href="#patchdeployment<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="download_patch" type="checkbox" value="1" <?php if($data){if($data['download_patch']){ echo 'checked';}}?>> Download patches and release notes to your PC
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="read_release" type="checkbox" value="1" <?php if($data){if($data['read_release']){ echo 'checked';}}?>> Read the release notes carefully to understand the content/other details of a particular patch
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="transfer_patch" type="checkbox" value="1" <?php if($data){if($data['transfer_patch']){ echo 'checked';}}?>> Transfer downloaded patches to ../APDM/Patches in binary mode with 770 as permission
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="login_finacle" type="checkbox" value="1" <?php if($data){if($data['login_finacle']){ echo 'checked';}}?>> Login to Finacle CAP1 and invoke admin command
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="section_6_option" type="checkbox" value="1" <?php if($data){if($data['section_6_option']){ echo 'checked';}}?>> Select 6 option - select number 1 option
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="apdm_copy_paste" type="checkbox" value="1" <?php if($data){if($data['apdm_copy_paste']){ echo 'checked';}}?>> On APDM tool copy and paste all the patches required for deployment in sequence,max number of patches per deployment is 10 patches
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="deploy_apdm_tool" type="checkbox" value="1" <?php if($data){if($data['deploy_apdm_tool']){ echo 'checked';}}?>> Start deploying the patches using APDM tool
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="repeat_sequency" type="checkbox" value="1" <?php if($data){if($data['repeat_sequency']){ echo 'checked';}}?>> Repeat the same sequency if you have more that 10 patches for deployment
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="apdm_work" type="checkbox" value="1" <?php if($data){if($data['apdm_work']){ echo 'checked';}}?>> Go to /APDM/APDM_WORK/explode /PRxx_CORE_yyy_cust and check for sqls(find . -name *.sql)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="path_sqls" type="checkbox" value="1" <?php if($data){if($data['path_sqls']){ echo 'checked';}}?>> Go to the path containing the sqls and login to the database using sqlplus command
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="execute_sqls" type="checkbox" value="1" <?php if($data){if($data['execute_sqls']){ echo 'checked';}}?>> Execute sqls/configurations/BPDs that came with the patch
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_developer" type="checkbox" value="1" <?php if($data){if($data['sql_developer']){ echo 'checked';}}?>> Check in the SQL developer if the patches has been deployed successful select * from apdmadm.apdm_rep where patch_id like '%xxxxxx%';
                                    </div>
  
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="patch_dep_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="patch_dep_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="patchdeployment<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Patch Deployment Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_patch" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 6){  if($override->get('sparrow_eod_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('sparrow_eod_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Sparrow EOD Checklist</h1>
								<div class="pull-right">
									<a href="#sparroweod<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="before_starting" type="checkbox" value="1" <?php if($data){if($data['before_starting']){ echo 'checked';}}?>> Before starting EOD please run internal Backup: (Do not stop Sparrow)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_gl" type="checkbox" value="1" <?php if($data){if($data['daily_gl']){ echo 'checked';}}?>> Daily - General Ledger Balancing (a) OK to process Y/N (b) Waiting for ATMs to complete GL Total reporting, press S to Skip (c) Marked all ATMs as having reported GL Totals any key to continue (d) Business Day Cutover complete any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_tl" type="checkbox" value="1" <?php if($data){if($data['daily_tl']){ echo 'checked';}}?>> Daily Transaction File Upload (a) Once upload completes go online to host (s) (b) Send Current/Last Other log C/L/O (c) OK to proceed with transaction file upload Y/N (d) Retry/Skip/skip All/Quit R/S/A/Q Go online Y/N
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="snet" type="checkbox" value="1" <?php if($data){if($data['snet']){ echo 'checked';}}?>> SNet - SparrowNet Status
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="print_cmd" type="checkbox" value="1" <?php if($data){if($data['print_cmd']){ echo 'checked';}}?>> Select the required report from the menu options and send to printer: Select the print_cmd.cfg printer for printing hard copies. Daily Reports Local ATM Activity Report ATM Uptime report- select C to clear after printing then Q to quit after clearing Atm daily usage report Deposit Report per branch/ATM Card Exception Report AUDIT REPORT BILL PAYMENTS REPORT DEVICE EXCEPTIONS REPORT REJECTED TRANSACTIONS REPORT STATEMENT REQUESTS BY BRANCH Monthly Reports ATM Activity (Monthly) ATM Activity by Value
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="super_sparrow" type="checkbox" value="1" <?php if($data){if($data['super_sparrow']){ echo 'checked';}}?>> Super Sparrow Diagnostics (a) Type O (b) Transaction Requested -Transactions Rejected -Transactions Timed out at Host -Transactions treated as Offline -Host average response time (c) Type C (d) Type Q (e) Type Q
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_main" type="checkbox" value="1" <?php if($data){if($data['sparrow_main']){ echo 'checked';}}?>> Sparrow Main Menu MIS CSV Extracts ENA S/Rpt CSV Extracts Select CVS Extracts from the MIS menu on the Sparrow Foreground: Extract Card File Type C Press F6 Type Y Transaction Log Type T Type start business day Type end business day Type Y ATM Uptime Type A Type ATM ID from and to Type E
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="csv_extracts" type="checkbox" value="1" <?php if($data){if($data['csv_extracts']){ echo 'checked';}}?>> Select CSV Extracts from the S/Rpt menu on the ENA Foreground: Extract ENA log Type E Type start business day Type end business day
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="csv_mod" type="checkbox" value="1" <?php if($data){if($data['csv_mod']){ echo 'checked';}}?>> Run the CSV MOD Files Renaming on the System Maintenance menu option The following files will be created in /sparrow/TZ/PRD/sparrow8/extracts
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_update" type="checkbox" value="1" <?php if($data){if($data['daily_update']){ echo 'checked';}}?>> Daily Update Card and ATM History
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="daily_transaction" type="checkbox" value="1" <?php if($data){if($data['daily_transaction']){ echo 'checked';}}?>> Daily Transaction Archive/Purge Super
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="electronic_log" type="checkbox" value="1" <?php if($data){if($data['electronic_log']){ echo 'checked';}}?>> Electronic Log Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="print_network" type="checkbox" value="1" <?php if($data){if($data['print_network']){ echo 'checked';}}?>> print network rejected transaction report on daily basis and share to @Mwakisambwe, Maria M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_logon" type="checkbox" value="1" <?php if($data){if($data['sparrow_logon']){ echo 'checked';}}?>> Go to sparrow logon, under super (Purge EMV ICC Activity log) on Log record order than put 15 days press enter to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_foreground" type="checkbox" value="1" <?php if($data){if($data['sparrow_foreground']){ echo 'checked';}}?>> Under sparrow foreground super menu (Purge archived Transactions) press any key to continue
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="super_menu" type="checkbox" value="1" <?php if($data){if($data['super_menu']){ echo 'checked';}}?>> Super (Card and ATM History Purge).This can be run every jan of each year Start year put the current year you are in and end year put the last year.
                                    </div>

                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="sparrow_eod_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="sparrow_eod_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="sparroweod<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Sparrow EOD Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_speod" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 7){  if($override->get('sparrow_weekly_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('sparrow_weekly_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
					<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Sparrow Weekly Maintenance Checklist</h1>
								<div class="pull-right">
									<a href="#sparrowweekly<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="super_archive" type="checkbox" value="1" <?php if($data){if($data['super_archive']){ echo 'checked';}}?>> Super Archive/Purge ExpiredB1 Type C to continue with default settings Press any key Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_logs" type="checkbox" value="1" <?php if($data){if($data['purge_logs']){ echo 'checked';}}?>> Maint - Purge Settlm Logs Input date YYDDD (Julian date format) and Press Enter Type C Wait until Purging has been completed Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_outgoing" type="checkbox" value="1" <?php if($data){if($data['purge_outgoing']){ echo 'checked';}}?>> Maint - Purge Outgoing Chgbk Logs Input date YYDDD (Julian date format) and Press Enter Type C Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_event_log" type="checkbox" value="1" <?php if($data){if($data['purge_event_log']){ echo 'checked';}}?>> Diag - Purge the event log Input date YYMMDD Press any key Input date YYMMDD Press any key Input date YYMMDD Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="purge_emv" type="checkbox" value="1" <?php if($data){if($data['purge_emv']){ echo 'checked';}}?>> Super - Purge EMV ICC Activity Log Press any key Type Y Press any key
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="snet" type="checkbox" value="1" <?php if($data){if($data['snet']){ echo 'checked';}}?>> SNET Clear SparrowNet Log Press any key Type 0001 Press ENTER
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="files" type="checkbox" value="1" <?php if($data){if($data['files']){ echo 'checked';}}?>> Files - Service Maintenance Type C Type F6 Type Y
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="main_menu" type="checkbox" value="1" <?php if($data){if($data['main_menu']){ echo 'checked';}}?>> Main Menu Sparrow System Control Login as ptzspwusr Type spastop.sh
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="monthly_process" type="checkbox" value="1" <?php if($data){if($data['monthly_process']){ echo 'checked';}}?>> This process to be conducted once in a month (i.e. the second week (Wednesday) of every month) Sparrow Files Compress and Rebuild process Main Menu System Maintenance Press Enter Press Enter Press Enter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="logon_pccspwmgr" type="checkbox" value="1" <?php if($data){if($data['logon_pccspwmgr']){ echo 'checked';}}?>> Logon as pccspwmgr and Run Weekly Bintable Update Sparrow Main Menu System Maintenance Scroll down to Weekly Bintable Update Follow the step in the below table -Do you wish to continue with this process? (Y/N) *Please note that Sparrow will be stopped* -Do the sum and file sizes match those sent by Centre? (Y/N) -Send screenshot to centre team If an: ERROR is displayed process stops. Get the latest file bintable.ntr.gz onto extracts and re-do the process Type Y ? Press Enter Type Y ? if the sizes match Type N ? if they don?t match (Old bintable will be restored) Press
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="backup" type="checkbox" value="1" <?php if($data){if($data['backup']){ echo 'checked';}}?>> Backup spn*logs Delete all spn*_log files of previous week(s)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="start_sparrow" type="checkbox" value="1" <?php if($data){if($data['start_sparrow']){ echo 'checked';}}?>> Start Sparrow
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_foreground" type="checkbox" value="1" <?php if($data){if($data['sparrow_foreground']){ echo 'checked';}}?>> Sparrow Foreground Files - Service Maintenance
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="type_0__type6" type="checkbox" value="1" <?php if($data){if($data['type_0__type6']){ echo 'checked';}}?>> Type O Type F6 Type Y
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="run_script" type="checkbox" value="1" <?php if($data){if($data['run_script']){ echo 'checked';}}?>> Run script A file named filelist.txt will be created on /sparrow/XX/PRD/sparrow8/files.
                                    </div>
								
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="sparrow_weekly_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="sparrow_weekly_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="sparrowweekly<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Sparrow Weekly Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_spweekly" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 8){  if($override->get('datacentre_facility_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('datacentre_facility_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Datacentre Facility Checklist </h1>
								<div class="pull-right">
									<a href="#datacenterfacility<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="audible_alerts" type="checkbox" value="1" <?php if($data){if($data['audible_alerts']){ echo 'checked';}}?>> Check and report any visible or audible alerts from the racks
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pdu" type="checkbox" value="1" <?php if($data){if($data['pdu']){ echo 'checked';}}?>> Check and report any alerts displayed on the power distribution units (PDUs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pwr_sup" type="checkbox" value="1" <?php if($data){if($data['pwr_sup']){ echo 'checked';}}?>> Check and report any alerts displayed on the power supplies of the servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="storage" type="checkbox" value="1" <?php if($data){if($data['storage']){ echo 'checked';}}?>> Check and report any alerts displayed on the storage disks of the servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="alert_tape" type="checkbox" value="1" <?php if($data){if($data['alert_tape']){ echo 'checked';}}?>> Check and report any alerts displayed on the I/O door of the tape libraries
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="messy_cabling" type="checkbox" value="1" <?php if($data){if($data['messy_cabling']){ echo 'checked';}}?>> Check and report any messy cabling in the Datacenter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="rack_airflow" type="checkbox" value="1" <?php if($data){if($data['rack_airflow']){ echo 'checked';}}?>> Ensure no airflow blockage in front of racks and AC
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ac_temperature" type="checkbox" value="1"<?php if($data){if($data['ac_temperature']){ echo 'checked';}}?>> Check AC temperature levels in Datacenter
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="dust_clean" type="checkbox" value="1" <?php if($data){if($data['dust_clean']){ echo 'checked';}}?>> Ensure pollutants and dust are cleaned from the floor and the walls
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cracks_holes" type="checkbox" value="1" <?php if($data){if($data['cracks_holes']){ echo 'checked';}}?>> Check if the walls and ceilings are intact with no cracks or holes
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="alert_suppression_system" type="checkbox" value="1" <?php if($data){if($data['alert_suppression_system']){ echo 'checked';}}?>> Check and report any alerts displayed on the fire suppression system dashboard
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ac_temp_ups" type="checkbox" value="1" <?php if($data){if($data['ac_temp_ups']){ echo 'checked';}}?>> Check AC temperature levels in the UPS room
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_generator" type="checkbox" value="1" <?php if($data){if($data['check_generator']){ echo 'checked';}}?>> Check Generator and confirm fuel and battery levels
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="alerts_ups_room" type="checkbox" value="1" <?php if($data){if($data['alerts_ups_room']){ echo 'checked';}}?>> Check and report any UPS alerts/alarms in the UPS room	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cleaning_datacenter" type="checkbox" value="1" <?php if($data){if($data['cleaning_datacenter']){ echo 'checked';}}?>> Cleaning staff to attend Datacenter on Monday, Wednesday and Friday
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cleaning_ups_room" type="checkbox" value="1" <?php if($data){if($data['cleaning_ups_room']){ echo 'checked';}}?>> Cleaning staff to attend UPS room on Fridays
                                    </div>

                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="dc_facility_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="dc_facility_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="datacenterfacility<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Datacenter Facility Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_datacenter" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 9){  if($override->get('netbackup_prd_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('netbackup_prd_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Daily Backups (Netbackup PRD) </h1>
								<div class="pull-right">
									<a href="#dailybackups<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="cognos" type="checkbox" value="1" <?php if($data){if($data['cognos']){ echo 'checked';}}?>> COGNOS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_COGNOS Backup selections: \\00172TANSQLPR1V\SQLBackups\Cognos\FULL\00172TANSQLPR2V Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="nida" type="checkbox" value="1" <?php if($data){if($data['nida']){ echo 'checked';}}?>> NIDA Server name: 00172TANNIDA02V IP address: 10.231.128.201 Netbackup Policy: 00172TANNIDA02V_NIDA Backup selections: \\00172TANSQLPR1V\SQLBackups\NIDA\FULL\00172TANNIDA02V Run info: Scheduled to run from 0400HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cims" type="checkbox" value="1" <?php if($data){if($data['cims']){ echo 'checked';}}?>> CIMS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_CIMS Backup selections: \\00172TANSQLPR1V\SQLBackups\CIMS\FULL\00172TANCIMS02V Run info: Scheduled to run from 2000HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pbb" type="checkbox" value="1" <?php if($data){if($data['pbb']){ echo 'checked';}}?>> PBB Server name: 39154TZAPBBCM08V IP address: 10.231.116.57 Netbackup Policy: 39154TZAPBBCM08V Backup selections: (a) C:\Notes (b) D:\Everything Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="mdm" type="checkbox" value="1" <?php if($data){if($data['mdm']){ echo 'checked';}}?>> MDM Server name: 00172TANMDMPR1V IP address: 10.231.116.49 Netbackup Policy: 00172TANSQLPR1V_MDM Backup selections: \\00172TANSQLPR1V\SQLBackups\MDM\FULL\00172tanmdmpr1v Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="users" type="checkbox" value="1" <?php if($data){if($data['users']){ echo 'checked';}}?>> USERS Server name: sbictanfls02 IP address: 10.231.128.41 Netbackup Policy: sbictanfls02 Backup selections:(a)DepartmentHeads (b)Departments (c)ExcoMembers (d)Managers (e)Officers (f)TeamLeaders Run info: Scheduled to run from 2100HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="dsx" type="checkbox" value="1" <?php if($data){if($data['dsx']){ echo 'checked';}}?>> DSX Server name: 00172tandswprd1 IP address: 10.231.128.82 Netbackup Policy: 00172TANSQLPR1V_DSX Backup selections: \\00172TANSQLPR1V\SQLBackups\DatastoreDSX\FULL\00172tandswprd1 Netbackup Policy: 00172tandswprd1_Filesystem Backup selections: (a)D:\Program Files\Microsoft SQL Server\MSSQL10_50.MSSQLSERVER\MSSQL\DATA (b)D:\Program Files\Hitec Laboratories Ltd\DatastoreDSX (c)E:\WDMDevice (d)I:\WDMDevice (e)I:\VirtualMedia (f)D:\dsxwork (g)D:\DSX (h)E:\DSX_Migration_WDMDevice (i)D:\DSX_Import Run info: Scheduled to run from 0000HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="inhouse_dev_1" type="checkbox" value="1" <?php if($data){if($data['inhouse_dev_1']){ echo 'checked';}}?>> Inhouse Development tools 1 (Forex portal,Dangote,Documents trackers,e-market forms,Forotra,RAA) IP Address: 10.231.116.73 Netbackup Policy: Forex_tool Backup selections:(a)/data/mysql (b)/diskb (c)/etc/httpd (d) /usr/lib/systemd/system Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gpod" type="checkbox" value="1" <?php if($data){if($data['gpod']){ echo 'checked';}}?>> GPOD Server names: 00172TANGPOD01v,00172TANGPOD02v IP addresses: 10.231.116.121,10.231.116.126 Netbackup Policy: 00172TANSQLPR1V_GPOD Backup selections: \\00172TANSQLPR1V\SQLBackups\GPOD\FULL\00172TANGPOD01V Netbackup Policy:00172tangpod01v Backup selections: E:\GPOD\DatabaseBackups Netbackup Policy:00172tangpod02v Backup selections:(a)E:\GCE\BackPath (b)E:\GPOD\DailyReports (c)E:\GCE\DatabaseBackups (d)E:\GPOD\DatabaseBackups Run info:Scheduled to run from 2200HRS	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cams" type="checkbox" value="1" <?php if($data){if($data['cams']){ echo 'checked';}}?>> CAMS Server name: 00172TANCAMS1v IP address: 10.231.116.83 Netbackup policy: 00172TANCAMS1v Backup selections: D:\ Run info: Scheduled to run from 2100HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cdm" type="checkbox" value="1" <?php if($data){if($data['cdm']){ echo 'checked';}}?>> CDM database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_CDM Backup selections: \\00172TANSQLPR1V\SQLBackups\CDM\FULL\00172TANBNAPR2V Run info: Scheduled to run from 0430HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="dap" type="checkbox" value="1" <?php if($data){if($data['dap']){ echo 'checked';}}?>> DAP database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_DAP Backup selections: \\00172TANSQLPR1V\SQLBackups\DAP\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="dts" type="checkbox" value="1" <?php if($data){if($data['dts']){ echo 'checked';}}?>> DTS database Server: 00172TANSQLPR2V IP address: 10.231.128.65 Netbackup Policy: 00172TANSQLPR1V_DTS Backup selections: \\00172TANSQLPR1V\SQLBackups\DTS\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gepg" type="checkbox" value="1" <?php if($data){if($data['gepg']){ echo 'checked';}}?>> GePG database Server: 00172TANGPGPR1V IP address: 10.231.123.102 Netbackup Policy: 00172TANSQLPR1V_GePG Backup selections: \\00172TANSQLPR1V\SQLBackups\DTS\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="kprinter" type="checkbox" value="1" <?php if($data){if($data['kprinter']){ echo 'checked';}}?>> KPrinter database Server: 00172TANKPPR01V IP address: 10.231.116.78 Netbackup Policy: 00172TANSQLPR1V_KPRINTER Backup selections: \\00172TANSQLPR1V\SQLBackups\KPRINTER\00172TANKPPR01V\FULL Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="mobile" type="checkbox" value="1" <?php if($data){if($data['mobile']){ echo 'checked';}}?>> Mobile Bulk Payment: 00172tanmbppr1v IP address: 10.231.128.201 Backup selections: /opt/mobilepayments/app/Input /opt/mobilepayments/app/Output Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ibm_datapower" type="checkbox" value="1" <?php if($data){if($data['ibm_datapower']){ echo 'checked';}}?>> IBM Datapower: esbedpp01v.tz.sbicdirectory.com esbedpp02v.tz.sbicdirectory.com esbedppv.tz.sbicdirectory.com (VIP) IP address: 10.231.123.84 10.231.123.85 10.231.123.90 Backup selections: All_Local_drives Run info: Scheduled to run from 2200HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="e_journal" type="checkbox" value="1" <?php if($data){if($data['e_journal']){ echo 'checked';}}?>> E-Journal & Custodian tool: 00172TANDETR02V IP address: 10.231.128.30 Netbacup policy: \\00172TANSQLPR1V\SQLBackups\DISTRIBUTOR\PRD Backup selections: C:\ D:\ F:\ Run info: Scheduled to run from 2300HRS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="inhouse_dev_2" type="checkbox" value="1" <?php if($data){if($data['inhouse_dev_2']){ echo 'checked';}}?>> Inhouse Development tools 2 (almuntazirintegration) IP ADDRESS 10.231.116.75 Netbackup Policy: Forex_tool Backup selections:(a)/data/mysql (b)/diskb (c)/etc/httpd (d) /usr/lib/systemd/system Run info: Scheduled to run from 2200HRS
                                    </div>

                                    
                                   <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="daily_backups_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="daily_backups_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="dailybackups<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Netbackup Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_netbackup" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 10){  if($override->get('sod_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('sod_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>SOD Checklist </h1>
								<div class="pull-right">
									<a href="#sodchecklist<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="payment" type="checkbox" value="1" <?php if($data){if($data['payment']){ echo 'checked';}}?>> Confirm if the payment jobs have been loaded in today's schedule on Control M. This should be checked early before 08:00 AM daily. VPSBT,CUDEL,PYNPY,AOUDF10,AOUDF01,AOUDF02,AOUDF03 ->For Public holidays, Saturday and Sunday the jobs should not be seen in today's schedule.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="datastore" type="checkbox" value="1" <?php if($data){if($data['datastore']){ echo 'checked';}}?>> Confirm if Datastore & Datastore DSXcold services are up and runnning in DatastoreDSX server (10.231.128.82) DR server 10.231.145.90
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cash_encashment" type="checkbox" value="1" <?php if($data){if($data['cash_encashment']){ echo 'checked';}}?>> Confirm Cash Encashment job is loaded
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cheque" type="checkbox" value="1" <?php if($data){if($data['cheque']){ echo 'checked';}}?>> CHQENC- On weekly CHQENC1- on Saturday CHQENC2 on Sunday
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="visa" type="checkbox" value="1" <?php if($data){if($data['visa']){ echo 'checked';}}?>> Copy VISA, UPI & MASTERCARD files from sparrow to transactability folder for recon
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="base_ii_ena" type="checkbox" value="1" <?php if($data){if($data['base_ii_ena']){ echo 'checked';}}?>> Perform Base II ENA processing
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cfao" type="checkbox" value="1" <?php if($data){if($data['cfao']){ echo 'checked';}}?>> Confirm CFAO and Maurel statements has been sent
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_restore" type="checkbox" value="1" <?php if($data){if($data['sparrow_restore']){ echo 'checked';}}?>> Perform Sparrow restore from NetBackup Appliance. Sparrow Restore source 10.231.33.97 for DR restore and 10.231.35.244 for PRD restore Sparrow restore destination 10.231.35.244 for DR restore and 10.231.33.97 for PRD restore please exclude the ssock.dat and vsock.dat files
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="monitoring_backups" type="checkbox" value="1" <?php if($data){if($data['monitoring_backups']){ echo 'checked';}}?>> Monitoring Backups in NetBackup and report for any failed backups.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_eod_reports" type="checkbox" value="1" <?php if($data){if($data['sparrow_eod_reports']){ echo 'checked';}}?>> Confirm if sparrow EOD reports are available in datastore
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="finacle_src_refresh" type="checkbox" value="1" <?php if($data){if($data['finacle_src_refresh']){ echo 'checked';}}?>> Perform Finacle source refresh from Prod to DR (This has to be done on Sundays)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="codac" type="checkbox" value="1" <?php if($data){if($data['codac']){ echo 'checked';}}?>> CODAC&PRTG monitoring
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="control_m" type="checkbox" value="1" <?php if($data){if($data['control_m']){ echo 'checked';}}?>> Control M health check
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="netbackup" type="checkbox" value="1" <?php if($data){if($data['netbackup']){ echo 'checked';}}?>> Copy Netbackup report from outlook to \\sbictanfls02\Departments\IT\IT Shared Folder\Data Center Docs\finacle notes\Netbackup\Netbackup daily report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="optimization" type="checkbox" value="1" <?php if($data){if($data['optimization']){ echo 'checked';}}?>> Run query every morning month end for optimization of PSP02 Job Performance during EOD.Path to access the query \\sbictanfls02\Departments\IT\IT Shared Folder\Data Center Docs\EOD Database queries
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sparrow_net" type="checkbox" value="1" <?php if($data){if($data['sparrow_net']){ echo 'checked';}}?>> Check if SparrowNET and Host required status is showing ONLINE-ONLINE
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="connectivity" type="checkbox" value="1" <?php if($data){if($data['connectivity']){ echo 'checked';}}?>> Confirm Connectivity to DR Site (ping 10.231.145.18)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="uat_eod" type="checkbox" value="1" <?php if($data){if($data['uat_eod']){ echo 'checked';}}?>> Monitoring incomplete Production or UAT EOD run
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="linux_disk_space" type="checkbox" value="1" <?php if($data){if($data['linux_disk_space']){ echo 'checked';}}?>> LINUX - Ensure there is enough disk space on the filesystems, if not clear files or escalate to respective teams
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="linux_cluster" type="checkbox" value="1" <?php if($data){if($data['linux_cluster']){ echo 'checked';}}?>> LINUX - Ensure Cluster services are up and running with no errors
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="linux_logs" type="checkbox" value="1" <?php if($data){if($data['linux_logs']){ echo 'checked';}}?>> Copy Linux server logs from ptzjump1:/tools/dailylogs/ to \\SBICTANFLS02\Operating systems\
                                    </div>
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="sod_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="sod_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="sodchecklist<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>SOD Checklist Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_sod" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 11){  if($override->get('dr_restore_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('dr_restore_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>DR Restore Weekly Checklist </h1>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">
									<?php if($user->data()->accessLevel == 3){ ?>
                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="datastore" type="checkbox" value="1" <?php if($data){if($data['datastore']){ echo 'checked';}}?>> Datastore(DSX) (10.231.145.90)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="migration" type="checkbox" value="1" <?php if($data){if($data['migration']){ echo 'checked';}}?>> E:DSX_Migration_WDMDevice -Depot1 -Depot3 -Depot4
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="wdmdevice" type="checkbox" value="1" <?php if($data){if($data['wdmdevice']){ echo 'checked';}}?>> I:WDMDevice -Depot2
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="sql_server" type="checkbox" value="1" <?php if($data){if($data['sql_server']){ echo 'checked';}}?>> From SQL server: .KYC_Lookup .DatastoreReporting .DatastoreCold .Datastore .Customers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gepg" type="checkbox" value="1" <?php if($data){if($data['gepg']){ echo 'checked';}}?>> GePG server Source : 10.231.123.102 C:\xampp C:\Users Destination IP Adress:10.231.29.215 Server name: 00172TANGPGDR1V Folders to be restored C:\xampp C:\Users
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="nida" type="checkbox" value="1" <?php if($data){if($data['nida']){ echo 'checked';}}?>> Nida restore source 10.231.128.201 and Destination 10.231.145.143
                                    </div>
									<?php } elseif($user->data()->accessLevel == 4){ ?>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="db_gepg" type="checkbox" value="1" <?php if($data){if($data['db_gepg']){ echo 'checked';}}?>> DB Restore for GePG server IP Adress:10.231.29.221 Path : 00172tansqlpr1v/SQLBACKUPS/GEPG/FULL
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="db_nida" type="checkbox" value="1" <?php if($data){if($data['db_nida']){ echo 'checked';}}?>> DB Restore for NIDA 10.231.116.247\SQLBackups\NIDA\FULL\00172TANNIDA02V
                                    </div>
									<?php } elseif($user->data()->accessLevel == 5){ ?>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="test_gepg" type="checkbox" value="1" <?php if($data){if($data['test_gepg']){ echo 'checked';}}?>> Test /validate 00172TANGPGDR1V (GEPG) data are available with the correct date
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="test_nida" type="checkbox" value="1" <?php if($data){if($data['test_nida']){ echo 'checked';}}?>> Test/validate 00172TANNIDA02V (NIDA) data are available with the correct date
                                    </div>
									<?php }?>
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
										
										<?php if($user->data()->accessLevel == 3){?>
											<input type="hidden" name="db_gepg" value="<?=$data['db_gepg']?>">
											<input type="hidden" name="db_nida" value="<?=$data['db_nida']?>">
											<input type="hidden" name="test_gepg" value="<?=$data['test_gepg']?>">
											<input type="hidden" name="test_nida" value="<?=$data['test_nida']?>">
											<input type="submit" name="dr_weekly_draft" value="Save" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<?php }elseif($user->data()->accessLevel == 4){?>
											<input type="hidden" name="datastore" value="<?=$data['datastore']?>">
											<input type="hidden" name="migration" value="<?=$data['migration']?>">
											<input type="hidden" name="wdmdevice" value="<?=$data['wdmdevice']?>">
											<input type="hidden" name="sql_server" value="<?=$data['sql_server']?>">
											<input type="hidden" name="gepg" value="<?=$data['gepg']?>">
											<input type="hidden" name="nida" value="<?=$data['nida']?>">
											<input type="hidden" name="test_gepg" value="<?=$data['test_gepg']?>">
											<input type="hidden" name="test_nida" value="<?=$data['test_nida']?>">
											<input type="submit" name="dr_weekly_draft" value="Save" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<?php }elseif($user->data()->accessLevel == 5){?>
											<input type="hidden" name="datastore" value="<?=$data['datastore']?>">
											<input type="hidden" name="migration" value="<?=$data['migration']?>">
											<input type="hidden" name="wdmdevice" value="<?=$data['wdmdevice']?>">
											<input type="hidden" name="sql_server" value="<?=$data['sql_server']?>">
											<input type="hidden" name="gepg" value="<?=$data['gepg']?>">
											<input type="hidden" name="nida" value="<?=$data['nida']?>">
											<input type="hidden" name="db_gepg" value="<?=$data['db_gepg']?>">
											<input type="hidden" name="db_nida" value="<?=$data['db_nida']?>">
											<input type="submit" name="dr_weekly_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
											<input type="submit" name="dr_weekly_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<?php }?>

                                    </div>
                                </form>
                            </div>
						</div>
					<?php }elseif($_GET['id'] == 12){  if($override->get('finacle_eod_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('finacle_eod_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>Finacle EOD Checklist</h1>
								<div class="pull-right">
									<a href="#feod<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="run_sparrow" type="checkbox" value="1" <?php if($data){if($data['run_sparrow']){ echo 'checked';}}?>> Run Sparrow ATM EOD (ref: Sparrow eod checklist)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="table_free_space" type="checkbox" value="1" <?php if($data){if($data['table_free_space']){ echo 'checked';}}?>> Execute query to check table space for CUSTOM_TBLS, the PCT. Free space should be >20%
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="disk_space" type="checkbox" value="1" <?php if($data){if($data['disk_space']){ echo 'checked';}}?>> Check disk space for all disk in CORCAPW and CORJAPW servers. Used space should not be more than 80% (use df -k)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gpod_eod" type="checkbox" value="1" <?php if($data){if($data['gpod_eod']){ echo 'checked';}}?>> Confirm GPOD EOD has run and the files are received in TBMS
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="cheque" type="checkbox" value="1" <?php if($data){if($data['cheque']){ echo 'checked';}}?>> Confirm CHQENC (Cheque encashment) job has run in Control M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_uodora" type="checkbox" value="1" <?php if($data){if($data['check_uodora']){ echo 'checked';}}?>> Check space for uodora, gpfsfcb and gpfsfin (admin, 4,1,0)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="confirm_eod" type="checkbox" value="1" <?php if($data){if($data['confirm_eod']){ echo 'checked';}}?>> Confirm EOD jobs are loaded with the correct dates
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="hold_hbkcop" type="checkbox" value="1" <?php if($data){if($data['hold_hbkcop']){ echo 'checked';}}?>> Hold the HBKCOP job on Control M before starting EOD and will be released once the pricing files are received.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="hold_mmf" type="checkbox" value="1" <?php if($data){if($data['hold_mmf']){ echo 'checked';}}?>> Hold MMF jobs on EOM run date on EOD
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="confirm_no_file" type="checkbox" value="1" <?php if($data){if($data['confirm_no_file']){ echo 'checked';}}?>> Confirm if there is no file in /gpfsfcb/prd/TZ/in/pricing path within CORCAPW servers. If there is a file backup in different directory and delete the file in pricing directory after confirmation from pricing team	
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="update_patches" type="checkbox" value="1" <?php if($data){if($data['update_patches']){ echo 'checked';}}?>> UPDATE PATCHES (If any available for the day)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="restart_finacle_services" type="checkbox" value="1" <?php if($data){if($data['restart_finacle_services']){ echo 'checked';}}?>> Restart Finacle services and JBOSS services for CORCAPW1 & CORCAPW2 node by node and CORJAPW1 and CORJAPW2 node by node
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_finacle_services" type="checkbox" value="1" <?php if($data){if($data['check_finacle_services']){ echo 'checked';}}?>> Check if all Finacle services are up(admin view)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="tbns_check_space" type="checkbox" value="1" <?php if($data){if($data['tbns_check_space']){ echo 'checked';}}?>> Check the space on TBMS both nodes (df - k )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="confirm_mqread" type="checkbox" value="1" <?php if($data){if($data['confirm_mqread']){ echo 'checked';}}?>> Confirm if MQREAD service has been restarted (Check the PID if is updated)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="eft" type="checkbox" value="1" <?php if($data){if($data['eft']){ echo 'checked';}}?>> Check if there is any additional evening EFT session for the day
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="query_run" type="checkbox" value="1" <?php if($data){if($data['query_run']){ echo 'checked';}}?>> Check if below query will return any record, If yes call Application team before EOD started for logs to be collected and escalation to be done. select * from tbaadm.aed where TRACE_NUM2 in (select concat ('PAYEX-',instn_no) from custom.c_procpay_st where status='R' and to_date(process_date,'DD-MM-YYYY')=trunc(sysdate) and bank_id='TZ' )
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="controlm_job" type="checkbox" value="1" <?php if($data){if($data['controlm_job']){ echo 'checked';}}?>> Hold TZ_EOD_JOB_GRP_007 job from control m and release when SNPRIBALANCEDWLD received under gpfsun/prd/Mediation/Bal/in
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="start_eod" type="checkbox" value="1" <?php if($data){if($data['start_eod']){ echo 'checked';}}?>> Start finacle EOD - from ControL M
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="pricing_tbms" type="checkbox" value="1" <?php if($data){if($data['pricing_tbms']){ echo 'checked';}}?>> PRICING processing(Release TBMS jobs)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="copy_gl" type="checkbox" value="1" <?php if($data){if($data['copy_gl']){ echo 'checked';}}?>> Copy GL interest substitution report (GLIRR) to \\sbictanfls02\Departments\Sub Departments\GLIRR Report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="eod_reoprts" type="checkbox" value="1" <?php if($data){if($data['eod_reoprts']){ echo 'checked';}}?>> Prepare and circulate the finacle EOD, Pricing EOD and FAILED JOBS reports.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="post_eod_checks" type="checkbox" value="1" <?php if($data){if($data['post_eod_checks']){ echo 'checked';}}?>> Post EOD Checks- Check if reports have been indexed to datastore server
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="saa_swift" type="checkbox" value="1" <?php if($data){if($data['saa_swift']){ echo 'checked';}}?>> SAA Swift Incoming / Outgoing Messages
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="branch_cash" type="checkbox" value="1" <?php if($data){if($data['branch_cash']){ echo 'checked';}}?>> Branch Cash Holding Part 1 & 2 (found under Finacle PDF Reports)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="atm_activity" type="checkbox" value="1" <?php if($data){if($data['atm_activity']){ echo 'checked';}}?>> ATM Activity report(Under sparrow EOD report)
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="release_mmf" type="checkbox" value="1" <?php if($data){if($data['release_mmf']){ echo 'checked';}}?>> Release MMF jobs after leg2 job from pricing is done
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="gatherstats" type="checkbox" value="1" <?php if($data){if($data['gatherstats']){ echo 'checked';}}?>> Run gatherstats for Database optimization(To be run on weekly basis on Saturday) and send confirmation email
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="after_reports" type="checkbox" value="1" <?php if($data){if($data['after_reports']){ echo 'checked';}}?>> After the reports run go to /fincor/clog/TZPRD/cdci_logs/TZBJMS and /fincor/clog/TZPRD/cdci_logs/CRTLM directory in CORCAPW server and run this command find. -name fatal*
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="extract_all" type="checkbox" value="1" <?php if($data){if($data['extract_all']){ echo 'checked';}}?>> Extract all the resulting fatal logs from the command above with respect to branch number and job name
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_all_failed" type="checkbox" value="1" <?php if($data){if($data['check_all_failed']){ echo 'checked';}}?>> Check all the failed jobs from the Jobwise report
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="send_extract" type="checkbox" value="1" <?php if($data){if($data['send_extract']){ echo 'checked';}}?>> Send the extracted fatal logs and failed jobs above to Core Banking team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="once_service" type="checkbox" value="1" <?php if($data){if($data['once_service']){ echo 'checked';}}?>> Once services restart is done for CORJAPW servers check the sever.log for any service failure /fincor/japp/TZPRD/jboss-eap[1]7.1/standalone/log
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_below" type="checkbox" value="1" <?php if($data){if($data['check_below']){ echo 'checked';}}?>> Check on the below logs if transactions are going through successful for TBMS,EE,NBL,Internet banking etc on the below path /fincor/japp/TZPRD/common/log/fsb/ in CORJAPW servers
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="start_ods_eod" type="checkbox" value="1" <?php if($data){if($data['start_ods_eod']){ echo 'checked';}}?>> Starting ODS EOD
                                    </div>
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="finacle_eod_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="finacle_eod_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="feod<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>Finacle EOD Checklist Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_feod" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php }elseif($_GET['id'] == 13){  if($override->get('ods_eod_checklist', 'checklist_date', date('Y-m-d'))){$data=$override->get('ods_eod_checklist', 'checklist_date', date('Y-m-d'))[0];}?>
						<div class="col-md-offset-1 col-md-8">
							<div class="head clearfix">
								<div class="isw-ok"></div>
								<h1>ODS Checklist for EOD </h1>
								<div class="pull-right">
									<a href="#odschecklist<?=$data['id']?>" role="button" class="btn btn-info" data-toggle="modal">Handover</a>&nbsp;
								</div>
							</div>
                            <div class="block-fluid">
                                <form id="validation" method="post">

                                    <div class="row-form clearfix">
										 <label class="checkbox"><input name="ods_login" type="checkbox" value="1" <?php if($data){if($data['ods_login']){ echo 'checked';}}?>> Check if you are able to login to the ODS Production Server, using PUTTY. Use dsadm as a username If you are facing issues with login immediately raise an IR with Linux team and investigate on the same and have it fixed ASAP. This is critical as any issues here would have EOD impact.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="dsgw" type="checkbox" value="1" <?php if($data){if($data['dsgw']){ echo 'checked';}}?>> Login into DSGW1 using PUTTY and check if all the disk spaces are below 70 % usage. Fire the below command to get the list. df - g In the generated list look for %used column to identify. If any is above 70 % raise an IR with Linux team to have it increased accordingly.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="control_m" type="checkbox" value="1" <?php if($data){if($data['control_m']){ echo 'checked';}}?>> Confirm Control M login is working fine. If any issue with login raise IR with Control M team.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="before_eod" type="checkbox" value="1" <?php if($data){if($data['before_eod']){ echo 'checked';}}?>> Before the EOD starts ensure no job under is red (aborted). If so investigate ASAP to check if its server issue or not. If situation persists raise IR with Linux and Control M team to assist and also get assistance of ODS team.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="inbound_files" type="checkbox" value="1" <?php if($data){if($data['inbound_files']){ echo 'checked';}}?>> Check if all Inbound files arriving at input directory using fteagent & MQFTE are having permissions of 660. This may cause ODS jobs for the peripherals to abort due to invalid permissions. So if you notice job aborting because of this then login using fteagent credentials in DSGW1/DSGW2 And change the permissions to 660. If issue persists get in touch African Integration Service Team
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ods_eod_start" type="checkbox" value="1" <?php if($data){if($data['ods_eod_start']){ echo 'checked';}}?>> After ODS EOD starts Check if no job is getting aborted. If yes get the SYSOUT description from Control M job. Also login using director to investigate and fix. Try to do a re-run of the job once. If still problem persists contact the Infosys resources.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="ods_eod_complete" type="checkbox" value="1" <?php if($data){if($data['ods_eod_complete']){ echo 'checked';}}?>> Once EOD finishes go to Output folder and check if all the files are picked up. Also check the count of each individual outbound file in the scratch folder too to confirm all files were generated for the current EOD date. If any difference in the number of files kindly investigate. If any file is stuck in output folder get in touch with MQFTE team to have it picked.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="inbound_arrived" type="checkbox" value="1" <?php if($data){if($data['inbound_arrived']){ echo 'checked';}}?>> If any Inbound file hasn't arrived even after the EOD has finished and if it is blocking the run of another job them raise an IR with MQFTE to find the reason behind the missing file and follow up until it's resolved as it could have business impact.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="month_end_run" type="checkbox" value="1" <?php if($data){if($data['month_end_run']){ echo 'checked';}}?>> If it's a Month-End run then Extra files would be generated for CRB and PROBE. Ensure that happens and check if the files are generated after Month-End run finishes.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="eod_completed_daily_stats" type="checkbox" value="1" <?php if($data){if($data['eod_completed_daily_stats']){ echo 'checked';}}?>> Once EOD is completed make sure that Daily STATS are sent out. In normal conditions ODS EOD should finish in 4 hours 30 min. If you notice a different behavior then, send a mail to the BANK ODS team to investigate on this. This could be because of Server/DB load.
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="prob_jobs_completed" type="checkbox" value="1" <?php if($data){if($data['prob_jobs_completed']){ echo 'checked';}}?>> Once probe jobs competed, run the attached query to check if data for the current date updated/generated
                                    </div>
									<div class="row-form clearfix">
										 <label class="checkbox"><input name="check_bizwize" type="checkbox" value="1" <?php if($data){if($data['check_bizwize']){ echo 'checked';}}?>> Check if the BIZWIZE job completed successful and the files are generated and transferred
                                    </div>
									
                                    
                                    <div class="footer tar">
										<input type="hidden" name="id" value="<?=$data['id']?>">
                                        <input type="submit" name="ods_eod_draft" value="Save as Draft" class="btn btn-info" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
										<input type="submit" name="ods_eod_final" value="Save as Final" class="btn btn-warning" <?php if($data){if(!$data['status']==0){echo 'disabled';}}?>>
                                    </div>
                                </form>
								<div class="modal fade" id="odschecklist<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<form method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4>ODS Checklist Handover</h4>
												</div>
																
												<div class="row-form clearfix">
													<div class="col-md-3">Staff</div>
													<div class="col-md-9">
														<select name="staff" style="width: 100%;" required>
															<option value="">Select</option>
															<?php foreach($override->get('user', 'accessLevel', 3) as $staff){?>
																<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
															<?php }?>
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
													<input type="hidden" name="id" value="<?=$data['id']?>">
													<input type="submit" name="handover_ods" value="Handover" class="btn btn-success" >
													<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
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
	<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>