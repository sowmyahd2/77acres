<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this ->load->model('Categories_model','cats');
		$this ->load->model('Products_model','products');
		$this ->load->model('Product_assign_model','product_assign');
			$this ->load->model('Dealers_model','dealer');
		$this ->load->model('Specifications_model','spes');
		$this ->load->model('Product_specifications_model','svalue');
		$this ->load->model('Category_specification_values_model','catspecvals');
		$this->load->model ('Cities_model', 'citydetails');
		$this->load->model ('States_model', 'statedetails');
		$this ->load->model('Home_product_model','home_products');
		$this->load->model ('Areas_model', 'Areadetails');
		
		$this ->data['page'] = 'products';
		$this->load->model ('Propertytype_model', 'propertytype');
		$this->load->model ('Propertyareatype_model', 'propertyareatype');
		$this -> data['propertytype'] = $this -> propertytype -> dropdown('id','name');
			$this->data['main_categories'] = $this->cats->custom_dropdown('id', 'name', array('property_type' => 1,'status' => '1' ));
		$this -> data['propertyareatype'] = $this -> propertyareatype -> dropdown('name','name');
		$this -> data['citydtl'] = $this -> citydetails -> dropdown('id','city');
		$this -> data['statedtl'] = $this -> statedetails -> dropdown('id','state');
		$this -> data['areadtl'] = $this -> Areadetails -> dropdown('id','area');
	}

	public function index($url_name='')
	{

		if($url_name!='all' && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :	
			extract($_POST);
			$userid = "";
			if(isset($_POST['userid'])){
				$userid = $_POST['userid'];
			}
			$this -> data['userid'] = $userid;
			

			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);	

			$this -> data['products'] = $this -> products -> product_list($this -> data['category']->id,$userid);
			//print_r($this -> data['products']); exit;			
		    //echo '<pre>'; print_r($this -> data['sub_category']); exit;
			$this -> data['mode'] = 'all';
			$this ->data['CatName']=$this -> data['category']->name;
			$this-> load -> view('template', $this->data);			
		else:
		    	   
		    	$this -> data['category'] = $this -> cats -> get_all(array('status' => '1'));
		    		$this -> data['mode'] = 'all';
		    		$this -> data['products'] = $this -> products -> product_list("all",$userid);
		    	$this -> data['userid'] = $userid;
		    	$this->data['CatName']="All";
			$this -> data['categories'] = $this -> cats -> get_all(array('status' => '1','parent_id'=>'0'));
				$this-> load -> view('template', $this->data);	
		endif;		
	}

	public function cityselect($stateid="")
    {
        $options = $this->citydetails->custom_dropdown('id', 'city', array('state' => $stateid ));
        $result  = '<option value="" selected="selected">Select City</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }

    public function areaselect($cityid="")
    {
        $options = $this->areadetails->custom_dropdown('id', 'area', array('city' => $cityid ));
        $result  = '<option value="" selected="selected">Select Area</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }
	

	public function add($url_name='')
	{	
		//echo "<pre>";
		if($url_name!='' && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);	
			//print_r($this -> data['category']);
			$parent_id = array('parent_id' =>$this -> data['category']->id,'status' => '1');						
			$this -> data['specifications'] = $this -> cats -> specifications($this -> data['category']->parent_id);
			//echo "<pre>";
			//print_r($this -> data['specifications']); exit;				
			$this -> data['sub_category'] = $this -> cats -> custom_dropdown('id','name',$parent_id);	
			$this -> data['parent_category'] = $this -> data['category']->id;			
		    //echo '<pre>'; print_r($this -> data['category']); exit;
			$this -> data['mode'] = 'add';
			$this-> load -> view('template', $this->data);			
		else:
			$this -> data['categories'] = $this -> cats -> get_all(array('status' => '1','parent_id'=>'0'));
		endif;
	}
	public function edit($url_name='',$p_id='')
	{	
		$this->data['product']=$this-> products ->get('id',$p_id);
		if($url_name!='' && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);			
			$parent_id = array('parent_id' =>$this -> data['category']->id, 'status' => '1');	
			$this->data['sub_categories'] = $this->cats->custom_dropdown('id', 'name', array('parent_id' => $this -> data['category']->parent_id ));
			//echo $p_id;
			$pspecval = $this -> svalue -> get_all('product_id',$p_id);
			//print_r($pspecval); exit;
			$this->data['psv'] = array();	
			foreach ($pspecval as $value) 
				$this->data['psv'][$value->spec_id][]=$value->spec_value;
		

			$this->data['psvtype'] = array();	
			foreach ($pspecval as $value){
				$this->data['psvtype'][$value->spec_id][] = $value->areaType;
			}

			$this -> data['sub_category'] = $this -> cats -> custom_dropdown('id','name',$parent_id);	
			$this -> data['parent_category'] = $this -> data['category']->id;	$this -> data['dealer'] = $this -> dealer -> reg_users($this->data['product']->dealersId);	
		    //echo '<pre>'; print_r($this -> data['psv']); exit;
			$this -> data['mode'] = 'edit';
			
			if(!empty($this->data['product']->statename)){
				
				$this->data['citydtl'] = $this->citydetails->custom_dropdown('id', 'city', array('state' => $this->data['product']->statename ));
			}
			if(!empty($this->data['product']->cityname)){
				$cityid=$this->citydetails->get('city',$this->data['product']->cityname);
				$this->data['localitydtl'] = $this->Areadetails->custom_dropdown('id', 'area', array('city'=> $cityid->id));
				
			}
			
				$this -> data['specifications'] = $this -> cats -> specifications($this -> data['category']->parent_id);
			//	$this -> data['page'] = 'Productedit';
					$this->data['specifications'] = $this -> cats -> subspecifications($this -> data['category']->id,$this -> data['category']->parent_id);
		
			$this-> load -> view('Productedit', $this->data);			
		else:
			show('404');
		endif;
	}
	public function view($url_name='',$p_id='')
	{	
		$this->data['product']=$this-> products ->getpropdetails($p_id);
		if($url_name!='' && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);
			$this -> data['specification']=$this -> products ->product_specifi_view($p_id);
			$this -> data['mode'] = 'view';
			$this-> load -> view('template', $this->data);			
		else:
			show('404');
		endif;
	}

	public function generatePIN($digits = 6){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

	public function SKUCodeGenerator($Name,$ranID){
		$skuCode = '';

		$y = explode(' ',$Name);

		foreach($y AS $k){
			$skuCode .= strtoupper(substr($k,0,1));
		}

		$skuCode = preg_replace('/[^A-Za-z0-9\-]/', '', $skuCode);
		return $skuCode.$ranID;
	}

	public function add_product()
	{
		$sku_rand = $this -> generatePIN();
		$pro_type = substr(strtolower($this -> input -> post ('propertytype')), 0,4);
		$pro_name = strtolower($this -> input -> post ('name'));
		$checklist = ["---", "--"];
		$tobereplace   = ["-", "-"];
		$url_name = str_replace($checklist, $tobereplace, preg_replace('/[^a-zA-Z0-9\-]/', '-',$pro_name));
		$url_name = rtrim($url_name,'-');

		$dealersId = 1;
		$dealertype = "Admin";
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$oldprodtl = $this -> products -> get('id',$product_id);
			if(is_object($oldprodtl)){
				$dealersId = $oldprodtl->dealersId;
				$dealertype = $oldprodtl->dealertype;
			}	
		}

		$product_details = array(
				'dealersId' => $dealersId,
				'dealertype' => $dealertype,
				'propertytype' => $this -> input -> post ('propertytype'),
				'name' => $this -> input -> post ('projectname'),
				'pincode' => $this -> input -> post ('pincode'),
				'cat_id' => $this -> input -> post ('cat_id'),
				'description' => $this -> input -> post ('description'),
				'pricetype' => $this -> input -> post ('pricetype'),
				'priceper'=>$this->input->post('priceper'),
				'price' => $this -> input -> post ('totlalprice'),
				'search_keywords' => $this -> input -> post ('search_keywords'),
				'search_description' => $this -> input -> post ('search_description'),
				'video1' => $this -> input -> post ('video1'),
				'statename' => $this -> input -> post ('statename'),
				'cityname' => $this -> input -> post ('cityname'),
				'localityname' => $this -> input -> post ('localityname'),
				'Localityaddress' => $this -> input -> post ('localityaddress'),
				'street' => $this -> input -> post ('street'),
				'landmark' => $this -> input -> post ('landmark'),
				'latitude' => $this -> input -> post ('latitude'),
				'qty' => $this -> input -> post ('qty'),
				'available_from' => date('Y-m-d',strtotime($this ->input->post ('available_from'))),
				'totalarea' => $this -> input -> post ('totalarea'),
				'areatype' => $this -> input -> post ('proareatype'),
				'longitude' => $this -> input -> post ('longitude')
			);
		//print_r($_FILES);
		
		$imga = array('image','image1','image2','image3','image4','image5');
		foreach ($imga as $eimg) {
			if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
				$image = $this -> products -> do_upload_image($eimg,163,245);
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
					echo $image['upload_error'];
				}else
				{
					$product_details[$eimg] = $image;
				}
			}
		}

		//user_guide
		if(isset($_FILES['brochure']) && $_FILES['brochure']['error'] != '4'){
			$brochure = $this -> products -> do_upload_pdf('brochure');
			if(is_array($brochure)){
				$this->session->set_flashdata('error', $brochure['upload_error']);
			} else {
				$product_details['brochure'] = $brochure;
			}
		}
		//print_r($product_details);exit;
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> svalue -> delete('product_id',$product_id);
			$this -> products -> update($product_id,$product_details);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			
			$product_details['sku_id'] = $this->SKUCodeGenerator($pro_name,$sku_rand);
			$product_details['url_name'] = $url_name;
			$this -> products -> insert($product_details);
			$product_id = $this->db->insert_id();
			//------- Product assign table update -----------
			//$pro_assign  = array('cat_id' => $this -> input -> post ('cat_id'),'sub_cat' => $this -> input -> post ('cat_id'), 'p_id' =>$product_id);
			//$this -> product_assign -> insert($pro_assign);
			//------- product assign ends here -------------
			$this->session->set_flashdata('message', 'Successfully Added');			
		}
		//specareatype
		$procudt_specifications=array();
		$j=0;
		$specareatype = $this -> input -> post('specareatype');
		//echo "<pre>"; 
		//print_r($specareatype); 
		if($this -> input -> post('specification')){
			$specifications = $this -> input -> post('specification');
			$propertyareatype = $this -> input -> post('specareatype');
			//print_r($specifications); exit;
			foreach ($specifications as $key => $spi_values) {
				foreach ($spi_values as $svalue) {
					$procudt_specifications[$j]['product_id'] = $product_id ;
					$procudt_specifications[$j]['spec_id'] = $key;
					$procudt_specifications[$j]['spec_value'] = $svalue;
					$areaType = isset($propertyareatype[$key])?$propertyareatype[$key][0]:0;
					$procudt_specifications[$j]['areaType'] = $areaType;
					$j++;
				}
			}		
			$this -> db -> insert_batch('product_specification',$procudt_specifications);
		}
		
		redirect($this -> input -> post('curl'));
	}
	public function existsku_id()
	{
		echo 0;
	}	

	
	
	
	public function product_subcategory($cat_id="")
    {
        $options = $this->products->custom_dropdown('id', 'name', array('cat_id' => $cat_id,'status' => '1'));
        $result  = '<option value="" selected="selected">Select product</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }
    
	public function delete($id)
	{
		$product=$this -> products -> get($id);
		$imga = array('image','image1','image2','image3','image4','image5');
              foreach ($imga as $key => $eimg) { 
                 if($product->$eimg!='' && file_exists('./uploads/products/'.$product->$eimg))
                    unlink($this -> products ->original_path.'/products/'.$product->$eimg);                
                }		
		$this -> products -> delete($id);		
		$this -> svalue -> delete('product_id',$id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

	public function skunumber_check($sku_number)
	{
		if($sku_number!='')
		{
			$checknumber = array('sku_id'=> $sku_number);
			if(!$this -> products ->count_all_results($checknumber))
			{			
				return $sku_number;
			}
			else 
			{
				$sku=$this -> skunumber_check($sku_number+1);
				return 	$sku;	
			}
		}
		
	}	

	public function subcategory($country_id)
    {
        $options = $this->cats->custom_dropdown('id', 'name', array('parent_id' => $country_id,'status' => '1'));
        //echo $this->db->last_query();
        $result  = '<option value="" selected="selected">Select Subcategory</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }
    public function sub_subcategory($country_id)
    {
        $options = $this->cats->custom_dropdown('id', 'name', array('parent_id' => $country_id,'status' => '1' ));
        if(is_array($options) && count($options)){
        	$result  = '<option value="" selected="selected">Select Subsubcategory</option>';
	        foreach ($options as $key => $value) {
	            $result .= '<option value="' . $key . '">' . $value . '</option>';
	        }
	        echo $result;
        } else {
        	echo "EMPTY";
        }
        
    }

    public function home_page($id)
	{		
		$this->data['categories'] = $this->cats->custom_dropdown('id', 'name', array('parent_id' => '0','status' => '1','type'=>'main'));
		$this->data['typeid'] = $id;
		if($id == 1){
			$this->data['PageTitleType'] = "Featured Property";
		} else {
			$this->data['PageTitleType'] = "Premium Property";
		}
		$this -> data['home_products']=$this -> home_products ->all_product($id);
		$this -> data['category']=$this -> home_products ->get($id);		
		//echo '<pre>'; print_r($this -> data['home_products']); exit;
		$this ->data['page'] = 'home_products';
		$this -> data['mode'] = 'all';
		$this-> load -> view('template', $this->data);
	}

	public function homepage_add()
	{
		$id=$this ->input-> post ('id');
		if($id!='') :		
			$title = array(
				'name' => $this ->input->post ('name')
			);
				$result = $this -> home_products -> update ($id,$title);
				$this->session->set_flashdata('message', 'Successfully Updated');
		else :
			$post = array(
				'typeid' => $this ->input->post ('typeid'),
				'cat_id' => $this ->input->post ('c_id'),
				'p_id' => $this ->input->post ('p_id')
			);
			$result = $this -> home_products -> insert ($post);
			$product_details = array(	
				'feature' => "YES"
			);
			$product_id = $this ->input->post ('p_id');
			$this -> products -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Added');

		endif;

		redirect($this -> input -> post('curl'));
	}

	public function home_page_delete($id='')
	{
		$home_products = $this -> home_products -> get ('id',$id);
		
		if(count($home_products)){
			$product_details = array(	
			'feature' => "NO"
			);
			$product_id = $home_products->p_id;
			$this -> products -> update($product_id,$product_details);
		}
		$this -> home_products -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

	public function active_status()
	{		
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('abs_id');
	
	    $result = $this -> products ->update ($id,array('status'=>$this -> input -> post ('status') ));	 
	   echo $this -> input -> post ('status') ;
		echo ($result) ? 1 : 0 ;
	}

}