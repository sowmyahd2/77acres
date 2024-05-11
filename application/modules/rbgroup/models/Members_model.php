<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'users';
		$this->primary_key='id';
	}
	
	public function getMembers()
	{
		$query= "SELECT u.*
				FROM users u
				JOIN users_groups ug ON u.id = ug.user_id WHERE ug.group_id = '2' ORDER BY u.id DESC";

		return $this -> db -> query($query) -> result();
	}

	
}