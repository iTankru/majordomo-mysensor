<?php
/**
* Russian language file for NUT module
*
*/

$dictionary=array(

/* general */
'CONNECTION_TYPE'=>'Connection type',
'MEASURE'=>'Measure',
'AUTOID'=>'Auto ID',
'NEXTID'=>'Next ID',
'NODES'=>'Nodes',
'NODE'=>'Node',
'MESH'=>'Mesh',
'PRESENTATION'=>'Presentation',
'SENSOR'=>'Sensor',
'VERSION'=>'Version',
'PROTOCOL'=>'Protocol',
'LASTREBOOT'=>'Last reboot',
'REBOOT'=>'Reboot',
'REBOOT_INFO'=>'Reboot node (Only not sleep node)',
'CLEAN'=>'Clean',
'ACK_INFO'=>'ACK - Set this to true if you want destination node to send ack back to this node.',
'REQ_INFO'=>'REQ - Get value from node when module start.',
'MESH_INFO'=>'This tree make only when node reboot'

/* end module names */

);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>