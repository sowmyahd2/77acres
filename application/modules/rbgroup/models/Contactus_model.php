<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'contactus';
		$this->primary_key='id';
	}
	
}