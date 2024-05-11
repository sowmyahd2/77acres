<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mlocation extends REST_Controller {
    
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       	parent::__construct();
       	$this->load->database();
       	$this->load->model('rbgroup/Cities_model', 'citydetails');
		$this->load->model('rbgroup/States_model', 'statedetails');
        $this->load->model('rbgroup/Areas_model', 'areadetails');
    }
       
    /**
     * Get All State from this method.
     *
     * @return Response
    */
    public function state_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->db->get_where("state", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("state")->result();
        }
     	$res_data = array('states'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All City from this method.
     *
     * @return Response
    */
    public function city_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->citydetails->get_all(array('state' => $id));
        }else{
            $data = $this->db->get("city")->result();
        }
     	$res_data = array('cities'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Areas from this method.
     *
     * @return Response
    */
    public function areas_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->areadetails->get_all(array('city' => $id));
        }else{
            $data = $this->db->get("areas")->result();
        }
     	$res_data = array('areas'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }
      
    
        
}