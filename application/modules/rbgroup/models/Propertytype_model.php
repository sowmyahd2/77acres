<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertytype_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'property_type';
		$this->primary_key='id';
	}

	
}