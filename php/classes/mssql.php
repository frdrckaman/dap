<?php
    //Open Database Connection
	$user = "data_user"; 
    $password = "Stanbic1*";
    $ODBCConnection = odbc_connect("DRIVER={ODBC Driver 17 for SQL Server};Server=SQLCONSOLSNRTZ;Database=dba; Port=1433;String Types=Unicode", $user, $password);
	
	//Check Password Policy
	$SQLQuery = "SELECT [AVAILABILITY DATABASE] AS Database_Name,[SYNCHRONIZATION STATUS] AS Synchronization_Status, [SYNCHRONIZATION HEALTH] AS Health_Staus FROM dba.dbo.sql_ag_dailyhealth_check WHERE DATE BETWEEN GETDATE() - 1 AND GETDATE()";
    $RecordSet = odbc_exec($ODBCConnection, $SQLQuery);
	while (odbc_fetch_row($RecordSet)) {
        $result = odbc_result_all($RecordSet, "border=1");
    } 
	
	//Close Database Connection
    odbc_close($ODBCConnection);
?> 
<br>
<?php
    //Open Database Connection
	$user = "data_user"; 
    $password = "Stanbic1*";
    $ODBCConnection = odbc_connect("DRIVER={ODBC Driver 17 for SQL Server};Server=SQLCONSOLSNRTZ;Database=dba; Port=1433;String Types=Unicode", $user, $password);
	
	//Check Password Policy
	$SQLQuery1 = "SELECT name, is_policy_checked, is_expiration_checked, is_disabled, password_age FROM dba.dbo.PassPolicy WHERE is_disabled = '0'";
    $RecordSet1 = odbc_exec($ODBCConnection, $SQLQuery1);
	while (odbc_fetch_row($RecordSet1)) {
        $result = odbc_result_all($RecordSet1, "border=1");
    } 
	
	//Close Database Connection
    odbc_close($ODBCConnection);
?> 