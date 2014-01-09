<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Rosmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		{
			$this->load->database();
			$this->load->helper('url');


		}
	}
	
		
	public function getLevel($kid,$name=null)
	{
		
		$query = $this->db->query("SELECT level FROM ros_main WHERE kid='$kid'");
		echo $name;
		
		if($query->result())
		{
		foreach ($query->result() as $row)
		  	  		$level= $row->level;
		 }
		 else
		 {
		 	if($name!=null)
		 	$this->db->insert('ros_main',array('kid'=>$kid,'name'=>$name,'level'=>1));
		 			$level=1;
		 }
		   	return $level;
    }
    public function getanswer($level)
    {

    	$answer=array('answers');
    	return $answer[$level];
    }
    
    public function promote($level,$kid)
	{
		$newlevel= $level+1;
		$data = array(
   'kid'=>$kid,
   'level' => $level 
   
);

		//$this->db->insert('ros_log', $data); 
	//$this->db->query("INSERT INTO ros_log values ('id',kid='$kid',level=$level,'timestamp')");
		//echo $this->db->last_query();
		if($this->db->query("UPDATE ros_main set level='$newlevel' where kid='$kid'"))
			{

				
					return 1;
			}
		else
			return 0;
		
	}
}
