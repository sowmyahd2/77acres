<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'areas';
		$this->primary_key='id';
	}
	
	public function getAreas()
	{
		$query= "SELECT a.*,s.state as statename,c.city as cityname
				FROM areas a
				LEFT JOIN city c ON a.city=c.id
				LEFT JOIN state s ON a.state=s.id ";
		        return $this -> db -> query($query) -> result();
	}
}