<?php
	open_mode = "select name,open_mode from v$database;"

	table_space = "SELECT df.tablespace_name AS Tablespace,
				  totalusedspace AS Used_MB,
				  (df.totalspace - tu.totalusedspace) AS Free_MB,
				  df.totalspace AS Total_MB,
				  ROUND(100 * ( (df.totalspace - tu.totalusedspace)/ df.totalspace)) AS PCT_Free
				FROM
				  (SELECT tablespace_name,
					ROUND(SUM(bytes) / 1048576) TotalSpace
				  FROM dba_data_files
				  GROUP BY tablespace_name
				  ) df,
				  (SELECT ROUND(SUM(bytes)/(1024*1024)) totalusedspace,
					tablespace_name
				  FROM dba_segments
				  GROUP BY tablespace_name
				  ) tu
				WHERE df.tablespace_name = tu.tablespace_name;"
				
	flash_recovery_area =  "select  name,
				ceil( space_limit / 1024 / 1024) size_mb,
				ceil( space_used / 1024 / 1024) used_mb,
				decode( nvl( space_used, 0),0, 0,
				ceil ( ( space_used / space_limit) * 100) ) pct_used
				from
					v$recovery_file_dest
				order by
				   name desc;
				---Oracle how to check flash recovery area---
				select  
				file_type,
				percent_space_used, 
				percent_space_reclaimable,
				number_of_files,
				con_id
				from v$flash_recovery_area_usage;"
				
	expired_users = "SELECT  
				username,
				account_status,
				lock_date,
				expiry_date,
				profile,
				last_login
				FROM dba_users 
				WHERE account_status IN ('OPEN','LOCKED','EXPIRED') 
				AND username not in ('SYS','SYSTEM','DBSNMP')
				AND expiry_date < SYSDATE + 24;"
				
	db_sync = "select max(sequence#) AS MAX_SEQUENCE from v$log_history;"
	
	db_replication = "SELECT 
				NAME, 
				THREAD# AS THREAD,
				SEQUENCE# AS SEQUENCE,
				FIRST_TIME,
				NEXT_TIME,
				APPLIED,
				DELETED,
				STATUS 
				FROM v$archived_log WHERE FIRST_TIME <= (SYSDATE-1) ORDER BY SEQUENCE DESC;"
				
	backup_status = "select SESSION_KEY, INPUT_TYPE, STATUS,
				to_char(START_TIME,'mm/dd/yy hh24:mi') start_time,
				to_char(END_TIME,'mm/dd/yy hh24:mi') end_time,
				elapsed_seconds/3600 hrs from V$RMAN_BACKUP_JOB_DETAILS
				order by session_key DESC;"
?>