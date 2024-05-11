<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyownership_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'property_ownership';
		$this->primary_key='id';
	}

	
}