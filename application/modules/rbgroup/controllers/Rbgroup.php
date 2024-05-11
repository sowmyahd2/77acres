<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rbgroup extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Pages_model','pages');
		//$this->load->model('Contents_model','contents');
		$this->load->model('Reguser_model','regusers');
	}

	public function index()
	{
		$this -> data['page']= 'welcome';
		$this -> data['regusersgraphlist'] = json_encode($this -> regusers -> getJsonreguserscount());

		$this -> data['bookingglist'] = ''; //json_encode($this -> enquery -> getenquirycount());
		$this->load->view('template',$this -> data);
	}

	public function home()
	{
		$this -> data['page']= 'welcome';
		$this->load->view('template',$this -> data);
	}

}

/* End of file Cms_admin.php */
/* Location: ./application/modules/navir_admin/controllers/navir_admin.php */