<?php

require_once 'phpMS.php'; 

/**
 * MySensorTCP
 * 
 */
class MySensorMasterTCP extends MySensorMaster {
  private $sock;
  public $host = "192.168.1.2";
  public $port = "5003";    
  
  function MySensorMasterTCP($host, $port){
    $this->host = $host; 
  	$this->port = $port;	  
  }

  /**
  * connect
  *
  * Connect the socket
  *
  * @return bool
  */
  function connect(){
		if($this->debug) echo date("Y-m-d H:i:s")." Connecting TCP\n";
		
    // TCP socket
    $this->sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);         
      
    socket_set_option($this->sock, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 1, 'usec' => 0));
    socket_set_option($this->sock, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 0, "usec" => 250000));
    
    // Connect the socket
    $result = @socket_connect($this->sock, $this->host, $this->port);
    if ($result === false) {
        throw new Exception("socket_connect() failed.</br>Reason: ($result)".
            socket_strerror(socket_last_error($this->sock)));
    } 
        
    if($this->debug) echo date("Y-m-d H:i:s")." Connected\n";        
    
    MySensorMaster::connect();
    
    return true;        
  }
  
  /**
   * disconnect
   *
   * Disconnect the socket
   */
  function disconnect(){    
    socket_close($this->sock);
	  if($this->debug) echo  date("Y-m-d H:i:s")."Disconnected\n";
  }   
  
  /**
   * Read
   *
   * Read the socket
   */
  function read(){
   // $ret = socket_write($this->sock, "0;255;3;0;1;".time()."\n");
   // echo "Send:$ret\n";    
      
    $data = "";
    while (true){
      $c = socket_read($this->sock, 1);
      
      if ($c === false) return "";
      if ($c == "\n") return $data;
      $data .= $c;
    }     
  }
  
  /**
   * Send
   *
   * Send the socket
   */
  function send($nid, $sid, $mtype, $ack, $subtype, $msg){
    $data = "$nid;$sid;$mtype;$ack;$subtype;$msg\n";    
    $ret = socket_write($this->sock, $data);
    echo  date("Y-m-d H:i:s")." Send: $data";
    return $ret;
  }
} 
?>