<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reguser_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'regusers';
		$this->primary_key='id';		
	}

	public function reg_users($id)
	{
		$sql= "SELECT ru.*,st.state as statename,c.city as cityname 
				 FROM regusers AS ru
				 LEFT JOIN state AS st ON ru.state_id = st.id
				 LEFT JOIN city AS c ON ru.city_id = c.id
				 Where ru.id = $id";
		        $query=$this->db->query($sql);
     	         return $query->row();
	}
public function filter_regusers($search){
    $this->db->select("c.*,s.state as statename,ci.city as cityname ");
$this->db->from("regusers c");
$this->db->join("state s","c.state_id=s.id");
$this->db->join("city ci","c.city_id=ci.id");
$this->db->group_start();
$this->db->like("name",$search,"after");
$this->db->or_like("email",$search,"after");
$this->db->or_like("phone",$search,"after");

$this->db->group_end();
return $this->db->get()->result();
  
}
	public function get_regusers($userid='')
	{
		$query="SELECT *,reg.name,reg.id,(pw.name) as ownership from regusers reg join property_ownership pw on reg.type=pw.id ";
		if(!empty($userid)){
			$query .=" WHERE (name = '".$userid."' OR phone = '".$userid."' OR email = '".$userid."') ";
		}
		$query .=" ORDER BY reg.id DESC";
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getreguserscount(){
		$query="SELECT COUNT(*) tol FROM regusers WHERE status = '1' AND type != 'dealer' ";//WHERE DATE(order_date) = CURRENT_DATE
		return $this -> db -> query($query) -> row('tol');
	}

	public function getJsonreguserscount()
	{
		//SELECT count(id) as data, name FROM `roombooking` WHERE status = '1' GROUP BY emailid Limit 5
		$sql = "SELECT count(id) as data, name FROM `regusers` WHERE verified= 'YES' AND type = 'User' GROUP BY email";
		/*$results= $this->db->query($query);
		return $results->result();*/
		$enq_details = $this -> db -> query($sql) -> result();
		$enq_list = array();
		if(!empty($enq_details))
		{
			foreach ($enq_details as $value) {
				$enq_list[] = array('name'=>$value->name, 'data' => array((int)$value->data));
				
			}
			return $enq_list;
		}
		return $enq_details;
	}
	

	public function userexcel_details()
	{
		$sql="SELECT id, name as Username, fname as Firstname, lname as Lastname, email as Email, address1 as Address, phone as Mobile, zip_code as Pincode, walletPoints, reg_type
		FROM regusers";
		//echo $sql; exit();
		$query=$this ->db ->query($sql);
     	return $query->result();
		
	}

	public function getRBConsultant()
	{
		$query="SELECT * from regusers WHERE type = 'rbconsultant'";
		$results= $this->db->query($query);
		return $results->result();
	}
	
	public function getuseraddress($username)
	{
		$sql="SELECT r.id,r.email,r.fname,r.lname,r.phone, r.zip_code, r.address1, r.state_id, r.city_id
		FROM `regusers` r
		WHERE (r.email='".$username."' OR r.phone = '".$username."')";
		return $this -> db -> query($sql) -> row();
	}

	public function validateuser($username,$password)
	{
		$query="SELECT * FROM `regusers` WHERE (email='".$username."' OR phone = '".$username."') and password = '".md5($password)."'";
		return $this -> db -> query($query) -> result();
	}
	

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */