<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_specifications_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'product_specification';
		$this->primary_key='id';		
	}
	
}