
<div class="menu">                

            <div class="breadLine">            
                <div class="arrow"></div>
                <div class="adminControl active">
                    Hi, <?=$user->data()->firstname?>
                </div>
            </div>

            <div class="admin">
                <div class="image">
                    <img src="img/usr.png" height="60px" width="60px" />                
                </div>
                <ul class="control">                
                    <li><span class="glyphicon glyphicon-comment"></span> <a href="#">Messages</a> <a href="messages.html" class="caption red">12</a></li>
                    <li><span class="glyphicon glyphicon-cog"></span> <a href="#">Settings</a></li>
                    <li><span class="glyphicon glyphicon-share-alt"></span> <a href="logout.php">Logout</a></li>
                </ul>
                <div class="info">
                    <span>Welcom back! Your last visit: <?=$user->data()->last_login?></span>
                </div>
            </div>

            <ul class="navigation">            
                <li class="active">
                    <a href="dashboard.php">
                        <span class="isw-grid"></span><span class="text">Dashboard</span>
                    </a>
                </li>
				<?php if($user->data()->power == 0){?>
                <li class="openable">
                    <a href="request.php">
                        <span class="isw-list"></span><span class="text">Data Center Access</span>
                    </a>
                    <ul>
                        <li>
                            <a href="request.php">
                                <span class="glyphicon glyphicon-th"></span><span class="text">Add Request</span>
                            </a>                  
                        </li>          
                        <li>
                            <a href="request_list.php">
                                <span class="glyphicon glyphicon-th-large"></span><span class="text">Request List</span>
                            </a>                  
                        </li>
                    </ul>                
                </li>
				<li class="openable">
                    <a href="#">
                        <span class="isw-list"></span><span class="text">Check List</span>
                    </a>
                    <ul>
                        <li>
                            <a href="checklist.php?id=1">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> ORACLE DBA Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=2">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> SQL DBA Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=3">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Finacle EOY Checklist </span>
                            </a>                  
                        </li>	
						<li>
                            <a href="checklist.php?id=4">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> ENA Checklist </span>
                            </a>                  
                        </li>	
						<li>
                            <a href="checklist.php?id=5">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Patch Deployment Checklist-PRD </span>
                            </a>                  
                        </li>	
						<li>
                            <a href="checklist.php?id=6">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Sparrow EOD Checklist </span>
                            </a>                  
                        </li>	
						<li>
                            <a href="checklist.php?id=7">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Sparrow Weekly Maintenance Checklist </span>
                            </a>                  
                        </li>	
						<li>
                            <a href="checklist.php?id=8">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Datacentre Facility Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=9">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Daily Backups (Netbackup PRD) Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=10">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> SOD Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=11">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> DR Restore Weekly Checklist </span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=12">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> Finacle EOD Checklist</span>
                            </a>                  
                        </li>
						<li>
                            <a href="checklist.php?id=13">
                                <span class="glyphicon glyphicon-th"></span><span class="text"> ODS Checklist for EOD </span>
                            </a>                  
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-th-large"></span><span class="text"> Checklist History </span>
                            </a>                  
                        </li>
                    </ul>                
                </li>
				<?php }?>
				<?php if($user->data()->power ==1){?>
                <li class="openable">
                    <a href="#">
                        <span class="isw-list"></span><span class="text">Request Approval</span>
                    </a>
                    <ul>
                        <li>
                            <a href="approval.php">
                                <span class="glyphicon glyphicon-th"></span><span class="text">Approve Request</span>
                            </a>
                        </li>
                        <li>
                            <a href="approval_list.php">
                                <span class="glyphicon glyphicon-th-large"></span><span class="text">Approval History</span>
                            </a>
                        </li>
                    </ul>
                </li>
				<?php }?>
            </ul>

            <div class="dr"><span></span></div>

            <div class="widget-fluid">
                <div id="menuDatepicker"></div>
            </div>

            <div class="dr"><span></span></div>

            <div class="widget">

                <div class="input-group">
                    <input id="appendedInputButton" class="form-control" type="text">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                    </div>
                </div>           

            </div>

            <div class="dr"><span></span></div>

            <div class="widget-fluid">

                <div class="wBlock clearfix">
                    <div class="dSpace">
                        <h3>Total Requests</h3>
                        <?php if($user->data()->power == 1){?>
							<span class="number"><?=$override->getNo('request')?></span>
							<span><?=$override->getCount('request', 'status', 0)?> <b>Pending</b></span>
							<span><?=$override->getCount('request', 'status', 1)?> <b>Approved</b></span>
							<span><?=$override->getCount('request', 'status', 2)?> <b>Declined</b></span>
						<?php }else{?>
							<span class="number"><?=$override->getCount('request', 'staff_id', $user->data()->id)?></span>
							<span><?=$override->countData('request', 'staff_id', $user->data()->id, 'status', 0)?> <b>Pending</b></span>
							<span><?=$override->countData('request', 'staff_id', $user->data()->id, 'status', 1)?> <b>Approved</b></span>
							<span><?=$override->countData('request', 'staff_id', $user->data()->id, 'status', 2)?> <b>Declined</b></span>
						<?php }?>
                    </div>
                    <div class="rSpace">
                        <h3>Today</h3>
						<?php if($user->data()->power == 1){?>
							<span><?=$override->countData('request', 'start_date', date('Y-m-d'), 'status', 0)?> <b>Pending</b></span>
							<span><?=$override->countData('request', 'start_date', date('Y-m-d'), 'status', 1)?> <b>Approved</b></span>
							<span><?=$override->countData('request', 'start_date', date('Y-m-d'), 'status', 2)?> <b>Declined</b></span>
						<?php }else{?>
							<span><?=$override->countData3('request', 'staff_id', $user->data()->id, 'status', 0, 'start_date', date('Y-m-d'))?> <b>Pending</b></span>
							<span><?=$override->countData3('request', 'staff_id', $user->data()->id, 'status', 1, 'start_date', date('Y-m-d'))?> <b>Approved</b></span>
							<span><?=$override->countData3('request', 'staff_id', $user->data()->id, 'status', 2, 'start_date', date('Y-m-d'))?> <b>Declined</b></span>
						<?php }?>
                    </div>
                </div>

            </div>

        </div>