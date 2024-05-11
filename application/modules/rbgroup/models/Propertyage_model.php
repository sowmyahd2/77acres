<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyage_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'property_age';
		$this->primary_key='id';
	}

	
}