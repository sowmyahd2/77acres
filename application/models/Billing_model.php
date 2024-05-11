<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'user_address';
		$this->primary_key='id';
		$this -> result_mode = 'object';
	}

	public function locationdetails($zipcode='')
	{
		$query= "SELECT zs.name as statename
				FROM zipcodes z
				LEFT JOIN zipcode_state zs ON z.p_id=zs.id WHERE z.zipcode='".$zipcode."'";
		        return $this -> db -> query($query) -> row();
	}
}