<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specifications_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'specifications';
		$this->primary_key='id';		
	}

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */