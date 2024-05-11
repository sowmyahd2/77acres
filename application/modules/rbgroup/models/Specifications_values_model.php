<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specifications_values_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'specifications_values';
		$this->primary_key='id';		
	}

	public function spec_values($id)
	{
		$query= "SELECT * FROM `specifications_values` WHERE `spec_id`='$id'";
		        $query=$this->db->query($query);
     	         return $query->result();
	}

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */