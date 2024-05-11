<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertystatus_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'property_status';
		$this->primary_key='id';
	}

	
}