<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proenquiry_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'proenquiry';
		$this->primary_key='id';		
	}

	public function getConsultantEnquery($user_id='',$limit='',$from='')
	{
		$query="SELECT pe.* 
				FROM proenquiry pe 
				JOIN products p ON pe.pid = p.id
				where p.dealersId = '".$user_id."' ";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		$results= $this->db->query($query);
		return $results->result();
	}
	

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */