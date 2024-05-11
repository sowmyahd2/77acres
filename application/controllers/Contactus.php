<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contactus_model', 'contactus');
		$this->load->model('Common_model', 'common');
	}

	public function index()
	{
		$this -> data['page_title']="Contact us";
		$this->data['contactus'] = $this -> contactus -> get();
		$this->data['page'] = 'contact';
		$this->load->view('template',$this->data,FALSE);
	}

	public function contactusform()
	{
		if($this->form_validation->run('contactus_form') == FALSE)
	   	{
	   		$this->session->set_flashdata('error', validation_errors());
	   		redirect(site_url().'contactus', 'refresh');
	   	}
	   	else
	   	{
	   		$contact_form = array(
	   			'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('name')),
	   			'emailid' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('emailid')),
	   			'phonenumber' => $this -> input -> post ('phonenumber'),
	   			'subject' => $this -> input -> post ('subject'),
	   			'content' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('message'))
			);
	   		//mail code
				$message = $this -> load -> view('email/contactus',$contact_form,TRUE);
				$email_result = $this -> common -> send_mail(admin_email,admin_email,'Welcome to rbgroup',$message);
			//mail code ends here
			$this->session->set_flashdata('message', 'Thank you for your feedback.');
	   		redirect(site_url(), 'refresh');
	   	}
	}
}