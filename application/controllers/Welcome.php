<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
		$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Home_product_model','home_product');
	}

	public function index()
	{
      
		$this->data['page'] = 'index';
		$this->data['page_title']="77acres - Real Estate";
		$this->data['products'] = $this-> products ->getlatestProductList(4,0);
			$this->data['totalproduct'] = count($this-> products ->getlatestProductList());
		$this->data['featuredproduct'] = $this-> products ->homeproductlist(1);
		$this->data['premiumproduct'] = $this-> products ->homeproductlist(2);
		$this->data['lookingfor'] = $this-> contents ->get_all('page_id','9');
		$this->load->view('template', $this->data, FALSE);
	}
	public function mapsearch1(){
	 $city = strtolower($_GET['city']);   
	 $this->data['page'] = 'index';
		$this->data['page_title']="RB Group - Real Estate";
		$this->data['products'] = $this-> products ->getlatestProductListcity($city);
			$this->data['totalproduct'] = count($this-> products ->getlatestProductList());
		$this->data['featuredproduct'] = $this-> products ->homeproductlist(1);
		$this->data['premiumproduct'] = $this-> products ->homeproductlist(2);
		$this->data['lookingfor'] = $this-> contents ->get_all('page_id','9');
		$this->load->view('template', $this->data, FALSE);
	}
	public function mapsearch()
	{
	     $city = strtolower($_POST['city']);
	     
	  
		$products = $this-> products ->getlatestProductListcity($city);
		
		 
         	 if(is_array($products) && count($products)){
         $pro_active=0; $pro=0; foreach ($products as $key => $products) { 
         $url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
         $url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
         $htm.='<div class="property-block col-lg-3 col-md-6 col-sm-12"><div class="inner-box"> <div class="image-box ">';
         
             $rimgcount = 1;
                    
                           $src = base_url().'uploads/products/'.$products->image;
                           $htm.='<figure class="image"><img src='.$src.' alt="" class="imagesnwe1"></figure>';
                         
                     $htm.='<span class="for">'.$products->protype.'</span>';
                    
                  
                     $htm.=' <div style="float:left;text-align:left;">
                          <ul class="info clearfix" style="background: #0006;">
              
                             <li style="float:left;text-align:left;">PRICE</li>
                           
                     <li style="float:left;text-align:left;"><a href=""> &#8377;'.price_format($products->price).' </a></li>
                    <li style="float:left;text-align:left;">Total Area</li>
                  <li style="float:left;text-align:left;"><a href=""> '.$products->totalarea."/".$products->areatype.' </a></li>
                  
                  </ul>
                    </div>
                    <div style="">
                          <ul class="info clearfix" style="background: #0006;">
                       
                       <li style="position: relative;top:-25px"><a href="">  &#8377;'.price_format($products->priceper)."/". $products->areatype.' </a></li>
              
                            
                  
                  </ul>
                    </div>';  
                  $htm.='</div>';      
         $htm.=' <div class="lower-content" style="height:260px">
                  <ul class="tags" style="color:black">
                  <li><a href="">'.$products->subcat.'</a></li>
                     <li><a href="">'.$products->catagory.'</li>
                     
                  </ul>
                  <h3 style="height:25px ;overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;">
  <a href='.site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id.'>'.$products->name.'</a>
  <a href='.$products->subcat.'></a></h3>
  
                  <div class="lucation"><i class="la la-map-marker"></i>';
                  if($products->aname!=""){
                      
                  
                 $htm.=ucfirst($products->aname).",";
                  }
                  if($products->landmark!=""){ $htm.=  ucfirst($products->landmark).","; }
                  $htm.=ucfirst($products->cname).", ".ucfirst($products->sname).'-'.$products->pincode;
                  
                  $htm.='</div>
               
                  
                  <div class="property-price clearfix">
                     <div class="read-more"><a href="'.site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id.'" class="theme-btn">More Detail</a></div>
                     <a data-id="'.$products->id.'"  class="propertyenqbutton1  data-backdrop="false"> <div class="price">Call</div></a>
                  </div>
               </div>';
    
      $htm.="</div>";
      $htm.="</div>";
     
       
         }
         	 }
           
         	 echo $htm;

	}
   public function load_more(){
      $limit=$this->input->post('limit');
        $offset=$this->input->post('offset');
           $products = $this-> products ->getlatestProductList( $limit,$offset);
        
            if(is_array($products) && count($products)){
        $pro_active=0; $pro=0; foreach ($products as $key => $products) { 
        $url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
        $url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
        $htm.='<div class="property-block col-lg-3 col-md-6 col-sm-12"><div class="inner-box"> <div class="image-box ">';
        
            $rimgcount = 1;
                   
                          $src = base_url().'uploads/products/'.$products->image;
                          $htm.='<figure class="image"><img src='.$src.' alt="" class="imagesnwe1"></figure>';
                        
                    $htm.='<span class="for">'.$products->protype.'</span>';
                   
                 
                    $htm.=' <div style="float:left;text-align:left;">
                         <ul  style="position: absolute;
   bottom: 10px;
   width: 100%;
   padding: 5px;
   z-index: 99;background:#F5F5F;color:#ffffff;">
              <li style="bottom:-10px; float:right;margin-top:20px;position:relative;color:#ffffff;padding:0px 5px 0px 5px !important">  &#8377;'.price_format($products->priceper)."/". $products->areatype.'</li>
                            <li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">PRICE</li>
                          
                    <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377;'.price_format($products->price).' </li>
                   <li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">Total Area</li>
                 <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> '.$products->totalarea." ".$products->areatype.' </li>
                 
                 </ul>
                   </div>';  
                 $htm.='</div>';      
        $htm.=' <div class="lower-content">
        <ul class="tags" style="color:black">
                    <strong>'.$products->catagory.',
                   '.$products->subcat.'</strong></li>
                 </ul>
                 <h3><strong>
 <a href='.site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id.'>'.$products->name.'</a></strong>
 <a href='.$products->subcat.'></a></h3>
 
                 <div class="lucation"><i class="la la-map-marker"></i>';
                 if($products->aname!=""){
                     
                 
                $htm.=ucfirst($products->aname).",";
                 }
                 if($products->landmark!=""){ $htm.=  ucfirst($products->landmark).","; }
                 $htm.=ucfirst($products->cname).", ".ucfirst($products->sname).'-'.$products->pincode;
                 
                 $htm.='</div>
              
                 
                 <div class="property-price clearfix">
                    <div class="read-more"><a href="'.site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id.'" class="theme-btn">More Detail</a></div>
                    <div class="price"><a data-id="'.$products->id.'"  class="propertyenqbutton1  data-backdrop="false">Call</a></div>
                 </div>
              </div>';
   
     $htm.="</div>";
     $htm.="</div>";
    
      
        }
            }
             
            echo $htm;
      
  }
	public function errorpage()
	{
		$this->data['page']='404';
	    $this -> load -> view('template',$this->data);
	}
	public function getlocation(){
      if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
         $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false&key=AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q';
         $json = file_get_contents($url);
         $data = json_decode($json);
         $status = $data->status;
   
         if ($status == "OK") {
             $location = '';
             
             // Loop through address components to find locality
             foreach ($data->results[0]->address_components as $component) {
                 if (in_array('locality', $component->types)) {
                     $location = $component->long_name;
                     break;
                 }
             }
     
             // If locality is found, echo it; otherwise, $location will be an empty string
             echo $location;
             die();
         } else {
             $location = '';
         }
     }
//	redirect('welcome/index1/',$location);
}

}