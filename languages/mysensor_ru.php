﻿<?php
/**
* Russian language file for NUT module
*
*/

$dictionary=array(

/* general */
'CONNECTION_TYPE'=>'Тип соединения',
'MEASURE'=>'Измерение',
'AUTOID'=>'Авто ID',
'NEXTID'=>'Следующий ID',
'NODES'=>'Узлы',
'NODE'=>'Узел',
'MESH'=>'Сеть',
'PRESENTATION'=>'Заявление',
'SENSOR'=>'Сенсор',
'VERSION'=>'Версия',
'PROTOCOL'=>'Протокол',
'LASTREBOOT'=>'Последняя перезагрузка',
'REBOOT'=>'Перезагрузить',
'REBOOT_INFO'=>'Перезагрузить узел (Только не спящие узел)',
'CLEAN'=>'Отчистить',
'ACK_INFO'=>'ACK - Установите, если вы хотите чтобы запрашиваемый узел отвечал подтверждением ACK назад к этому узлу.',
'REQ_INFO'=>'REQ - Запрашивает данные при старте модуля.',
'MESH_INFO'=>'Это дерево обновляется когда узел перезагрузится'

/* end module names */

);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>