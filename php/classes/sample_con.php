<?php

$c = oci_pconnect("readonly", "readonly", "(DESCRIPTION=(SOURCE_ROUTE=YES)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.231.33.91)(port=1621))(ADDRESS=(PROTOCOL=TCP)(HOST=ptzoda01-scan2.tz.sbicdirectory.com)(PORT=1522)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=ptz3cor.tz.sbicdirectory.com)))");

$s = oci_parse($c, 'select name,open_mode from v$database');
oci_execute($s);
oci_fetch_all($s, $res);
var_dump($res);

?>

<?php

$c = oci_pconnect("readonly", "readonly", "(DESCRIPTION=(SOURCE_ROUTE=YES)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.231.33.91)(port=1621))(ADDRESS=(PROTOCOL=TCP)(HOST=ptzoda01-scan2.tz.sbicdirectory.com)(PORT=1522)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=ptz3cor.tz.sbicdirectory.com)))");

$s = oci_parse($c, 'select name,open_mode from v$database');
oci_execute($s);
oci_fetch_all($s, $res);
var_dump($res);

?>

<?php

// Pre Content
$user = 'readonly';
$key = 'readonly';
$db = '(DESCRIPTION=(SOURCE_ROUTE=YES)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.231.33.91)(port=1621))(ADDRESS=(PROTOCOL=TCP)(HOST=ptzoda01-scan2.tz.sbicdirectory.com)(PORT=1522)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=ptz3cor.tz.sbicdirectory.com)))';

// Create connection to Oracle
$conn = oci_connect($user, $key, $db);
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);
?>

<?php
    $db = "(DESCRIPTION=(SOURCE_ROUTE=YES)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.231.33.91)(port=1621))(ADDRESS=(PROTOCOL=TCP)(HOST=ptzoda01-scan2.tz.sbicdirectory.com)(PORT=1522)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=ptz3cor.tz.sbicdirectory.com)))" ;
    if($c = OCILogon("system", "manager", $db))
    {
        echo "Successfully connected to Oracle.\n";
        OCILogoff($c);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>

<?php
    $db = "(DESCRIPTION=(SOURCE_ROUTE=YES)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.231.33.91)(port=1621))(ADDRESS=(PROTOCOL=TCP)(HOST=ptzoda01-scan2.tz.sbicdirectory.com)(PORT=1522)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=ptz3cor.tz.sbicdirectory.com)))" ;

    if($c = OCILogon("readonly", "readonly", $db))
    {
        echo "Successfully connected to Oracle.\n";
        OCILogoff($c);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>

<?php
    $serverName = "00172TANSQLPR2V";
    $database = "dba";
    $uid = 'data_user';
    $pwd = 'Stanbic1*';

    try {
        $conn = new PDO(
            "sqlsrv:server=$serverName;Database=$database",
            $uid,
            $pwd,
            array(
                //PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }
    catch(PDOException $e) {
        die("Error connecting to SQL Server: " . $e->getMessage());
    }

    echo "<p>Connected to SQL Server</p>\n";

    echo "<p>PDO::ATTR_PERSISTENT value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_PERSISTENT), true);
    echo "</pre>";

    echo "<p>PDO::ATTR_DRIVER_NAME value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_DRIVER_NAME), true);
    echo "</pre>";

    echo "<p>PDO::ATTR_CLIENT_VERSION value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_CLIENT_VERSION), true);
    echo "</pre>";

    $query = 'select top 5 * from tbl_users';
    $stmt = $conn->query( $query );

    echo "<pre>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
    }
    echo "</pre>";

    // Free statement and connection resources.
    $stmt = null;
    $conn = null;
?>
