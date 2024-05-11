<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
		$this->load->model('rbgroup/Categories_model','cats');
		$this->load->model('rbgroup/Reguser_model', 'users');
		$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Product_assign_model','product_assign');
		$this->load->model('rbgroup/Specifications_model','spes');
		$this->load->model('rbgroup/Product_specifications_model','svalue');
		$this->load->model('rbgroup/Category_specification_values_model','catspecvals');
		$this->load->model('rbgroup/Cities_model', 'citydetails');
		$this->load->model('rbgroup/States_model', 'statedetails');
		$this->load->model('rbgroup/Propertytype_model', 'propertytype');
		$this->load->model('rbgroup/Areas_model', 'areadetails');
		$this->load->model('rbgroup/Propertyareatype_model', 'propertyareatype');
		$this->load->model('rbgroup/Propertystatus_model', 'propertystatus');
		$this->load->model('rbgroup/Propertyage_model', 'propertyage');
		$this->load->model('rbgroup/Propertyads_model', 'propertyads');

		$this->load->model('rbgroup/Proenquiry_model','proenquiry');
		$this->load->model('rbgroup/Usershortlisted_model','usershortlisted');

		$this->load->model('rbgroup/Affordableplan_model','affordableplan');
		$this->load->model('rbgroup/Affordableplandetails_model','affordableplandetails');

		$this->data['propertytype'] = $this -> propertytype -> dropdown('id','name');
		$this->data['statedtl'] = $this -> statedetails -> dropdown('id','state');
		$this->data['propertystatus'] = $this -> propertystatus -> dropdown('id','name');
		$this->data['propertyage'] = $this -> propertyage -> dropdown('id','name');
		$this->data['main_categories'] = $this->cats->custom_dropdown('id', 'name', array('property_type' => 1,'status' => '1' ));
		
		$this -> data['propertyareatype'] = $this -> propertyareatype -> dropdown('name','name');
	}
public function testing(){
	$this->load->view('includes/testing');
}
	public function index()
	{
		if($this -> session -> userdata('user')){ 
			$user_details = $this -> session -> userdata('user');
			$rguser_details = $this ->users->get($user_details->id);
			$userType = is_object($rguser_details)?$rguser_details->type:'';
			$this -> data['page_title']="Submit Property |77acres - Real Estate";
			$this->data['userType'] = $userType;
			$this->data['type'] = $userType;
			$this->data['page'] = 'submit-property';
			
			$this->load->view('template', $this->data, FALSE);
		} else {
			redirect(site_url(), 'refresh');
		}
	}

	public function cityselectxs($stateid="")
    {
        $stateid = $this -> statedetails -> get('state',$stateid);
       
        $options = $this->citydetails->custom_dropdown('id', 'city', array('state' => $stateid->id ));
       
      $ht = '<div class="visible-xs col-xs-12" id="city_idx">
            <div class="form-group">
                <label>State</label>
                <input list="cities" placeholder="select city name" class="form-control required state_id" name="cityname" id="city_idxs">
                <datalist id="cities">';

foreach ($options as  $value) {
            $ht .= '<option value="'.$value.'"> </option>';
        }
$ht .= '</datalist>
        </div>
    </div>';

echo $ht;
        
    }
    
    public function getstateid($state){
        $stateid = $this -> statedetails -> get('state',$state);
        echo $stateid->id ;
    }
    public function getcityid($state){
        $stateid = $this -> citydetails -> get('city',$state);
        echo $stateid->id ;
    }
    public function getsearchdata(){
        $search=$this->input->post('search');
        $data=$this->products->searchdata($search);
       $html="";
       foreach ($data as $da) {
           if($da->area){
              $html.="<li> <div>".$da->area.",".$da->cityname."</div> <span>locality</span></li>";   
           }
     else{
           $html.="<li> <div> ".$da->cityname."</div> <span>city</span></li>";
     }
       }
        
       echo $html;
    }
    public function getaredid($state){
        $stateid = $this -> areadetails -> get('area',$state);
        echo $stateid->id ;
    }
    	public function cityselect($stateid="")
    {
        $options = $this->citydetails->custom_dropdown('id', 'city', array('state' => $stateid ));
        $result  = '<option value="" selected="selected">Select a City</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }

    public function areaselect($cityid="")
    {
        $options = $this->areadetails->custom_dropdown('id', 'area', array('city' => $cityid ));
        $result  = '<option value="" selected="selected">Select a Area</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }
 public function areaselectxs($cityid="")
    {
         $cityid = $this -> citydetails -> get('city',$cityid);
        $options = $this->areadetails->custom_dropdown('id', 'area', array('city' => $cityid->id ));
         $ht = '<div class="visible-xs col-xs-12" id="city_idx">
            <div class="form-group">
                <label>State</label>
                <input list="areas" placeholder="select Area name"  class="form-control required " name="areaname" id="locality_idxs">
                <datalist id="areas">';

foreach ($options as  $value) {
            $ht .= '<option value="'.$value.'"> </option>';
        }
$ht .= '</datalist>
        </div>
    </div>';

echo $ht;
    }
    public function getcitystate($pincode){
       $data=$this->products->getarealist($pincode);
    
      $options = $this->areadetails->custom_dropdown('id', 'area', array('zipcode' => $pincode ));
       foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
       
       $data1=[
           'state'=>$data->statename,
           'city'=>$data->cityname,
           'area'=>$result
          ];
        
          $json = json_encode($data1);
            echo $json;
            
        
    }
	public function subcategory($cat_id="")
    {
        $options = $this->cats->custom_dropdown('id', 'name', array('parent_id' => $cat_id, 'status' => '1' ));
        $result  = '<option value="" selected="selected">Select Sub Category</option>';
        foreach ($options as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $result;
    }
    public function sms(){
        $username = "harshithaa10@gmail.com";
	$hash = "2c792d4f74a8fbda192c7e1351055c019bc13d8ab6911f8193a37b2966b0b778";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "919731137692"; // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
    }

    public function prospecification($parent_id="")
    {
    	$propertyareatype = $this -> propertyareatype -> dropdown('name','name');
    	$specifications = $this -> cats -> specifications($parent_id);
    	$data = array('specifications' =>$specifications,'propertyareatype' =>$propertyareatype);
    	$order_product = $this -> load -> view('includes/specification',$data,TRUE);
		echo $order_product;
    }
   public function prosubspecification($parent_id,$mainid)
    {
    	$propertyareatype = $this -> propertyareatype -> dropdown('name','name');
    	$specifications = $this -> cats -> subspecifications($parent_id,$mainid);
    	$data = array('specifications' =>$specifications,'propertyareatype' =>$propertyareatype);
    	$order_product = $this -> load -> view('includes/specification',$data,TRUE);
		echo $order_product;
    }
    public function generatePIN($digits = 4){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

	public function location($cityId='',$areaId='')
	{
		$this -> data['page_title']="Location | 77acres - Real Estate";
		$this->data['page'] = 'property';
		$pro_type = 'ALL';
		$this->data['protype'] = $pro_type;
		$this->data['products'] = $this-> products ->getLocationProductList($cityId,$areaId);
		$otherProperty = $this-> products ->getOtherProductList($pro_type);
		$this->data['featuredproduct'] = $otherProperty;
		$this->data['featuredproductMobile'] = $otherProperty;
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->load->view('template',$this->data,FALSE);
	}

	public function type($pro_type='', $cat_type="")
	{
		$this -> data['page_title']= ucfirst($pro_type)." | 77acres - Real Estate";
		$this->data['page'] = 'property';
		$this->data['protype'] = $pro_type;
		$this->data['products'] = $this-> products ->getlistingProductList($pro_type,$cat_type);
		$otherProperty = $this-> products ->getOtherProductList($pro_type,$cat_type);
		$this->data['featuredproduct'] = $otherProperty;
		$this->data['featuredproductMobile'] = $otherProperty;
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->load->view('template',$this->data,FALSE);
	}

	public function overview($url_name='',$state_name='',$city_name='',$sku_id='')
	{
		if($url_name!='' && $this -> products -> count_all_results(array('id'=>$url_name,'sku_id'=>$sku_id))) :	
			$condition = array('id'=>$url_name,'sku_id'=>$sku_id);
			($sku_id!='')? $condition['sku_id']= $sku_id : '';
			$this -> data['product'] = $this -> products -> get_product_details($sku_id);
		
			//echo "<pre>"; print_r($this -> data['product']); exit;
			//Product View will be updated here
			$update_viewers=array('viewed'=>$this -> data['product']->viewed+1);		
			$this -> products -> update($this -> data['product']->id,$update_viewers);	

			$this -> data['realted_products'] = $this -> products -> realted_product($this -> data['product']->cat_id,$this -> data['product']->id);
			$this -> data['mainsummary']=$this -> products ->fewSpecification($this ->  data['product']->id);
			//print_r($this -> data['mainsummary']); exit;
			$this -> data['proareaData'] = $this -> products ->areaData();
			//print_r($this -> data['proareaData']); exit;
			$this -> data['mprosummary'] = $this -> products ->productSummary($this ->  data['product']->id);
			$this -> data['prosummary'] = $this -> products ->productSummary($this ->  data['product']->id);

			$this -> data['specification'] = $this -> products ->product_specifi_view($this ->  data['product']->id);

			$this -> data['amspecification']=$this -> products ->product_amenities_specifi_view($this ->  data['product']->id);
			
			
		    $this -> data['page_title']=$this -> data['product']->name.' | '.$this -> data['product']->catagory.' | 77acres - Real Estate';
			
		    $this -> data['meta_description'] = $this -> data['product']->seo_description;
		    $this -> data['meta_keywords'] = $this -> data['product']->search_keywords;
			$this -> data['page'] = 'property-detail';
			$this-> load -> view('template', $this->data);			
		else:
			$this->session->set_flashdata('error_message', 'Sorry something went wrong.');
	   		redirect(site_url(), 'refresh');
		endif;
	}

	public function appoinment()
	{
		$product_id = $this -> input -> post ('appoinmentpropertyid');
		if(!empty($product_id)){
			$product = $this -> products -> get('id',$product_id);
			$appoinment_form = array(
	   			'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('name')),
	   			'emailid' => $this -> input -> post ('emailid'),
	   			'phonenumber' => $this -> input -> post ('phonenumber'),
	   			'message' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('message')),
	   			'pname' => $product->name,
	   			'pid' => $product->id,
	   			'psku' => $product->sku_id
			);

			$proenquiry_id = $this -> proenquiry -> insert($appoinment_form);
			//mail code
				$message = $this -> load -> view('email/appoinment',$appoinment_form,TRUE);
				$email_result = $this -> common_model -> send_mail(admin_email,admin_email,'wis Appoinment',$message);
			//mail code ends here
			echo $product_id;
   		} else {
   			echo "error";
   		}
	}
public function getlatlang(){
    $pincode = $_GET['pincode'];
$apiKey = "AIzaSyDSvKSfINL38fVH8ACw8sf7zLUqifTHjQA";

$apiUrl = "https://api.opencagedata.com/geocode/v1/json?key=$apiKey&q=" . urlencode($pincode);

$response = file_get_contents($apiUrl);
$data = json_decode($response);

if ($data->total_results > 0) {
    $latitude = $data->results[0]->geometry->lat;
    $longitude = $data->results[0]->geometry->lng;

    $result = array(
        'latitude' => $latitude,
        'longitude' => $longitude
    );

    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo "No coordinates found for the given pincode.";
}
}
	public function showcase()
	{
		$this->data['showcaseproperty'] = $this-> contents ->get_all('page_id','10');
		$this->data['showcasebenifts'] = $this-> contents ->get_all('page_id','11');
		$this->data['amspecification'] = $this-> affordableplandetails ->getplanlist();
		$this->data['page'] = 'showcase_properties';
		$this->load->view('template', $this->data, FALSE);
	}

	public function mainsearch()
	{
		$cityname = ($this -> input -> post ('cityname'))?$this -> input -> post ('cityname'):"";
		$propertytype = ($this -> input -> post ('propertytype'))?$this -> input -> post ('propertytype'):"";
		$category = ($this -> input -> post ('category'))?$this -> input -> post ('category'):"";
		$ownershiptype=($this->input->post('ownershiptype'))?$this->input->post('ownershiptype'):"";
	
		
		//echo $category; exit;
		$pro_type = $propertytype;
		$this -> data['page_title']= ucfirst($pro_type)." | 77acres - Real Estate";
		$this->data['protype'] = $propertytype;
		$this->data['cityname'] = $cityname;
		$this->data['ptype'] = $propertytype;
		$this->data['categorylist'] = $category;
		$this->data['page'] = 'search-property';
		$this->data['protype'] = 'Search Result';
		$this->data['products'] = $this-> products ->getsearchProductList($cityname,$propertytype,$category,$ownershiptype);
		$this->data['featuredproduct'] = $this-> products ->getOtherProductList($pro_type);
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->session->set_flashdata('error_message',"");
		$this->load->view('template',$this->data,FALSE);

	}
		public function mainxssearch()
	{
		$cityname = ($this -> input -> post ('cityname'))?$this -> input -> post ('cityname'):"";
		$propertytype = ($this -> input -> post ('propertytype'))?$this -> input -> post ('propertytype'):"";
		$category = ($this -> input -> post ('category'))?$this -> input -> post ('category'):"";
		$ownershiptype=($this->input->post('ownershiptype'))?$this->input->post('ownershiptype'):"";
	
			$min_price=($this->input->post('min_price'))?$this->input->post('ownershiptype'):"";
				$max_price=($this->input->post('max_price'))?$this->input->post('max_price'):"";
		//echo $category; min_price;
		$pro_type = $propertytype;
		$this -> data['page_title']= ucfirst($pro_type)." | 77acres - Real Estate";
		$this->data['protype'] = $propertytype;
		$this->data['cityname'] = $cityname;
		$this->data['ptype'] = $propertytype;
		$this->data['categorylist'] = $category;
		$this->data['page'] = 'search-property';
		$this->data['protype'] = 'Search Result';
		$this->data['products'] = $this-> products ->getsearchProductLists($cityname,$propertytype,$category,$ownershiptype,$min_price,$max_price);
		$this->data['featuredproduct'] = $this-> products ->getOtherProductList($pro_type);
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->session->set_flashdata('error_message',"");
		$this->load->view('template',$this->data,FALSE);

	}
		public function mainxssearch1()
	{
		$cityname = ($this -> input -> post ('cityname'))?$this -> input -> post ('cityname'):"";
			$pincode = ($this -> input -> post ('pincode'))?$this -> input -> post ('pincode'):"";
		$propertytype = ($this -> input -> post ('propertytype'))?$this -> input -> post ('propertytype'):"";
		$category = ($this -> input -> post ('category'))?$this -> input -> post ('category'):"";
		$ownershiptype=($this->input->post('ownershiptype'))?$this->input->post('ownershiptype'):"";
		$lattitude=($this -> input -> post ('lattitude'))?$this -> input -> post ('lattitude'):"";
		$longitude=($this -> input -> post ('longitude'))?$this -> input -> post ('longitude'):"";
		$distance=($this -> input -> post ('distance'))?$this -> input -> post ('distance'):"";
		$bhk=($this -> input -> post ('bhk'))?$this -> input -> post ('bhk'):"";
		$facetype=($this -> input -> post ('facetype'))?$this -> input -> post ('facetype'):"";
		//$pricerange=($this->input->post('price-amount'))? $this -> input -> post ('price-amount'):"";	
		
		$locationsearch=($this->input->post('locationsearch'))?$this->input->post('locationsearch'):"";
				$search_type=($this->input->post('search_type'))?$this->input->post('search_type'):"";
					$stateloc=($this->input->post('stateloc'))?$this->input->post('stateloc'):"";
				$cityloc=($this->input->post('cityloc'))?$this->input->post('cityloc'):"";
				$localityloc=($this->input->post('localityloc'))?$this->input->post('localityloc'):"";
			
				//$string = $pricerange;

				// Remove currency symbol and extra spaces
				//$string = str_replace(['₹', ' '], '', $string);
				
				// Explode the string using delimiter " - "
				//$parts = explode('-', $string);
				
				// Trim whitespace from each part
				//$min_price = trim($parts[0]);
				//$max_price = trim($parts[1]);
				$min_price=($this->input->post('min_price'))?$this->input->post('min_price'):"";
				$max_price=($this->input->post('max_price'))?$this->input->post('max_price'):"";
		//echo $category; min_price;
		$pro_type = $propertytype;
		$this -> data['page_title']= ucfirst($pro_type)." | 77 acres - Real Estate";
		$this->data['protype'] = $propertytype;
		$this->data['cityname'] = $cityname;
		$this->data['ptype'] = $propertytype;
		$this->data['categorylist'] = $category;
		$this->data['page'] = 'search-property';
		$this->data['protype'] = 'Search Result';
		$this->data['products'] = $this-> products ->getsearchProductLists($cityname,$propertytype,$category,$ownershiptype,$locationsearch,$search_type,$lattitude,$longitude,$distance,$stateloc,$cityloc,$localityloc,$pincode,$bhk,$facetype,$min_price,$max_price);

		$this->data['featuredproduct'] = $this-> products ->getOtherProductList($pro_type);
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->session->set_flashdata('error_message',"");
		$this->load->view('template',$this->data,FALSE);

	}
	public function wishlistsearch()
	{
	    	if($user_details=$this -> session -> userdata('user')) { 
				$userid = $user_details->id;
			
			
		$cityname = ($this -> input -> post ('cityname'))?$this -> input -> post ('cityname'):"";
		$propertytype = ($this -> input -> post ('propertytype'))?$this -> input -> post ('propertytype'):"";
		$category = ($this -> input -> post ('category'))?$this -> input -> post ('category'):"";
		//echo $category; exit;
		$pro_type = $propertytype;
		$this -> data['page_title']= ucfirst($pro_type)." | 77acres - Real Estate";
		$this->data['protype'] = $propertytype;
		$this->data['cityname'] = $cityname;
		$this->data['ptype'] = $propertytype;
		$this->data['categorylist'] = $category;
		$this->data['page'] = 'property-search';
		$this->data['protype'] = 'Search Result';
	$this->data['protype'] = 'Search Result';
	$this->data['search']= "wishlistsearch";
		$types = $this-> products ->mywishlistpropertytype($user_details->id);
			
			$this->data['option']=$types;
		$this->data['products'] = $this-> products ->getsearchwishProductList($propertytype,$userid);
		$this->data['featuredproduct'] = $this-> products ->getOtherProductList($pro_type);
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->session->set_flashdata('error_message',"");
		$this->load->view('template',$this->data,FALSE);
}
	}
	public function mypropertysearch()
	{
	    	if($user_details=$this -> session -> userdata('user')) { 
				$userid = $user_details->id;
				
			
		$cityname = ($this -> input -> post ('cityname'))?$this -> input -> post ('cityname'):"";
		$propertytype = ($this -> input -> post ('propertytype'))?$this -> input -> post ('propertytype'):"";
		$category = ($this -> input -> post ('category'))?$this -> input -> post ('category'):"";
		//echo $category; exit;
		$pro_type = $propertytype;
		$this -> data['page_title']= ucfirst($pro_type)." | 77acres - Real Estate";
		$this->data['protype'] = $propertytype;
		$this->data['cityname'] = $cityname;
		$this->data['ptype'] = $propertytype;
		$this->data['categorylist'] = $category;
		$this->data['page'] = 'property-search';
		$this->data['protype'] = 'Search Result';
			$this->data['search']= "mypropertysearch";
		$this->data['products'] = $this-> products ->getsearchmyProductList($propertytype,$userid);
				$types = $this-> products ->mydealerpropertytype($user_details->id);
			
			$this->data['option']=$types;
		$this->data['featuredproduct'] = $this-> products ->getOtherProductList($pro_type);
		$this->data['propertyads'] = $this-> propertyads ->getAdsList($pro_type);
		$this->session->set_flashdata('error_message',"");
		$this->load->view('template',$this->data,FALSE);
	    	}

	}
	public function filtersearch()
	{
		extract($_POST);
			$sql="SELECT ps.*,ps.qty total_qty,cs.name as catagory, css.name as subcat, pt.name as protype, us.type as ownertype, us.fname as ownerfname, us.lname as ownerlname,st.state as sname, ct.city as cname, ar.area as aname, pat.name as protypeareaname
				FROM products ps
				JOIN categories cs ON ps.cat_id=cs.id
				LEFT JOIN categories css ON cs.parent_id = css.id
				LEFT JOIN property_type pt ON ps.propertytype = pt.id
				LEFT JOIN regusers us ON ps.dealersId = us.id
				WHERE ps.feature = 'NO'  ";
		if(isset($rerastatus) && !empty($rerastatus)){
			$sql .=" AND ps.rerastatus = '".$rerastatus."' ";
		}	
		if(isset($min_price) && !empty($min_price)){
			$sql.=" AND ps.price BETWEEN 0 AND ".$min_price."";
		}
		$cat_name = "";
		if(isset($category) && is_array($category) && count($category)){
			foreach ($category as $key => $value) {
				$cat_name .="'".$value."', ";
			}
		}
		$cat_name = rtrim($cat_name,', ');
		if(!empty($cat_name))
		{
			$sql.= " AND ( css.name IN (".$cat_name.") OR cs.name IN (".$cat_name.") )";
		}
		if(isset($cityname) && !empty($cityname)){
			$sql .=" AND ps.cityname = '".$cityname."' ";
		}
		if(isset($photos_video) && $photos_video == "YES"){
			$sql .=" AND ps.image != '' AND ps.video1 !='' ";
		} else if(isset($photos_video) && $photos_video == "NO"){
			$sql .=" AND ps.image = '' AND ps.video1 ='' ";
		}
		if(isset($user_type) && !empty($user_type)){
			$sql .=" AND us.type = '".$user_type."' ";
		}
		if(isset($min_area) && !empty($min_area)){
			$sql .=" AND ps.totalarea = '".$min_area."' ";
		}
		if(isset($ma_area) && !empty($ma_area)){
			$sql .=" AND ps.totalarea = '".$ma_area."' ";
		}
		if(isset($listingtype) && !empty($listingtype) && $listingtype!="Search Result"){
			$sql .=" AND pt.name = '".$listingtype."' AND css.name != 'Commercial'";
		}
		if(isset($categorytype) && !empty($categorytype)){
			$sql.= " AND css.name = '".$categorytype."' AND css.name = 'Commercial'";
		} 
		if(isset($sort_by) && $sort_by == "sortdate"):
			$sql .=" ORDER BY ps.last_updated DESC";
		elseif(isset($sort_by) && $sort_by== "price_from_high"):
			$sql.=" ORDER BY ps.price DESC";						
		elseif(isset($sort_by) && $sort_by== "price_from_low"):
			$sql.=" ORDER BY ps.price ASC";						
		else :
			$sql .=" ORDER BY ps.last_updated DESC";						
		endif;
		
		//echo $sql;
		$products = $this -> db -> query($sql) -> result();
		
		$data = array('products' =>$products);
    	$filter_product = $this -> load -> view('includes/applyfilterresult',$data,TRUE);
		echo $filter_product;
		
	}
	function youtube_embed_link($url) {
  $video_id = '';
  $matches = [];
  
  // Regular expression to extract video ID from URL
  $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
  
  // Check if the URL matches the pattern and extract the video ID
  if (preg_match($pattern, $url, $matches)) {
    $video_id = $matches[1];
  }
  
  // Construct and return the embed link
  return "https://www.youtube.com/embed/$video_id";
}

	public function add_property()
	{
	   
	
	   	
	   
	   	    
	   	   
			$userid = 0;
			if($user_details=$this -> session -> userdata('user')) { 
				$userid = $user_details->id;
			}
			$sku_rand = $this -> generatePIN();
			$pro_name = substr(strtolower($this -> input -> post ('projectname')), 0,4);
			$pro_type = substr(strtolower($this -> input -> post ('propertytype')), 0,4);
		
			$num = $this -> input -> post ('pincode');
$zipcode = (int)$num;
 $API_KEY = "AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q"; // Google Map Free API Key
$url = "https://maps.google.com/maps/api/geocode/json?address=".$zipcode."&key=".$API_KEY."";
// Send CURL Request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$returnBody = json_decode($response);
// Google MAP
$status = $returnBody->status;
if($status == "REQUEST_DENIED"){ 
$result = $returnBody->error_message;
} else { 

$result = $returnBody->results[0]->geometry->location;
}

		
		$lattitude=$result->lat;
		$langitude=$result->lng;
		
			$product_details = array(
					'dealersId' => $userid,
					'dealertype' => 'Users',
					'uploadtype' => 'property',
					'feature' => 'NO',
					'propertytype' => $this -> input -> post ('propertytype'),
					'name' => $this -> input -> post ('projectname'),
				//	'resale' => $this -> input -> post ('resale'),
				//	'propertystatus' => ($this -> input -> post ('propertystatus'))?$this -> input -> post ('propertystatus'):"",
				//	'propertyage' => ($this -> input -> post ('propertyage'))?$this -> input -> post ('propertyage'):"",
				//	'rerastatus' => ($this -> input -> post ('rerastatus'))?$this -> input -> post ('rerastatus'):"",
					'rerastatus' => ($this -> input -> post ('rerastatus'))?$this -> input -> post ('rerastatus'):"",
					'reraurl' => ($this -> input -> post ('reraurl'))?$this -> input -> post ('reraurl'):"",
					'cat_id' => $this -> input -> post ('cat_id'),
					'description' => $this -> input -> post ('description'),
					'totalarea' => $this -> input -> post ('totalarea'),
					'areatype' => $this -> input -> post ('areatype'),
					//'pricetype' => $this -> input -> post ('pricetype'),
					'priceper' => $this -> input -> post ('priceper'),
				//	'negotiable' => $this -> input -> post ('negotiable'),
					'price' => $this -> input -> post ('price'),
					'sku_id' => preg_replace('/[^a-zA-Z0-9\-]/', '-',$pro_name).'-'.$sku_rand.'-'.$pro_type,
					'url_name' => preg_replace('/[^a-zA-Z0-9\-]/', '-',strtolower($this -> input -> post ('projectname'))),
					'video1' => $this -> input -> post ('video1'),
					'statename' => $this -> input -> post ('statename'),
					'cityname' => $this -> input -> post ('cityname'),
					'localityname' => $this -> input -> post ('localityname'),
					'landmark' => $this -> input -> post ('landmark'),
					'pincode' => $this -> input -> post ('pincode'),
					'latitude' => $lattitude,
					'longitude' =>$langitude,
					'status'=>"1",
				//	'house' => $this -> input -> post ('house'),
				//	'street' => $this -> input -> post ('street'),
					'qty' => 1,
					//'available_from' => date('Y-m-d',strtotime($this ->input->post ('available_from')))
				);
			//print_r($_FILES); 
			$imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
			foreach ($imga as $eimg) {
				if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
					$image = $this -> products -> do_upload_image($eimg,163,245);
					if(is_array($image)){
						$this->session->set_flashdata('error_message', $image['upload_error']);
					//	echo $image['upload_error'];
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
					$this->session->set_flashdata('error_message', $brochure['upload_error']);
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
			//	$this->session->set_flashdata('success_message', 'Successfully Updated');
			}
			else
			{
				$this -> products -> insert($product_details);
				$product_id=$this->db->insert_id();
				//------- Product assign table update -----------
				$pro_assign  = array('cat_id' => $this -> input -> post ('cat_id'),'sub_cat' => $this -> input -> post ('cat_id'), 'p_id' =>$product_id);
				$this -> product_assign -> insert($pro_assign);
				//------- product assign ends here -------------
				$this->session->set_flashdata('success_message', 'Successfully Added');			
			}
			$procudt_specifications=array();
			$j=0;
			if($this -> input -> post('specification')){
				$specifications = $this -> input -> post('specification');
				$propertyareatype = $this -> input -> post('propertyareatype');
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
		//	$this->session->set_flashdata('success_message', 'Sucessfully Posted');
			redirect(site_url('welcome'), 'refresh');
		
	}

	public function changestatus($pid='',$sku_id='',$status='0')
	{
		$product_details = array(
						'status' => $status
					);
		$this -> products -> update($pid,$product_details);	
		$this->session->set_flashdata('success_message', 'Successfully Updated');
		redirect(site_url('users/myproperties'), 'refresh');	
	}

	public function deletepro($pid='',$sku_id='',$status='0')
	{
		$product=$this -> products -> get($pid);
		$imga = array('image','image1','image2','image3','image4','image5');
		foreach ($imga as $key => $eimg) { 
		 if($product->$eimg!='' && file_exists('./uploads/products/'.$product->$eimg))
		    unlink($this -> products ->original_path.'/products/'.$product->$eimg);                
		}		
		$this -> products -> delete($pid);		
		$this -> svalue -> delete('product_id',$pid);
		
		$this->session->set_flashdata('success_message', 'Successfully Removed');
		redirect(site_url('users/myproperties'), 'refresh');	
	}
	public function deletemywishlist()
	{
	    $wishid = $this -> input -> post('wishid');
	    
	    	if($user_details=$this -> session -> userdata('user'))
		{
		
		
			
		$this ->usershortlisted->delete('id',$wishid);
		
		$this->session->set_flashdata('success_message', 'Successfully Removed');
		
		}
			redirect(site_url('users/myshortlisted'), 'refresh');
	}
	public function edit($pid='',$sku_id='')
	{
		if($this -> products->count_all_results('id',$pid))
		{
			$user_details = $this -> session -> userdata('user');
			$rguser_details = $this ->users->get($user_details->id);
			$userType = is_object($rguser_details)?$rguser_details->type:'';
			$this->data['userType'] = $userType;

			$this->data['page'] = 'edit_properties';
			$this->data['products'] = $this -> products ->get('id',$pid);
			$cat_id = $this->data['products']->cat_id;
			if(!empty($cat_id)){
				$category = $this -> cats -> get('id',$cat_id);
				$this->data['maincatid'] = $category->parent_id;
				$this->data['sub_categories'] = $this->cats->custom_dropdown('id', 'name', array('parent_id' => $category->parent_id ));
				
				$pspecval = $this -> svalue -> get_all('product_id',$pid);
				$this->data['psv'] = array();	
				foreach ($pspecval as $value){
					$this->data['psv'][$value->spec_id][]=$value->spec_value;
				}

				$this->data['psvtype'] = array();	
				foreach ($pspecval as $value){
					$this->data['psvtype'][$value->spec_id][] = $value->areaType;
				}
				//echo "<pre>"; print_r($this->data['psvtype']); exit;
				$this->data['specifications'] = $this -> cats -> specifications($category->parent_id);
					$this->data['specifications'] = $this -> cats -> subspecifications($category->id,$category->parent_id);
				
			}
			if(!empty($this->data['products']->statename)){
				$this->data['citydtl'] = $this->citydetails->custom_dropdown('id', 'city', array('state' => $this->data['products']->statename ));
			}
			if(!empty($this->data['products']->cityname)){
				$this->data['localitydtl'] = $this->areadetails->custom_dropdown('id', 'area', array('city' => $this->data['products']->cityname ));
			}
				if(!empty($this->data['products']->localityname)){
				$this->data['areaname'] = $this->areadetails->get($this->data['products']->localityname);
			}
			$this->load->view('template',$this->data,FALSE);
		} else {
			$this->session->set_flashdata('error_message', 'URL is tempered with mismatch id');
			redirect(site_url(), 'refresh');
		}
		
	}

	public function deleteProImage($image='',$proid='')
	{
		echo $image;
		if(!empty($image) && !empty($proid)){
			$product_details[$image] = '';
			$this -> products -> update($proid,$product_details);

			/*$imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
			foreach ($imga as $eimg) {
				if($eimg == $image){
						
				}
			}*/
			
		}
	}

	public function edit_property()
	{
	
			$userid = 0;
			if($user_details=$this -> session -> userdata('user')) { 
				$userid = $user_details->id;
			}
			$sku_rand = $this -> generatePIN();
			$pro_name = substr(strtolower($this -> input -> post ('projectname')), 0,4);
			$pro_type = substr(strtolower($this -> input -> post ('propertytype')), 0,4);
			$prosku = preg_replace('/[^a-zA-Z0-9\-]/', '-',$pro_name).'-'.$sku_rand.'-'.$pro_type;
			$product_details = array(
					'dealersId' => $userid,
					'dealertype' => 'Users',
					'uploadtype' => 'property',
					'feature' => 'NO',
					'propertytype' => $this -> input -> post ('propertytype'),
					'name' => $this -> input -> post ('projectname'),
				
				//	'resale' => $this -> input -> post ('resale'),
				//	'propertystatus' => ($this -> input -> post ('propertystatus'))?$this -> input -> post ('propertystatus'):"",
				//	'propertyage' => ($this -> input -> post ('propertyage'))?$this -> input -> post ('propertyage'):"",
				
					'rerastatus' => ($this -> input -> post ('rerastatus'))?$this -> input -> post ('rerastatus'):"",
					'reraid' => ($this -> input -> post ('reraid'))?$this -> input -> post ('reraid'):"",
					'reraurl' => ($this -> input -> post ('reraurl'))?$this -> input -> post ('reraurl'):"",
					'cat_id' => $this -> input -> post ('cat_id'),
					'description' => $this -> input -> post ('description'),
						'totalarea' => $this -> input -> post ('totalarea'),
					'areatype' => $this -> input -> post ('areatype'),
					//'pricetype' => $this -> input -> post ('pricetype'),
					'priceper' => $this -> input -> post ('priceper'),
					'negotiable' => $this -> input -> post ('negotiable'),
					'price' => $this -> input -> post ('price'),
					'url_name' => preg_replace('/[^a-zA-Z0-9\-]/', '-',strtolower($this -> input -> post ('projectname'))),
					'video1' => $this -> input -> post ('video1'),
					'statename' => $this -> input -> post ('statename'),
					'cityname' => $this -> input -> post ('cityname'),
					'localityname' => $this -> input -> post ('localityname'),
					'landmark' => $this -> input -> post ('landmark'),
					'pincode' => $this -> input -> post ('pincode'),
					'latitude' => $this -> input -> post ('latitude'),
					'longitude' => $this -> input -> post ('longitude'),
					'Localityaddress' => $this -> input -> post ('house'),
					'street' => $this -> input -> post ('street'),
					'qty' => 1,
					'available_from' => date('Y-m-d',strtotime($this ->input->post ('available_from')))
				);
			//print_r($_FILES); 
			$imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
			foreach ($imga as $eimg) {
				if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
					$image = $this -> products -> do_upload_image($eimg,163,245);
					if(is_array($image)){
						$this->session->set_flashdata('error_message', $image['upload_error']);
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
					$this->session->set_flashdata('error_message', $brochure['upload_error']);
				} else {
					$product_details['brochure'] = $brochure;
				}
			}
			//print_r($product_details);exit;
			
			if($this -> input -> post('pid'))
			{
				$product_id = $this -> input -> post('pid');
				$this -> svalue -> delete('product_id',$product_id);
				$this -> products -> update($product_id,$product_details);			
				$this->session->set_flashdata('success_message', 'Successfully Updated');
			}
			else
			{
				$this -> products -> insert($product_details);
				$product_id=$this->db->insert_id();
				//------- Product assign table update -----------
				$pro_assign  = array('cat_id' => $this -> input -> post ('cat_id'),'sub_cat' => $this -> input -> post ('cat_id'), 'p_id' =>$product_id);
				$this -> product_assign -> insert($pro_assign);
				//------- product assign ends here -------------
				$this->session->set_flashdata('success_message', 'Successfully Added');			
			}
			$procudt_specifications=array();
			$j=0;
			if($this -> input -> post('specification')){
				$specifications = $this -> input -> post('specification');
				$propertyareatype = $this -> input -> post('propertyareatype');
				//echo "<pre>";
				//print_r($propertyareatype);
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
				//print_r($procudt_specifications);
				//exit;	
				$this -> db -> insert_batch('product_specification',$procudt_specifications);
			}
			redirect(site_url('users/myproperties'), 'refresh');
			//redirect(site_url('property/edit/'.$pid.'/'.$prosku), 'refresh');
		
	}

	public function userwishlist()
	{
		$product_id = $this -> input -> post ('productid');
		if(!empty($product_id)){
			$user_details = $this ->session -> userdata('user');
			$pcount= $this-> products->checkwihslist($user_details->id,$product_id);
			if(count($pcount)==0){
			   	$wishlist_form = array(
	   			'productId' => $product_id,
	   			'userId' => $user_details->id,
	   		);

			$proenquiry_id = $this -> usershortlisted -> insert($wishlist_form);
			echo "Successfully Updated";
			}
			else{
			    
				echo "Already Updated";
		
			}
   		} else {
   			echo "Something went wrong!. Please try again";
   		}
	}

	public function propertyowner()
	{
		$product_id = $this -> input -> post ('productid');
		$ownerdetails = $this -> products -> getOwnerDetails($product_id);
		$data = array('ownerdetails' =>$ownerdetails);
    	$owner_data = $this -> load -> view('includes/ownerdetails',$data,TRUE);
		echo $owner_data;
	}

	public function getLocationData($zipcode) {
    
   $API_KEY = "AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q"; // Google Map Free API Key
$url = "https://maps.google.com/maps/api/geocode/json?address=".$zipcode."&key=".$API_KEY."";
// Send CURL Request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$returnBody = json_decode($response);
// Google MAP
$status = $returnBody->status;
if($status == "REQUEST_DENIED"){ 
$result = $returnBody->error_message;
} else { 

$result = $returnBody->results[0]->geometry->location;
}
}
}
