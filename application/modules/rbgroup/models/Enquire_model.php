<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquire_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'enquire';
		$this->primary_key='id';
	}
	
}