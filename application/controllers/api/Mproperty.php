<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mproperty extends REST_Controller {
    
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       	parent::__construct();
       	$this->load->database();
       	$this->load->model('rbgroup/Categories_model','cats');
        $this->load->model('rbgroup/Products_model','products');
        $this->load->model('rbgroup/Product_assign_model','product_assign');
        $this->load->model('rbgroup/Specifications_model','spes');
        $this->load->model('rbgroup/Product_specifications_model','svalue');
        $this->load->model('rbgroup/Category_specification_values_model','catspecvals');
        $this->load->model('rbgroup/Propertytype_model', 'propertytype');
        $this->load->model('rbgroup/Propertystatus_model', 'propertystatus');
        $this->load->model('rbgroup/Propertyage_model', 'propertyage');
        $this->load->model('rbgroup/Propertyads_model', 'propertyads');
    }
       
    /**
     * Get All Category from this method.
     *
     * @return Response
    */
    public function category_get($id = 0)
    {
        $data = $this->cats->get_all(array('parent_id' => $id ));
        $res_data = array('category'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All propertytype from this method.
     *
     * @return Response
    */
    public function propertytype_get()
    {
        $data = $this->propertytype->get_all();
        $res_data = array('propertytype'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All propertystatus from this method.
     *
     * @return Response
    */
    public function propertystatus_get()
    {
        $data = $this->propertystatus->get_all();
        $res_data = array('propertystatus'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All propertyage from this method.
     *
     * @return Response
    */
    public function propertyage_get()
    {
        $data = $this->propertyage->get_all();
        $res_data = array('propertyage'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All categorylist from this method.
     *
     * @return Response
    */
    public function categorylist_get(){
        $sm1_finalsubcat = $sm_finalsubcat = $sm_fincal_category  = array();
        $staticmenu =  $this-> cats -> getCategoryTree();
        if(is_array($staticmenu) && !empty($staticmenu))
        {
            foreach ($staticmenu as $smkey => $smvalue) {
                $mainmenu = explode("@", $smkey);
                $mainmenu_urlname = $mainmenu[2]."/";
                //------- Second level starts here ------------------
                if(!empty($smvalue) && is_array($smvalue)){
                    foreach ($smvalue as $key1 => $value1) {
                        $sm_subpart = explode("@", $key1);
                        //-------------- Third Level starts here -------------
                        if(!empty($value1) && is_array($value1)){
                            foreach ($value1 as $key2 => $value2) {
                                $sm_subpart1 = explode("@", $key2);
                                $subsubcatimage = $mainmenu_urlname.$sm_subpart1[2].".png";
                                $sm1_finalsubcat[] = array('subsubid' => $sm_subpart1[0], "subsubname" => $sm_subpart1[1], "subsuburl" => $sm_subpart1[2], "subsubimage" => $subsubcatimage);
                            }
                        }
                        //--------- Third leval ends here ---------------
                        $subcatimage = $mainmenu_urlname.$sm_subpart[2].".png";
                        $sm_finalsubcat[] = array('subid' => $sm_subpart[0], "subname" => $sm_subpart[1], "suburl" => $sm_subpart[2], "subimage" => $subcatimage,"SubSubcat" => $sm1_finalsubcat);
                        $sm1_finalsubcat = array();
                    }
                }
                // ------------ Second level ends here -------------------
                
                $maincatimage = $mainmenu[2].".png";
                $sm_fincal_category[] = array("Maincatid"=>$mainmenu[0],"Maincatname"=>$mainmenu[1],"Maincaturl"=>$mainmenu[2], "mainimage" => $maincatimage,"Subcat"=>$sm_finalsubcat);
                $sm_finalsubcat= array();
                $mainmenu_urlname = $mainmenu[2]."/";
            }
            //print_r($sm_fincal_category); exit;
            $Response = array("isSuccess" => true,"response" => "All category loaded","mainmenuList" => $sm_fincal_category);
        } else {
            $Response = array("isSuccess" => true,"response" => "Category is empty");
        }
        $this->response($Response, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Image aray change from this method.
     *
     * @return Response
    */
    public function propertyDataFilter($product_data)
    {
        $ProResponse = $image = $videos = array();
        $videoarray = array('video1','video2');
        $imagearray = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
        $productimagepath = site_url('uploads/products/');
        if(is_array($product_data) && count($product_data)){
            foreach ($product_data as $key => $value) {
            	foreach ($imagearray as $eimg) { 
            		if($value-> $eimg!='' && file_exists('./uploads/products/'.$value->$eimg)){
            			$image[] = !empty($value -> $eimg)?$productimagepath.$value -> $eimg:'';
            			
            		}
            		unset($value -> $eimg);
            	}
                foreach ($videoarray as $evido) { 
                    if(!empty($value -> $evido)){
                        $videos[] = $value -> $evido;
                    }
                }


            	$ProResponse[] = array("id"=> $value -> id,"cat_id"=> $value -> sku_id,"dealersId"=> $value -> dealersId,"dealertype"=> $value -> dealertype,"feature"=> $value -> feature,"premium"=> $value -> premium,"propertytype"=> $value -> protype,"sku_id"=> $value -> sku_id,"name"=> $value -> name,"url_name"=> $value -> url_name,"pricetype"=> $value -> pricetype,"priceper"=> $value -> priceper,"negotiable" => $value -> negotiable,"price"=> $value -> price,"qty"=> $value -> qty,"totalarea"=>$value -> totalarea,"totalareaname"=>$value -> protypeareaname,"statename"=>$value -> statename,"cityname"=>$value -> cityname,"localityname"=>$value -> localityname,"house"=>$value -> house,"street"=>$value -> street,"Localityaddress"=>$value -> Localityaddress,"pincode"=>$value -> pincode,"landmark"=>$value -> landmark,"latitude"=>$value -> latitude,"longitude"=>$value -> longitude,"brochure"=>$value -> brochure,"description"=>$value -> description,"propertyage"=>$value -> propertyage,"rerastatus"=>$value -> rerastatus,"reraid"=>$value -> reraid,"reraurl"=>$value -> reraurl,"last_updated"=>$value -> last_updated,
		            "available_from"=>$value -> available_from,
		            "total_qty"=>isset($value -> total_qty)?$value -> total_qty:'',
		            "catagory"=>$value -> catagory,
		            "subcat"=>$value -> subcat,
		            "protype"=>$value -> protype,
		            "ownertype"=>$value -> ownertype,
		            "ownerfname"=>$value -> ownerfname,
		            "ownerlname"=>$value -> ownerlname,
		            "sname"=>$value -> sname,
		            "cname"=>$value -> cname,
		            "aname"=>$value -> aname,'imageList'=>$image,"videoList"=>$videos);

				$image = $videos = array();
            }
            return $ProResponse;
        }
    }
    
    /**
     * Get All the recent property from this method.
     *
     * @return Response
    */
    public function propertylist_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
        	$res_data = array('isSuccess'=> false,'response'=> 'Post data is empty');
            $this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        } else {
        	$pro_type = $obj['itemType'];
        	if(empty($pro_type)){
        		$res_data = array('isSuccess'=> false,'response'=> 'Item Type is not found in our list');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
            }
            $per_page = $obj["itemSize"];
            $page = $obj["pageNo"];
            $data = $this-> products ->getMobileProductList($pro_type,$per_page,$page);
            if(is_array($data) && count($data)){
	        	$Fdata = $this->propertyDataFilter($data);
	        	$res_data = array("isSuccess" => true,"response" => "All items loaded","itemList" => $Fdata);
	        	$this->response($res_data, REST_Controller::HTTP_OK);
        	} else {
        		$res_data = array('isSuccess'=> false,'response'=> 'Item Not Found');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        	}
        }
    }

    /**
     * POST All featured property from this method.
     *
     * @return Response
    */
    public function featuredpropertylist_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
        	$res_data = array('isSuccess'=> false,'response'=> 'Post data is empty');
            $this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        } else {
        	$per_page = $obj["itemSize"];
            $page = $obj["pageNo"];
            $data = $this-> products ->featuredMpropertylist(1,$per_page,$page);
            if(is_array($data) && count($data)){
            	$Fdata = $this->propertyDataFilter($data);
        		$res_data = array("isSuccess" => true,"response" => "All items loaded","itemList" => $Fdata);
        		$this->response($res_data, REST_Controller::HTTP_OK);
            } else {
            	$res_data = array('isSuccess'=> false,'response'=> 'Item Not Found');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
            }
        	
        }
	}

    /**
     * Get All premium property from this method.
     *
     * @return Response
    */
    public function premiumpropertylist_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
        	$res_data = array('isSuccess'=> false,'response'=> 'Post data is empty');
            $this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        } else {
        	$per_page = $obj["itemSize"];
            $page = $obj["pageNo"];
            $data = $this-> products ->featuredMpropertylist(2,$per_page,$page);
            if(is_array($data) && count($data)){
            	$Fdata = $this->propertyDataFilter($data);
        		$res_data = array("isSuccess" => true,"response" => "All items loaded","itemList" => $Fdata);
        		$this->response($res_data, REST_Controller::HTTP_OK);
            } else {
            	$res_data = array('isSuccess'=> false,'response'=> 'Item Not Found');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
            }
        	
        }
    }

    /**
     * Get All propertyads from this method.
     *
     * @return Response
    */
    public function propertyads_get($pro_type = 'ALL')
    {
        $data = $this-> propertyads ->getAdsList($pro_type);
        $res_data = array('propertyads'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }
    
    /**
     * Get All otherproperty from this method.
     *
     * @return Response
    */
    public function otherproperty_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
        	$res_data = array('isSuccess'=> false,'response'=> 'Post data is empty');
            $this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        } else {
        	$pro_type = $obj['itemType'];
        	if(empty($pro_type)){
        		$res_data = array('isSuccess'=> false,'response'=> 'Item Type is not found in our list');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
            }
            $per_page = $obj["itemSize"];
            $page = $obj["pageNo"];
            $data = $this-> products ->getMobileProductList($pro_type,$per_page,$page);
            if(is_array($data) && count($data)){
	        	$Fdata = $this->propertyDataFilter($data);
	        	$res_data = array("isSuccess" => true,"response" => "All items loaded","itemList" => $Fdata);
	        	$this->response($res_data, REST_Controller::HTTP_OK);
        	} else {
        		$res_data = array('isSuccess'=> false,'response'=> 'Item Not Found');
            	$this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        	}
        }
        
    }

    /**
     * Get All mainsearch from this method.
     *
     * @return Response
    */
    public function mainsearch_post()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
            $res_data = array('isSuccess'=> false,'response'=> 'Post data is empty');
            $this->response($res_data, REST_Controller::HTTP_BAD_REQUEST );
        } else {
            $search_content = array(
                'cityname' => $obj['cityname'],
                'propertytype' => $obj['propertytype'],
                'category' => $obj['category']
            );
           
            $cityname = $obj['cityname'];
            $propertytype = $obj['propertytype'];
            $category = $obj['category'];
            
            $data = $this-> products ->getsearchProductList($cityname,$propertytype,$category);
            $products = $this->propertyDataFilter($data);
            $otherproduct = $this-> products ->getOtherProductList($propertytype);
            $propertyads = $this-> propertyads ->getAdsList($propertytype);

            $res_data = array('isSuccess'=> true,'response'=>array('searchInput'=>$search_content,'property'=>$products,'otherproduct'=>$otherproduct,'propertyads'=>$propertyads));
            $this->response($res_data, REST_Controller::HTTP_OK);
        
        }
    }

    /**
     * Get All property details from this method.
     *
     * @return Response
    */
    public function overview_get($sku_id='')
	{
		if($sku_id!='' && $this -> products -> count_all_results(array('sku_id'=>$sku_id))) :	
			
			$product = $this -> products -> get_product_details($sku_id);
			
			//Product View will be updated here
			$update_viewers=array('viewed'=>$product->viewed+1);		
			$this -> products -> update($product->id,$update_viewers);	

			$Rproducts = $this -> products -> getMobileRealtedProduct($product->cat_id,$product->id);

			$realted_products = $this->propertyDataFilter($Rproducts);

			$specification = $this -> products ->product_specifi_view($product->id);

			$amspecification = $this -> products ->product_amenities_specifi_view($product->id);

			$data = $this -> products -> getMobileProductdetails($sku_id);
            
			$products = $this->propertyDataFilter($data);
            //print_r($products); 
			$res_data = array('isSuccess'=> true,'response'=>array('property'=>$products,'specification'=>$specification,'amenities'=>$amspecification,'realtedproperty'=>$realted_products));

            $this->response($res_data, REST_Controller::HTTP_OK);
		    	
		else:
			$this->response(array('isSuccess'=> false,'response'=> 'Incorrect property SKU'), REST_Controller::HTTP_BAD_REQUEST );
		endif;
	}
    
    
        
}