<?php

  global $session;
    
  $qry="1";
  
  global $nid;
  if ($nid!='') {
   $qry.=" AND NID LIKE '%".DBSafe($nid)."%'";
   $out['NID']=$nid;
  }
  
  global $title;
  if ($title!='') {
   $qry.=" AND TITLE LIKE '%".DBSafe($title)."%'";
   $out['TITLE']=$title;
  }
  
  global $location_id;
  if ($location_id) {
   $qry.=" AND LOCATION_ID='".(int)$location_id."'";
   $out['LOCATION_ID']=(int)$location_id;
  }

  if (IsSet($this->location_id)) {
   $location_id=$this->location_id;
   $qry.=" AND LOCATION_ID='".$this->location_id."'";
  } else {
   global $location_id;
  }
  
  // QUERY READY
  global $save_qry;
  if ($save_qry) {
   $qry=$session->data['mysensor_qry'];
  } else {
   $session->data['mysensor_qry']=$qry;
  }
  if (!$qry) $qry="1";
  
  // FIELDS ORDER
  global $sortby_mysensor;
  if (!$sortby_mysensor) {
   $sortby_mysensor=$session->data['mysensor_sort'];
  } else {
   if ($session->data['mysensor_sort']==$sortby_mysensor) {
    if (Is_Integer(strpos($sortby_mysensor, ' DESC'))) {
     $sortby_mysensor=str_replace(' DESC', '', $sortby_mysensor);
    } else {
     $sortby_mysensor=$sortby_mysensor." DESC";
    }
   }
   $session->data['mysensor_sort']=$sortby_mysensor;
  }
  if (!$sortby_mysensor) $sortby_mysensor="NID";
  $out['SORTBY']=$sortby_mysensor;
  
  // SEARCH RESULTS  
  $res=SQLSelect("SELECT * FROM msnodes WHERE $qry ORDER BY ".$sortby_mysensor);
  if ($res[0]['ID']) {   
    colorizeArray($res);
    $total=count($res);
    for($i=0;$i<$total;$i++) {
     // some action for every record if required
    }
    $out['RESULT']=$res;
  }  
  
  $out['LOCATIONS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");
?>
