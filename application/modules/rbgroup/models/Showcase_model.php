<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showcase_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'showcase';
		$this->primary_key='id';
	}
	
	
}