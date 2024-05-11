<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'city';
		$this->primary_key='id';
	}
	
	public function getCities()
	{
		$query= "SELECT c.*,s.state as statename
				FROM city c
				LEFT JOIN state s ON c.state = s.id ";
		        return $this -> db -> query($query) -> result();
	}

	public function majorcities()
	{
		$sql="SELECT * FROM city WHERE image!=''";
		$query=$this ->db ->query($sql);
     	return $query->result();
	}

	public function footerCity()
	{
		$sql="SELECT DISTINCT c.* FROM city c 
		JOIN products p ON c.id = p.cityname ORDER BY c.city DESC LIMIT 11";
		$query=$this ->db ->query($sql);
     	return $query->result();
	}

	public function footerArea()
	{
		$sql="SELECT DISTINCT a.* FROM areas a 
		JOIN products p ON a.id = p.localityname ORDER BY a.area DESC LIMIT 7";
		$query=$this ->db ->query($sql);
     	return $query->result();
	}
}