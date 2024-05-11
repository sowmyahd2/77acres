<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'products';
		$this->primary_key='id';
	}

	public function getOwnerDetails($product_id='')
	{
		$query="SELECT re.name, re.phone 
				FROM products ps 
				LEFT JOIN regusers re ON ps.dealersId = re.id
				where ps.id = '".$product_id."' ";
		$results= $this->db->query($query);
		return $results->row();
	}

	public function get_allproducts($cat_id,$limit='',$from='')
	{
		$query="SELECT DISTINCT ps.*,ps.qty as total_qty,cs.name catagory from products ps JOIN
				categories cs ON ps.cat_id=cs.id
				where ps.status = '1' AND ps.enablepro = '0' AND ps.cat_id='".$cat_id."'";//  GROUP BY ps.style";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		$results= $this->db->query($query);
		return $results->result();
	}
	public function products_count($cat_id)
	{
		$query="SELECT count(ps.style) no_count from products ps JOIN
				categories cs ON ps.cat_id=cs.id
				where ps.cat_id=$cat_id";
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->row('no_count');
	}
	public function getsub_allproducts($cat_id,$limit='',$from='')
	{
		$query="SELECT ps.*,SUM(ps.qty) total_qty,cs.name catagory from products ps JOIN
				categories cs ON ps.cat_id=cs.id JOIN
				product_assign pa ON ps.id=pa.p_id 
				where pa.cat_id=$cat_id  GROUP BY ps.style ORDER BY ps.viewed ASC";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function subproducts_count()
	{
		$query="SELECT count(distinct ps.sku_id) no_count from products ps 
				JOIN categories cs ON ps.cat_id=cs.id";
		$results= $this->db->query($query);
		return $results->row('no_count');
	}
	public function speci_values($cat_id)
	{
		$query="SELECT sc.name specfi_name,sc.id specfi_id from categories c
		LEFT JOIN category_specification cs ON cs.cat_id=c.id		
		LEFT JOIN category_specification_values csv ON cs.spec_id = csv.spec_id AND cs.cat_id = csv.cat_id	
			 JOIN specifications sc ON cs.spec_id=sc.id		
				where c.id=$cat_id and sc.status='1'";
		$results= $this->db->query($query);
		return $results->result();
	}
	public function searchdata($search){
	    
	    $query="SELECT
    'city' AS table_name,
    city.id AS cityid,
    city.city AS cityname,
    NULL AS areaid,
   NULL AS area
FROM
    city
WHERE
    city.city LIKE '%".$search."%'
UNION
SELECT
    'areas' AS table_name,
     Null as cityid,
      city.city AS cityname,
    areas.id AS areaid,
    areas.area as area

FROM
    areas join city on areas.city=city.id
WHERE
    areas.area LIKE '%".$search."%'
UNION
SELECT
    'city' AS table_name,
    city.id AS item_id,
    city.city AS item_name,
   
    areas.id as areaid,
     areas.area as area
FROM
    areas
LEFT JOIN
    city ON areas.city = city.id
WHERE
    areas.area LIKE '%".$search."%'";
    	$results= $this->db->query($query);
		return $results->result();
	}
	
	public function product_list($cat_id,$userid='')
	{
	    if($cat_id!="all"){
	        $wr=" WHERE ps.cat_id='".$cat_id."'";
	    }
	    else{
	        $wr="";
	    }
	    $query="SELECT ps.image,ps.status,ps.totalarea,ps.price,ps.priceper,ps.areatype,ps.id,ps.name,ps.sku_id,ps.qty total_qty,cs.name as catagory,po.name as ownership, css.name as subcat,(cs.url_name) as caturl, pt.name as protype,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname,ps.pincode,r.phone as phone,
	    r.fname,r.lname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				 JOIN regusers r ON ps.dealersId = r.id 
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				
					LEFT JOIN property_ownership po ON r.type = po.id 
				
			
				 $wr  ";
				
	/*	$query = "ELECT c.name subcat, cs.name cat, p.*, (SELECT GROUP_CONCAT(csv.name) psp_id FROM products cp JOIN product_specification psp ON cp.id = psp.product_id JOIN category_specification_values csv ON psp.spec_value = csv.id WHERE cp.id = p.id AND psp.spec_id = 1) procolor, r.email as useremail
				FROM `products`  p
				JOIN categories c ON p.cat_id = c.id
				JOIN categories cs ON c.parent_id = cs.id 
				LEFT JOIN regusers r ON p.dealersId = r.id 
				WHERE p.cat_id = '".$cat_id."' "; */

		if(!empty($userid)){
			$query .=" AND (p.sku_id = '".$userid."' OR p.name = '".$userid."') ";
		}
		$query .=" order by ps.last_updated DESC";
		
		$results= $this->db->query($query);
		return $results->result();
	}
	
	
	public function realted_product($cat_id,$p_id)
	{
		$query="SELECT p.*, cs.name as catagory, css.name as subcat,csss.name as subsubcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,p.statename as sname, p.cityname as cname, ar.area as aname, pa.name as propage, ps.name as propstatus, pat.name as protypeareaname,p.landmark,(ar.zipcode) as pincode
		FROM products p 
		JOIN categories cs ON p.cat_id=cs.id
		LEFT JOIN categories css ON cs.parent_id = css.id
		LEFT JOIN categories csss ON css.parent_id = csss.id
		LEFT JOIN property_type pt ON p.propertytype = pt.id
		LEFT JOIN property_areatype pat ON p.areatype = pat.id
		LEFT JOIN property_age pa ON p.propertyage = pa.id
		LEFT JOIN property_status ps ON p.propertystatus = ps.id
		LEFT JOIN regusers us ON p.dealersId = us.id
		LEFT JOIN state st ON p.statename = st.id
		LEFT JOIN city ct ON p.cityname = ct.id
		LEFT JOIN areas ar ON p.localityname = ar.id
		WHERE p.status = '1' AND p.cat_id ='".$cat_id."' AND p.id!='".$p_id."' 
		ORDER BY p.last_updated	LIMIT 4";
		return $this -> db -> query($query)->result();


		/*$query="SELECT p.*, (SELECT GROUP_CONCAT(psp.id) psp_id FROM products cp JOIN product_specification psp ON cp.id = psp.product_id WHERE cp.id = p.id AND psp.spec_id = 1) prospec  
				FROM `products`p
				WHERE p.cat_id ='".$cat_id."' AND p.id!='".$p_id."' 
				ORDER BY p.last_updated	LIMIT 4";*/
	}
	
	
	public function product_breadcrumbs($cat_id)
	{
		$query="SELECT css.name main_name,css.id main_id,css.url_name mainurl,
				cs.name sub_name,cs.id subid,cs.url_name suburl,
				c.name subsubname,c.url_name subsuburl,c.id subsubid
				FROM categories c
				LEFT JOIN categories cs ON c.parent_id = cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				where c.id='".$cat_id."'";
		return $this -> db -> query($query) -> row('main_name,sub_name,subsubname');
	}

	public function get_product_details($sku_id)
	{
		$query="SELECT p.*, cs.name as catagory, css.name as subcat,csss.name as subsubcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,p.statename as sname, p.cityname as cname, ar.area as aname, pa.name as propage, ps.name as propstatus, pat.name as protypeareaname,(us.name) as ownername, (us.Phone) as ownerphone
		FROM products p 
		JOIN categories cs ON p.cat_id=cs.id
		LEFT JOIN categories css ON cs.parent_id = css.id
		LEFT JOIN categories csss ON css.parent_id = csss.id
		LEFT JOIN property_type pt ON p.propertytype = pt.id
		LEFT JOIN property_areatype pat ON p.areatype = pat.id
		LEFT JOIN property_age pa ON p.propertyage = pa.id
		LEFT JOIN property_status ps ON p.propertystatus = ps.id
		LEFT JOIN regusers us ON p.dealersId = us.id
		LEFT JOIN state st ON p.statename = st.id
		LEFT JOIN city ct ON p.cityname = ct.id
		LEFT JOIN areas ar ON p.localityname = ar.id
		WHERE p.status = '1' AND p.sku_id='".$sku_id."'"; 
		return $this -> db -> query($query)->row();
	}

	public function getlistingProductList($pro_type='',$cat_type='')
	{
		$pro_id = 0;
		if($pro_type!=''){
			$prosql = "SELECT id FROM property_type WHERE name = '".$pro_type."'";
			$prodata = $this -> db -> query($prosql)->row();
			$pro_id = is_object($prodata)?$prodata->id:0;
		}
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, css.url_name, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' ";
			if($pro_id!=0){
				$query.= " AND pt.id = '".$pro_id."'";
			}
			if($cat_type!='') {
				$query.= " AND css.url_name = '".$cat_type."'";
			} else {
				$query.= " AND css.name != 'Commercial'";
			}
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getLocationProductList($cityId='',$areaId='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND ps.cityname = '".$cityId."' ";
			if($areaId!='') {
				$query.= " AND ps.localityname = '".$areaId."'";
			} 
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getmyshortlistedList($userid='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname,ush.id as wishid
				FROM usershortlisted ush
				JOIN products ps ON ush.productId = ps.id
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ush.userId = '".$userid."' AND ps.status = '1' AND ps.enablepro = '0' ";
			
			$query.= " GROUP BY ush.productId";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function checkwihslist($userid,$prodid){
	 $query="SELECT  *
				FROM usershortlisted ush
				
		   	  WHERE ush.userId = '".$userid."' AND ush.productId = '".$prodid."' ";
			
			
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();   
	}
	public function mywishlistpropertytype($userid='')
	{
		$query="SELECT  pt.name as protype,pt.id
				FROM usershortlisted ush
				JOIN products ps ON ush.productId = ps.id
					LEFT JOIN property_type pt ON ps.propertytype = pt.id
		   	  WHERE ush.userId = '".$userid."' AND ps.status = '1' AND ps.enablepro = '0' ";
			
			$query.= " GROUP BY ps.propertytype";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function getsearchProductList($cityname='',$propertytype='',$category='',$ownertype='')
	{
		$cat_name = "";
		if(is_array($category) && count($category)){
			foreach ($category as $key => $value) {
				$cat_name .="'".$value."', ";
			}
		}
		$cat_name = rtrim($cat_name,', ');
		
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' ";
				//pt.name = '".$pro_type."' AND
			if($cityname!='') {
				$query.= " AND (ct.city LIKE  '%".strtolower($cityname)."%' OR ps.pincode LIKE  '%".$cityname."%' OR ps.landmark LIKE  '%".$cityname."%'OR st.state LIKE  '%".$cityname."%'OR ar.area LIKE  '%".$cityname."%')";
			} 
			if($propertytype!='') {
				$query.= " AND ps.propertytype = '".$propertytype."'";
			}
			if(!empty($cat_name))
			{
				$query.= " AND ( css.name IN (".$cat_name.") OR cs.name IN (".$cat_name.") )";
			}
			if(!empty($ownertype))
			{
				$query.= " AND ( us.type=".$ownertype.")";
			}
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
		public function getsearchProductLists($cityname='',$propertytype='',$category='',$ownertype='',$locationsearch="",$search_type="",$lattitude="",$langitude="",$distance="",$stateloc="",$cityloc="",$localityloc="",$pincode="",$bhk="",$facetype="",$minprice,$maxprice)
	{



		$cat_name = "";
		if(is_array($category) && count($category)){
			foreach ($category as $key => $value) {
				$cat_name .="'".$value."', ";
			}
		}
		$cat_name = rtrim($cat_name,', ');
		
	
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
			
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.state
				LEFT JOIN city ct ON ps.cityname = ct.city
				LEFT JOIN areas ar ON ps.localityname = ar.id
				LEFT JOIN product_specification psf ON ps.id = psf.product_id
				LEFT JOIN specifications s  ON psf.spec_id = s.id
				LEFT JOIN category_specification_values sv ON psf.spec_value=sv.id
				LEFT JOIN product_specification psff ON ps.id = psff.product_id
				LEFT JOIN specifications ss  ON psff.spec_id = ss.id
				LEFT JOIN category_specification_values svv ON psff.spec_value=svv.id
				WHERE ps.status = '1' AND ps.enablepro = '0' ";
				//pt.name = '".$pro_type."' AND
					
					if($lattitude!=""&& $langitude!="" && $distance!=""){
		    
	
		$prodlist=$this->productsbydistance($lattitude,$langitude,$distance);
	
	$ids = array();

foreach ($prodlist as $item) {
    $ids[] = $item->id;
}

$idsString = implode(',', $ids);
	
	if (!empty($prodlist)) {
			if($propertytype!='') {
				$query.= " AND ps.propertytype = '".$propertytype."'";
			}
			if(!empty($cat_name))
			{
				$query.= " AND ( css.name IN (".$cat_name.") OR cs.name IN (".$cat_name.") )";
			}
			if(!empty($ownertype))
			{
				$query.= " AND ( us.type=".$ownertype.")";
			}
			if(!empty($bhk))
			{
				
				$bhkString = implode("','", $bhk);
    $query .= " AND (sv.name IN ('" . $bhkString . "') and s.name ='Bedroom')";
				
			}
			
			if(!empty($facetype))
			{
				 
				$facetype = implode("','", $facetype);
				$query .= " AND ( svv.name IN ('" . $facetype . "') AND ss.name = 'Facing')";
				
			}
				if(!empty($minprice) && !empty($maxprice))
			{
				$query .= " AND (ps.price BETWEEN " . $minprice . " AND " . $maxprice . ")";
			}
			
				if(!empty($search_type))
			{
			    if($locationsearch!="pincode"){
		    $query .= " AND (ar.area LIKE '%" . $search_type . "%')";
		}
		else{
		    $query.= " AND ( ps.$locationsearch like '%".$search_type."%')";
		}
				
			}
		
    $query .= " AND ps.id IN (" . $idsString . ")";
}
		else{
		    return null;
		}	
					}
		else{
		    
			if($cityname!='') {
				$query.= " AND (ct.city LIKE  '%".trim(strtolower($cityname))."%' OR ps.pincode LIKE  '%".trim($cityname)."%' OR ps.landmark LIKE  '%".trim($cityname)."%'OR st.state LIKE  '%".$cityname."%'OR ar.area LIKE  '%".$cityname."%')";
			} 
				if($propertytype!='') {
				$query.= " AND ps.propertytype = '".$propertytype."'";
			}
			if(!empty($cat_name))
			{
				$query.= " AND ( css.name IN (".$cat_name.") OR cs.name IN (".$cat_name.") )";
			}
			
			if(!empty($ownertype))
			{
				$query.= " AND ( us.type=".$ownertype.")";
			}
			if(!empty($bhk))
			{
				
				$bhkString = implode("','", $bhk);
    $query .= " AND (sv.name IN ('" . $bhkString . "') and s.name ='Bedroom')";
				
			}
			
			
				if(!empty($minprice) && !empty($maxprice))
			{
				
				$query .= " AND (ps.price BETWEEN " . $minprice . " AND " . $maxprice . ")";
				
			}
			
			if(!empty($pincode)){
		    $query .= " AND (ps.pincode=".$pincode.")";
		}
			if(!empty($stateloc)){
		       $query.= " AND ( st.id=".$stateloc.")";
		  }
		    if(!empty($cityloc)){
		       $query.= " AND ( ct.id=".$cityloc.")";
		  }
		  
		   if(!empty($localityloc)){
		       $query.= " AND ( ar.id=".$localityloc.")";
		  }
						if(!empty($search_type))
			{
			
		   if($locationsearch=="citylocation"){
		    $query .= " AND (ar.area LIKE '%" . $search_type . "%')";
		}
		    if($locationsearch=="pincode"){
		    $query .= " AND (ps.pincode LIKE '%" . $search_type . "%')";
		}
		
		  
		
				
			}	
			}
			
		//echo $query; exit();
		$query.= " group by ps.id ORDER BY ps.viewed ASC";
		$results= $this->db->query($query);
		return $results->result();
	}
	public function getsearchwishProductList($propertytype='',$userid='')
	{
	
		
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM usershortlisted usr 
				JOIN products ps ON usr.productId=ps.id
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				 JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND  usr.userId = '$userid' " ;
				//pt.name = '".$pro_type."' AND
		 
			if($propertytype!='') {
				$query.= " AND ps.propertytype = '".$propertytype."'";
			}
		
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function getfeactureProductList()
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND ps.feature = 'YES' ";
			
			$query.= " ORDER BY ps.last_updated DESC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	
	public function getOtherProductList($pro_type)
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id ";
			if($pro_type != 'ALL') {
				$query.= " WHERE ps.status = '1' AND ps.enablepro = '0' AND pt.name = '".$pro_type."' ";
			} 
			$query.= " ORDER BY ps.last_updated DESC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getcityProductList($cityname='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND ( ps.statename = '".$cityname."' OR ps.cityname = '".$cityname."' ) ORDER BY ps.last_updated DESC ";
			
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getfilterProductList($postdetails){
		//print_r($postdetails);
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				WHERE ps.status = '1' AND ps.enablepro = '0' ORDER BY ps.last_updated DESC ";
			
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function getarealist($pincode){
		//print_r($postdetails);
		$query="SELECT (s.state) as statename,(c.city) as cityname,a.*
				FROM areas a 
				JOIN city c ON a.city=c.id
				JOIN state s ON a.state=s.id
				where zipcode=".$pincode;
			
	
		$results= $this->db->query($query);
return $results->row();
	}
	public function getdealerProductList($userid='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname, pat.name as protypeareaname,ps.statename as sname, ps.cityname as cname, ar.area as aname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.dealersId = '".$userid."' ";
			
			$query.= " ORDER BY ps.last_updated DESC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	public function mydealerpropertytype($userid){
	    	$query="SELECT  pt.name as protype,pt.id
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.dealersId = '".$userid."' ";
			
			$query.= " GROUP BY pt.id ORDER BY ps.last_updated DESC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
		public function getsearchmyProductList($propertytype='',$userid='')
	{
	

		
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,ps.statename as sname, ps.cityname as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' and ps.dealersId = '".$userid."' ";
				//pt.name = '".$pro_type."' AND
			
			if($propertytype!='') {
				$query.= " AND ps.propertytype = '".$propertytype."'";
			}
		
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function fewSpecification($p_id)
	{
		$query="SELECT s.name specificationname, GROUP_CONCAT(sv.name) specificationvalue,s.attribute_type type, GROUP_CONCAT(ps.spec_value) spec_val
					FROM product_specification ps
					LEFT JOIN specifications s  ON ps.spec_id = s.id
					LEFT JOIN category_specification_values sv ON ps.spec_value=sv.id
					WHERE ps.product_id = '".$p_id."' AND s.name != 'Amenities'
					GROUP BY ps.spec_id";
		$results= $this->db->query($query);
		$spec = $results->result();
		$specification = array();
		if(isset($spec) && is_array($spec) && count($spec)) {
			$namearrray = array('Bedroom','Balcony','Bathroom');
			foreach ($spec as $key => $spec) {
				if(in_array($spec->specificationname, $namearrray)){
					if($spec->specificationvalue!="" || $spec->spec_val!=""){
						$spec_value = ($spec->type==1 || $spec->type==2) ? $spec->specificationvalue :$spec->spec_val; 
	         			$specvalue = (!empty($spec_value)) ? $spec_value :$spec->spec_val;
	         			$specification[$spec->specificationname] = $specvalue;
					}
				}
			}	
		}
		return $specification;
	}

	public function areaData()
	{
		$adata = array();
		$query="SELECT * FROM property_areatype";
		$results= $this->db->query($query);
		$spec = $results->result();
		if(isset($spec) && is_array($spec) && count($spec)) {
			foreach ($spec as $key => $spec) {
				$adata[$key] = $spec;
			}
		}
		return $adata;
	}

	public function productSummary($p_id)
	{
		$query="SELECT s.name specificationname, GROUP_CONCAT(sv.name) specificationvalue,s.attribute_type type, GROUP_CONCAT(ps.spec_value) spec_val,ps.areaType
					FROM product_specification ps
					LEFT JOIN specifications s  ON ps.spec_id = s.id
					LEFT JOIN category_specification_values sv ON ps.spec_value=sv.id
					WHERE ps.product_id = '".$p_id."' AND s.name != 'Amenities'
					GROUP BY ps.spec_id LIMIT 8";
		$results= $this->db->query($query);
		return $results->result();
	}

	public function product_specifi_view($p_id)
	{
		$query="SELECT s.name specificationname, GROUP_CONCAT(sv.name) specificationvalue,s.attribute_type type, GROUP_CONCAT(ps.spec_value) spec_val,ps.areaType
					FROM product_specification ps
					LEFT JOIN specifications s  ON ps.spec_id = s.id
					LEFT JOIN category_specification_values sv ON ps.spec_value=sv.id
					WHERE ps.product_id = '".$p_id."' AND s.name != 'Amenities'
					GROUP BY ps.spec_id";
		$results= $this->db->query($query);
		return $results->result();
	}

	public function product_amenities_specifi_view($p_id)
	{
		$query="SELECT s.name specificationname, GROUP_CONCAT(sv.name) specificationvalue,s.attribute_type type, GROUP_CONCAT(ps.spec_value) spec_val
					FROM product_specification ps
					LEFT JOIN specifications s  ON ps.spec_id = s.id
					LEFT JOIN category_specification_values sv ON ps.spec_value=sv.id
					WHERE ps.product_id = '".$p_id."' AND s.name = 'Amenities' 
					GROUP BY ps.spec_id";
		$results= $this->db->query($query);
		return $results->result();
	}

	public function amenities_specifi_view()
	{
		$query="SELECT s.name specificationname, GROUP_CONCAT(sv.name) specificationvalue,s.attribute_type type, GROUP_CONCAT(ps.spec_value) spec_val
					FROM product_specification ps
					LEFT JOIN specifications s  ON ps.spec_id = s.id
					LEFT JOIN category_specification_values sv ON ps.spec_value=sv.id
					WHERE s.id = '21'  
					GROUP BY ps.spec_id";
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getAllProductList($limit='',$from='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0'
				ORDER BY ps.viewed ASC";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getlatestProductList($limit='',$from='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype,ps.statename as sname, ps.cityname as cname,ps.landmark, ar.area as aname, pat.name as protypeareaname,ps.pincode,css.url_name
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0'
				ORDER BY ps.viewed ASC";
		if($limit!='') 
			$query.= " LIMIT ".$from.", ".$limit;
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
		public function getlatestProductListcity($city)
	{
	    
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname,ps.pincode
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0'and ct.city='".$city."'
				ORDER BY ps.viewed ASC";
	
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}
	
public function productsbydistance($lattitude,$langitude,$distance){
  
 $query = "SELECT id
FROM products
WHERE (
    6371 * ACOS(
        COS(RADIANS(".$lattitude.")) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS(".$langitude."))
        + SIN(RADIANS(".$lattitude.")) * SIN(RADIANS(latitude))
    )
) <=".$distance;
$results = $this->db->query($query);
return $results->result();
}
	public function homeproductlist($id)
	{
		$query="SELECT hp.id, hp.cat_id, ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname,psp.*
				FROM products ps
				LEFT JOIN homepage_product hp  ON ps.id = hp.p_id
				JOIN categories cs ON ps.cat_id = cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN categories csss ON css.parent_id = csss.id
				LEFT JOIN product_specification psp ON ps.id = psp.product_id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND hp.typeid = '".$id."' AND ps.feature = 'YES' GROUP BY ps.id";
		$results= $this->db->query($query);
		return $results->result();
	}

	//---- Mobile Data fetching starts here -------- with pagination -----

	public function getMobileRealtedProduct($cat_id='',$p_id='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND ps.cat_id ='".$cat_id."' AND ps.id!='".$p_id."'  ";
			$query.= " ORDER BY ps.viewed ASC";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();

	}

	public function getMobileProductList($pro_type='',$per_page='',$page='')
	{
		$query="SELECT ps.*,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' ";
			if($pro_type!=''){
				$query.= " AND pt.name = '".$pro_type."'";
			}
			
			$query.= " ORDER BY ps.viewed ASC";
		
		if(!empty($per_page)){
			$start = ($page - 1) * $per_page;
			$query = $query." LIMIT $start,$per_page";
		}	
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->result();
	}

	public function getMobileProductdetails($sku_id)
	{
		$query="SELECT p.*, cs.name as catagory, css.name as subcat,csss.name as subsubcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pa.name as propage, ps.name as propstatus, pat.name as protypeareaname
		FROM products p 
		JOIN categories cs ON p.cat_id=cs.id
		LEFT JOIN categories css ON cs.parent_id = css.id
		LEFT JOIN categories csss ON css.parent_id = csss.id
		LEFT JOIN property_type pt ON p.propertytype = pt.id
		LEFT JOIN property_areatype pat ON p.areatype = pat.id
		LEFT JOIN property_age pa ON p.propertyage = pa.id
		LEFT JOIN property_status ps ON p.propertystatus = ps.id
		LEFT JOIN regusers us ON p.dealersId = us.id
		LEFT JOIN state st ON p.statename = st.id
		LEFT JOIN city ct ON p.cityname = ct.id
		LEFT JOIN areas ar ON p.localityname = ar.id
		WHERE p.status = '1' AND p.sku_id='".$sku_id."'"; 
		return $this -> db -> query($query)->result();
	}


	public function featuredMpropertylist($id,$per_page='',$page='')
	{
		$query = "SELECT ps.*,hp.id, hp.cat_id,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype,st.state as sname, ct.city as cname, ar.area as aname, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname, pat.name as protypeareaname
				FROM products ps
				LEFT JOIN homepage_product hp  ON ps.id = hp.p_id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				JOIN categories cs ON ps.cat_id = cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN categories csss ON css.parent_id = csss.id
				LEFT JOIN product_specification psp ON ps.id = psp.product_id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.status = '1' AND ps.enablepro = '0' AND hp.typeid = '".$id."' AND ps.feature = 'YES'  GROUP BY ps.id";
				

		if(!empty($per_page)){
			$start = ($page - 1) * $per_page;
			$query = $query." LIMIT $start,$per_page";
		}

		$results= $this->db->query($query);
		return $results->result();
	}


	public function getpropdetails($pid='')
	{
		$query="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname, pat.name as protypeareaname,ps.statename as sname, ps.cityname as cname, ar.area as aname
				FROM products ps 
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN property_areatype pat ON ps.areatype = pat.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				LEFT JOIN state st ON ps.statename = st.id
				LEFT JOIN city ct ON ps.cityname = ct.id
				LEFT JOIN areas ar ON ps.localityname = ar.id
				WHERE ps.id = '".$pid."' ";
		
		//echo $query; exit();
		$results= $this->db->query($query);
		return $results->row();
	}

	

}