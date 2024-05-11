<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usershortlisted_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'usershortlisted';
		$this->primary_key='id';		
	}

	

}

/* End of file Usershortlisted_model.php */
/* Location: ./application/modules/la_admin/models/Usershortlisted_model.php */