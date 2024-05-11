<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_product_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'homepage_product';
		$this->primary_key='id';
	}
	public function all_product($id)
	{
		$sql="SELECT hp.*, ps.name pname,ps.sku_id,hp.updated_on dates,ps.image
			  FROM homepage_product hp 
			  JOIN products ps ON ps.id = hp.p_id
			  WHERE hp.typeid = '$id'";
		$query=$this ->db ->query($sql);
       return $query->result();
	}
}