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
