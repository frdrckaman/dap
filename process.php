
<?php
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
if ($_GET['cnt'] == 'sql_backup') {if($_GET['getUid']==2){?>
    <div class="row-form clearfix">
        <div class="col-md-1">Comments:</div>
        <div class="col-md-9">
            <textarea name="sql_backup_config_note" placeholder="Additional Comments"></textarea>
        </div>
    </div>
<?php }elseif($_GET['getUid']==1){?>

<?php }} ?>