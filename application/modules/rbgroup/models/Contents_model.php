<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = "contents";
		$this -> primary_key = 'id';
		$this -> result_mode = 'object';
	}

	public function get_allpages()
	{
		$query="SELECT pa.page_name , pa.url_name, co.name, co.description, co.image, co.other_column
				FROM contents co 
				JOIN pages pa ON co.page_id=pa.id ORDER BY pa.id";
		$results= $this->db->query($query);
		return $results->result();
	}

}

/* End of file contants_model.php */
/* Location: ./application/modules/cms_admin/models/contants_model.php */