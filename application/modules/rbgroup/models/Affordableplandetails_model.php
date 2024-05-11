<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affordableplandetails_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'affordableplandetails';
		$this->primary_key='id';
	}

	public function getaffordableplandetails()
	{
		$sql = "SELECT cf.*, ct.name as constype 
				FROM affordableplandetails cf 
				LEFT JOIN affordableplan ct ON cf.cid = ct.id";
		$proDetails = $this -> db -> query($sql) -> result();
		return $proDetails;
	}
	
	public function getplanlist()
	{
		$sql = "SELECT * FROM affordableplan ORDER BY id ASC";
		$proDetails = $this -> db -> query($sql) -> result();
		$spec_list = array();
		if(is_array($proDetails) && count($proDetails))
		{
			foreach ($proDetails as $value) {
				$spec_list[$value->id]['tabid'] = $value->id;
				$spec_list[$value->id]['name'] = $value->name;
				$spec_list[$value->id]['sku_id'] = $value->sku_id;
				$spec_list[$value->id]['price'] = $value->price;
				$spec_list[$value->id]['Plandetails'] = $this->getPlanDetails($value->id);
			}

		}	
		return array_values($spec_list);
	}

	public function getPlanDetails($catid='')
	{
		$sql = "SELECT * FROM affordableplandetails WHERE cid='".$catid."'";
		$proDetails = $this -> db -> query($sql) -> result();
		return $proDetails;
	}
	
}