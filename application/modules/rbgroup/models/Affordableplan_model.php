<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affordableplan_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'affordableplan';
		$this->primary_key='id';
	}
	
	
}