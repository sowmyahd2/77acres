<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'state';
		$this->primary_key='id';
	}
	
}