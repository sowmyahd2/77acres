<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authority_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'regulatory_authority';
		$this->primary_key='id';
	}

	
}