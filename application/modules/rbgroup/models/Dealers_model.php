<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dealers_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'users';
		$this->primary_key='id';		
	}

	public function reg_users($id)
	{
		$sql= "SELECT ru.*,st.state statename,c.city cityname 
				 FROM regusers AS ru
				 LEFT JOIN state AS st ON ru.state_id = st.id
				 LEFT JOIN city AS c ON ru.city_id = c.id
				 Where ru.id = $id";
		        $query=$this->db->query($sql);
     	         return $query->row();
	}

	public function getdealersinfo()
	{
		$sql= "SELECT us.*, count(p.id) as procount,st.state statename,c.city cityname 
				 FROM regusers AS us
				 LEFT JOIN products AS p ON us.id = p.dealersId
				 LEFT JOIN state AS st ON us.state_id = st.id
				 LEFT JOIN city AS c ON us.city_id = c.id
				 Where us.type = 'dealer'";
		        $query=$this->db->query($sql);
     	         return $query->result();
	}

	public function getotherdealersinfo($id='')
	{
		$sql= "SELECT us.*, count(p.id) as procount,st.state statename,c.city cityname 
				 FROM regusers AS us
				 LEFT JOIN products AS p ON us.id = p.dealersId
				 LEFT JOIN state AS st ON us.state_id = st.id
				 LEFT JOIN city AS c ON us.city_id = c.id
				 Where us.type = 'dealer' AND us.id !='".$id."'";
		        $query=$this->db->query($sql);
     	         return $query->result();
	}

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */