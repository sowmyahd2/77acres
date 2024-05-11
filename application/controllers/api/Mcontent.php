<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mcontent extends REST_Controller {
    
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       	parent::__construct();
       	$this->load->database();
       	$this->load->model('rbgroup/Contents_model','contents');
        $this->load->model('rbgroup/Contactus_model','contactus');
        
    }
       
    /*
    Rest Function
    Method: GET
    Action: Common API in which you will get
        About Us
        Privacy Policy
        Tearms and Condition
        Contact us and so on...
    */
    public function cmscontent_get(){
        $page_response = $this -> contents -> get_allpages(); //array('page_id'=>$this->data['cms']->id,'p_id'=>$p_id)
        $final_result = array();
        $first_node = $second_node = "";
        foreach ($page_response as $key => $value) {
            if(!empty($value -> page_name) && $value -> page_name!=""){
                $first_node = $value -> url_name;
                if($first_node == $second_node){
                    $final_result[$first_node][] = array("name" => $value -> name, "description" => $value -> description, "image" => $value -> image, "othercontent" => $value -> other_column);
                $second_node = $first_node;
                } else {
                    if($second_node!=""){
                    $final_result[$second_node][] = array("name" => $value -> name, "description" => $value -> description, "image" => $value -> image, "othercontent" => $value -> other_column);
                    }
                    $second_node = $first_node;
                } 
            }
        }
        foreach($final_result as $key=>$value)
        {
            if(is_null($value) || $value == '')
                unset($final_result[$key]);
        }
        $this->response(array('isSuccess'=> true,'response'=> $final_result), REST_Controller::HTTP_CREATED);
    }

    public function contactus_get()
    {
        $data = $this -> contactus -> get();
        $res_data = array('contactus'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }
   
}