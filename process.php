
<?php
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
if ($_GET['cnt'] == 'transfer_pc') {
	if($override->get('assets', 'staff_id', $_GET['getUid'])){
    $assets = $override->get('assets', 'staff_id', $_GET['getUid'])[0];$req=$override->getNews('computer_request', 'id', $assets['request_id'], 'status', 1)[0];
	$asset_type=$override->get('assets_type', 'id', $assets['asset_type'])[0];$spec=$override->get('computer_specs', 'request_id', $assets['request_id'])[0];
	$asset_history=$override->get('asset_history', 'asset_id', $assets['id'])[0];?>
	<div class="row-form clearfix">
        <div class="col-md-3">Job Title:</div> 
		<div class="col-md-9">
			<input value="<?=$req['job_title']?>" class="validate[required]" type="text" name="name" id="name" disabled/>
		</div>
	</div>
	
	<div class="row-form clearfix">
        <div class="col-md-3">Asset Type:</div> 
		<div class="col-md-9">
			<input value="<?=$asset_type['name']?>" class="validate[required]" type="text" name="name" id="name" disabled/>
		</div>
	</div>
	<div class="row-form clearfix">
		<div class="col-md-3">Specifications:</div>
		<div class="col-md-9">
			<textarea name="comments" placeholder="" disabled>Brand: <?=$spec['brand']?>, Processor: <?=$spec['processor']?>, Ram: <?=$spec['ram']?>. HDD: <?=$spec['hdd']?></textarea>
		</div>
	</div>
	<input type="hidden" name="asset_id" value="<?=$assets['id']?>">
	<input type="hidden" name="asset_history_id" value="<?=$asset_history['id']?>">
    
<?php }} elseif ($_GET['cnt'] == 'district') {
    $wards = $override->get('ward', 'district_id', $_GET['getUid']); ?>
    <option value="">Select Ward</option>
    <?php foreach ($wards as $ward) { ?>
        <option value="<?= $ward['id'] ?>"><?= $ward['name'] ?></option>
    <?php }
} elseif ($_GET['cnt'] == 'download') {
    $user->exportData('citizen', 'citizen_data'); ?>

<?php } elseif ($_GET['cnt'] == 'study') {
    $sts = $override->get_new('study_files', 'study_id', $_GET['getUid'],'type',$_GET['type']) ?>
    <option value="">Select File</option>
    <?php foreach ($sts as $st) { ?>
        <option value="<?= $st['id'] ?>"><?= $st['name'] ?></option>
<?php }
} ?>