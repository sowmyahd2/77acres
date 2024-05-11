<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'categories';
		$this->primary_key='id';		
	}

	public function cat_specification($id)
	{
		$query= "SELECT GROUP_CONCAT(cs.spec_id) specs
				FROM categories c
				LEFT JOIN category_specification cs ON c.id=cs.cat_id WHERE c.id=$id";
		        return $this -> db -> query($query) -> row('specs');
	}

	public function specifications($cat_id)
	{
		$sql = "SELECT csv.status,cs.spec_id sid,s.name sname,s.attribute_type attribute_type,s.data_type as data_type,s.mandatory as mandatory,s.areatype as areatype, csv.id svid,csv.name svname
				FROM category_specification cs
				JOIN specifications s ON cs.spec_id = s.id AND s.status='1'
				LEFT JOIN category_specification_values csv ON cs.spec_id = csv.spec_id AND csv.status='1' AND cs.cat_id = csv.cat_id 
				WHERE cs.status='1' AND cs.cat_id='".$cat_id."' ORDER BY s.orderby ASC";
		$specifications = $this -> db -> query($sql) -> result();
		$spec_list = array();
		if(!empty($specifications))
		{
			foreach ($specifications as $value) {
				if(!array_key_exists($value->sid, $spec_list)){
					$spec_list[$value->sid]['name'] = $value->sname;
					$spec_list[$value->sid]['type'] = $value->attribute_type;
					$spec_list[$value->sid]['datatype'] = $value->data_type;
					$spec_list[$value->sid]['areatype'] = $value->areatype;
					$spec_list[$value->sid]['mandatory'] = $value->mandatory;
				}
				if($value->svname!=NULL)
					$spec_list[$value->sid]['values'][$value->svid]=$value->svname;
				else
					$spec_list[$value->sid]['values']=array();
			}
			return $spec_list;
		}
		return $specifications;
	}
public function subspecifications($cat_id,$main)
	{

		$sql = "SELECT csv.status,cs.spec_id sid,s.name sname,s.attribute_type attribute_type,s.data_type as data_type,s.mandatory as mandatory,s.areatype as areatype, csv.id svid,csv.name svname
				FROM category_specification cs
				JOIN specifications s ON cs.spec_id = s.id AND s.status='1'
				LEFT JOIN category_specification_values csv ON cs.spec_id = csv.spec_id AND csv.status='1' AND cs.cat_id = csv.cat_id 
				WHERE cs.status='1' AND (cs.cat_id='".$cat_id."' or cs.cat_id='".$main."')  ORDER BY s.orderby ASC";
		$specifications = $this -> db -> query($sql) -> result();
		$spec_list = array();
		if(!empty($specifications))
		{
			foreach ($specifications as $value) {
				if(!array_key_exists($value->sid, $spec_list)){
					$spec_list[$value->sid]['name'] = $value->sname;
					$spec_list[$value->sid]['type'] = $value->attribute_type;
					$spec_list[$value->sid]['datatype'] = $value->data_type;
					$spec_list[$value->sid]['areatype'] = $value->areatype;
					$spec_list[$value->sid]['mandatory'] = $value->mandatory;
				}
				if($value->svname!=NULL)
					$spec_list[$value->sid]['values'][$value->svid]=$value->svname;
				else
					$spec_list[$value->sid]['values']=array();
			}
			return $spec_list;
		}
		return $specifications;
	}
	public function colorspecifications($cat_id)
	{
		$sql = "SELECT csv.status,cs.spec_id sid,s.name sname,s.attribute_type attribute_type,s.data_type as data_type, csv.id svid,csv.name svname
				FROM category_specification cs
				JOIN specifications s ON cs.spec_id = s.id AND s.status='1'
				LEFT JOIN category_specification_values csv ON cs.spec_id = csv.spec_id AND csv.status='1' AND cs.cat_id = csv.cat_id 
				WHERE cs.status='1' AND s.id = '1' AND cs.cat_id='".$cat_id."' ORDER BY s.orderby ASC";
		$specifications = $this -> db -> query($sql) -> result();
		$spec_list = array();
		if(!empty($specifications))
		{
			foreach ($specifications as $value) {
				if(!array_key_exists($value->sid, $spec_list)){
					$spec_list[$value->sid]['name'] = $value->sname;
					$spec_list[$value->sid]['type'] = $value->attribute_type;
					$spec_list[$value->sid]['datatype'] = $value->data_type;
				}
				if($value->svname!=NULL)
					$spec_list[$value->sid]['values'][$value->svid]=$value->svname;
				else
					$spec_list[$value->sid]['values']=array();
			}
			return $spec_list;
		}
		return $specifications;
	}

	public function specifications1($cat_id)
	{
		$sql = "SELECT cs.spec_id sid,s.name sname, csv.id svid,csv.name svname
				FROM category_specification cs
				JOIN specifications s ON cs.spec_id = s.id AND s.status='1'
				LEFT JOIN category_specification_values csv ON cs.spec_id = csv.spec_id AND cs.cat_id = csv.cat_id
				WHERE cs.status='1' AND cs.cat_id=".$cat_id;
		$specifications = $this -> db -> query($sql) -> result();
		$spec_list = array();
		if(!empty($specifications))
		{
			foreach ($specifications as $value) {
				if(!array_key_exists($value->sid, $spec_list))
					$spec_list[$value->sid]['name'] = $value->sname;
				if($value->svname!=NULL)
					$spec_list[$value->sid]['values'][$value->svid]=$value->svname;
				else
					$spec_list[$value->sid]['values']=array();
			}
			return $spec_list;
		}
		return $specifications;
	}
	public function wislist_cat($id)
	{
		$query= "select root.name  as category_name,root.id as category_id, down1.name as subcategory_name,down1.id as sucategory_id from categories as root
				join categories as down1 on down1.parent_id = root.id and  down1.id='".$id."'";
		         $result=$this -> db -> query($query);
		         return $result->row();
	}
	public function category_search_data($name)
	{
		$query= "SELECT p.*,cat.name  from products as p join categories as cat where p.cat_id='".$name."'";
		        $query=$this->db->query($query);
	  
	 	  
      	return $query->result();
	}
	public function get_alcat($parentid,$gpid){
	   $query= "SELECT id FROM categories WHERE parent_id=$parentid  and
	   property_type=$gpid LIMIT 1";
		         $result=$this -> db -> query($query);
		         return $result->result(); 
	}
	public function product_search_data($name='')
	{
		$query= "SELECT DISTINCT p.* from products p
		LEFT JOIN categories c ON p.cat_id=c.id  OR p.cat_id=c.parent_id
		where (p.name LIKE '%".$name."%' OR c.name LIKE '%".$name."%') GROUP BY p.id";
		$query=$this->db->query($query);
	  	return $query->result();
	}
	public function category_search_data1($name)
	{
		$query= "SELECT p.*,cat.name  from products as p join categories as cat where p.cat_id='".$name."'";
		         $result=$this -> db -> query($query);
		         return $result;
	}

	public function categoryname_search_data($name)
	{
		$query= "SELECT id FROM categories WHERE name LIKE '%".$name."%' and status='1' order by id desc LIMIT 1";
		         $result=$this -> db -> query($query);
		         return $result->row();
		     }
		
		public function formalname_search_data($name)
	{
		$query= "SELECT id FROM categories WHERE url_name='men-shirts-formal' LIMIT 1";
		         $result=$this -> db -> query($query);
		         return $result->row();
	}         
	
	public function categoryname_search_data1($name)
	{
		$query= "SELECT id FROM categories WHERE UPPER(name) = UPPER('".$name."')  and parent_id='3' and status='1' LIMIT 0,0";
		         $result=$this -> db -> query($query);
		         return $result->row();
	}
	public function mens_catagory($c_id='',$limit='',$from='')
	{
		$query="SELECT DISTINCT ps.*, SUM(ps.qty) total_qty,cs.name catagory, lower(cs.name) mode FROM categories c
				JOIN categories cs ON c.id=cs.parent_id
				JOIN categories css ON cs.id=css.parent_id
				JOIN products ps ON css.id=ps.cat_id where c.id='$c_id' GROUP BY ps.style";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function count_mens_catagory($c_id='')
	{
		$query="SELECT  count(distinct ps.style) no_count FROM categories c
				JOIN categories cs ON c.id=cs.parent_id
				JOIN categories css ON cs.id=css.parent_id
				JOIN products ps ON css.id=ps.cat_id where c.id='$c_id'";
		$results= $this->db->query($query);
		return $results->row('no_count');
	}

	public function mens_subcatagory($c_id='',$limit='',$from='')
	{
		$query="SELECT DISTINCT ps.*,SUM(ps.qty) total_qty,cs.name catagory,lower(c.name) mode FROM categories c
				JOIN categories cs ON c.id=cs.parent_id				
				JOIN products ps ON cs.id=ps.cat_id where c.id='$c_id' GROUP BY ps.style";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function count_womens_subcatagory($c_id='')
	{
		$query="SELECT count(distinct ps.style) no_count  FROM categories c
				JOIN categories cs ON c.id=cs.parent_id				
				JOIN products ps ON cs.id=ps.cat_id where c.id='$c_id'";
		$results= $this->db->query($query);
		return $results->row('no_count');
	}

	public function womens_subcatagory($c_id='',$limit='',$from='')
	{
		$query="SELECT DISTINCT ps.*,SUM(ps.qty) total_qty,cs.name catagory,lower(c.name) mode FROM categories c
				JOIN categories cs ON c.id=cs.parent_id				
				JOIN products ps ON cs.id=ps.cat_id where c.id='$c_id' GROUP BY ps.style";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}


	public function sub_maincatagory($c_id='',$limit='',$from='')
	{
		$query="SELECT DISTINCT lower(cssss.name) modesaa,lower(csss.name) parent_mode,ps.*,cs.name catagory,lower(c.name) mode FROM categories c
				JOIN categories cs ON c.id=cs.parent_id
				JOIN categories css ON cs.id=css.parent_id
				JOIN product_assign pa ON css.id=pa.cat_id						
				JOIN products ps ON pa.p_id=ps.id
                JOIN categories csss ON pa.sub_cat=csss.id
				JOIN categories cssss ON csss.parent_id=cssss.id
				 where c.id='$c_id' GROUP BY pa.p_id";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		return $this -> db -> query($query) -> result();
	}
	public function count_sub_maincatagory($c_id='')
	{
		$query="SELECT count(distinct ps.style) no_count  FROM categories c
				JOIN categories cs ON c.id=cs.parent_id
				JOIN categories css ON cs.id=css.parent_id
				JOIN product_assign pa ON css.id=pa.cat_id	
				JOIN products ps ON pa.p_id=ps.id
			    JOIN categories csss ON pa.sub_cat=csss.id
				JOIN categories cssss ON csss.parent_id=cssss.id
				where c.id='$c_id'";
		$results= $this->db->query($query);
		return $results->row('no_count');
	}
	public function sub_subcatagory($c_id='',$limit='',$from='')
	{
		$query="SELECT DISTINCT lower(cssss.name) modesaa,lower(csss.name) parent_mode, ps.*,cs.name catagory,lower(c.name) mode FROM categories c
				JOIN categories cs ON c.id=cs.parent_id							
				JOIN product_assign pa ON cs.id=pa.cat_id			
				JOIN products ps ON pa.p_id=ps.id 
				JOIN categories csss ON pa.sub_cat=csss.id
				JOIN categories cssss ON csss.parent_id=cssss.id
				 where c.id='$c_id'";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		return $this -> db -> query($query) -> result();
	}
	public function count_sub_subcatagory($c_id='',$limit='',$from='')
	{
		$query="SELECT count(distinct ps.style) no_count FROM categories c
				JOIN categories cs ON c.id=cs.parent_id							
				JOIN product_assign pa ON cs.id=pa.cat_id			
				JOIN products ps ON pa.p_id=ps.id 
				JOIN categories csss ON pa.sub_cat=csss.id
				JOIN categories cssss ON csss.parent_id=cssss.id
				 where c.id='$c_id'";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		$results= $this->db->query($query);
		return $results->row('no_count');
	}

	public function getCategoryTree($level = 0) {
        $rows = $this->db
            ->select('id,parent_id as parent,name,url_name as link,type')
            ->where(array('parent_id' => $level,'status' =>'1'))
            ->order_by('vieworder','asc')
            ->get('categories')
            ->result();

        $category = array();
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if($row->parent ===0){
                    $category[] = $row->id.$row->name;
                } else {
                    $category[$row->id.'@'.$row->name.'@'.$row->link.'@'.$row->type] = $this->getCategoryTree($row->id);
                }
            }
        }
        return $category;
    }
	public function getCategoryTrees($id) {
        $rows = $this->db
            ->select('id,parent_id as parent,name,url_name as link,type')
            ->where(array('property_type' => $id,'status' =>'1'))
            ->order_by('vieworder','asc')
            ->get('categories')
            ->result();

        $category = array();
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if($row->parent ===0){
                    $category[] = $row->id.$row->name;
                } else {
                    $category[$row->id.'@'.$row->name.'@'.$row->link.'@'.$row->type] = $this->getCategoryTree($row->id);
                }
            }
        }
        return $category;
    }

     //SELECT GROUP_CONCAT(SELECT id from categories where parent_id=c.parent_id) all_child, c.parent_id from categories c where c.id=10



}

/* End of file categories_model.php */
