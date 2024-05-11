<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyads_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'property_ads';
		$this->primary_key='id';
	}

	public function getAdsList($pro_type)
	{
		$query="SELECT pa.*, pt.name as protype,cs.name as catagory, css.name as subcat
				FROM property_ads pa 
				JOIN categories cs ON pa.cat_id = cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON pa.propertytype = pt.id ";
			if($pro_type != 'ALL') {
				$query.= " WHERE pt.name = '".$pro_type."' ";
			} 
			$query.= " ORDER BY pa.package DESC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
}