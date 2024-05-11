<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Admin_Controller {	

	var $catsl = array();
	var $standard = FALSE;
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Categories_model', 'cats');
		$this ->load->model('Category_specification_values_model','catspecvals');
		$this->load->model('Category_specification_model','catspes');
		$this->load->model('Specifications_model','spes');
		$this -> data['page'] = 'categories.php';
		$this->load->model ('rbgroup/Propertytype_model', 'propertytype');
	}

	public function index($url_name='')
	{	
		if(($url_name!='1' ||$url_name!='2' ||$url_name!='3') && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);
			if($this -> data['category']->standard!='' && $this -> data['category']->standard!='0')
			{
			    			$this->data['grpid']=$url_name;
			    			$this->data['property_type']=0;
				$this -> data['specs'] = $this -> cats -> specifications($this -> data['category']->id);				
				$this -> data['specifications'] = $this -> spes -> dropdown('id','name');
			}
			$this->data['grpid']=$url_name;
			
			$this -> data['categories'] = $this -> cats -> get_all('parent_id',$this -> data['category']->id);
			$this -> category($this -> data['category']->id);
			ksort($this -> catsl);
		else:
			$this->data['grpid']=$url_name;
			$this->data['property_type']=$url_name;
			$this -> data['categories'] = $this -> cats -> get_all('property_type',$url_name);
		endif;
		switch($url_name){
		    case 1:
    $this -> data['type']="Buy";
    break;
  case 2:
    $this -> data['type']="Rent";
    break;
  case 3:
    $this -> data['type']="Lease";
    break;
  default:
   $this -> data['type']="";
		}
		$this -> data['page'] = 'categories';
		$this -> data['catsl'] = $this -> catsl;
		$this -> data['standard'] = $this ->standard;
		$this->load->view('template',$this -> data);
	}
	public function detail($groupid,$url_name='')
	{	
	 		if($groupid!=1 ||$groupid!=2 || $groupid!=3 || $groupid!=4){
			$this -> data['category'] = $this -> cats -> get(array('url_name'=>$url_name,'parent_id'=>$groupid));   
		   }
		   else{
			 $this -> data['category'] = $this -> cats -> get(array('url_name'=>$url_name,'property_type'=>$groupid));  
		   }
if(($url_name!='1' ||$url_name!='2' ||$url_name!='3') && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);
			if($this -> data['category']->standard!='' && $this -> data['category']->standard!='0')
			{
			    			$this->data['grpid']=$url_name;
			    			$this->data['property_type']=0;
				$this -> data['specs'] = $this -> cats -> specifications($this -> data['category']->id);				
				$this -> data['specifications'] = $this -> spes -> dropdown('id','name');
			}
			$this->data['grpid']=$url_name;
			
			$this -> data['categories'] = $this -> cats -> get_all('parent_id',$this -> data['category']->id);
			$this -> category($this -> data['category']->id);
			ksort($this -> catsl);
		else:
			$this->data['grpid']=$url_name;
			$this->data['property_type']=$url_name;
			$this -> data['categories'] = $this -> cats -> get_all('property_type',$url_name);
		endif;
		$this -> data['page'] = 'categories';
		$this -> data['catsl'] = $this -> catsl;
		$this -> data['standard'] = $this ->standard;
		$this->load->view('template',$this -> data);
	}
	public function details($groupid,$url_name='')
	{	
	 
if(($url_name!='1' ||$url_name!='2' ||$url_name!='3') && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);
			if($this -> data['category']->standard!='' && $this -> data['category']->standard!='0')
			{
			    			$this->data['grpid']=$url_name;
			    			$this->data['property_type']=0;
				$this -> data['specs'] = $this -> cats -> specifications($this -> data['category']->id);				
				$this -> data['specifications'] = $this -> spes -> dropdown('id','name');
			}
			$this->data['grpid']=$url_name;
			
			$this -> data['categories'] = $this -> cats -> get_all('parent_id',$this -> data['category']->id);
			$this -> category($this -> data['category']->id);
			ksort($this -> catsl);
		else:
			$this->data['grpid']=$url_name;
			$this->data['property_type']=$url_name;
			$this -> data['categories'] = $this -> cats -> get_all('property_type',$url_name);
		endif;
		$this -> data['page'] = 'Cateogory_detail';
		$this -> data['catsl'] = $this -> catsl;
		$this -> data['standard'] = $this ->standard;
		$this->load->view('template',$this -> data);
	}
		
	public function category($id)
	{
		$category = $this -> cats -> get ($id);
		$this -> catsl[$category->id]['name'] = $category->name;
		$this -> catsl[$category->id]['url_name'] = $category->url_name;
		if($category->standard) $this->standard = TRUE;
		if($category->parent_id!=0)
			$this -> category($category->parent_id);
	}

	public function add_edit()
	{
		$standard = $leaf = 0;
		$nodetype = $this -> input -> post('nodetype');
		if($nodetype == 1){
			$standard = 1;
		} else if($nodetype == 2){
			$standard = 1;
			$leaf = 1;
		}
	
		if($this -> input -> post('property_type')==$this -> input -> post('grpid')){
		    if($this -> input -> post('grpid')==1){
		       $url="buy"; 
		    }
		    else if($this -> input -> post('grpid')==2){
		       $url="rent"; 
		    }
		    else{
		     $url="lease";    
		    }
		    $url_name=$url."-".strtolower($this -> input -> post ('name'));
			$category = array(
			'name' => $this -> input -> post('name'),
			'parent_id' => $this -> input -> post('parent_id'),
			'url_name'	=> preg_replace('/[^a-zA-Z0-9\-]/', '-',$url_name),
			'standard' => $standard,
			'leaf' => $leaf,
			'property_type'=>$this -> input ->post('property_type')
		);    
		}
	else{
	    $urlname=strtolower($this -> input -> post ('grpid'))."-".strtolower($this -> input -> post ('name'));
	    	$category = array(
			'name' => $this -> input -> post('name'),
			'parent_id' => $this -> input -> post('parent_id'),
			'url_name'	=> preg_replace('/[^a-zA-Z0-9\-]/', '-',$urlname),
			'standard' => $standard,
			'leaf' => $leaf,
			'property_type'=>0
		);
	}
		//echo '<pre>'; print_r($category); exit();
		if($this -> input -> post('id') ==''){
			$this -> cats -> insert($category);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else {
			$this -> cats -> update($this -> input -> post('id'),$category);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}
	
	public function add_specifications()
	{
		$specifications = $this -> input -> post('speci');
		$cat_id = $this -> input -> post('cat_id');
		$specs = array();
		if(!empty($specifications))
		{
			foreach($specifications as $key => $specification)
			{
				$specs[] = array(
					'cat_id' => $cat_id,
					'spec_id' => $specification
				);
			}
		}
		$this -> db -> insert_batch('category_specification',$specs);
		$this -> session -> set_flashdata('message','Successfully Added');
		redirect($this -> input -> post('curl'));
	}
	public function specific_values()
	{
		$specifications_values = array(
			'name' => $this -> input -> post('name'),
			'cat_id' => $this -> input -> post('cat_id'),
			'spec_id'	=> $this -> input -> post('spec_id')			
		);
		//echo '<pre>'; print_r($category); exit();
		if($this -> input -> post('id') ==''){
			$this -> catspecvals -> insert($specifications_values);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else {
			$this -> catspecvals -> update($this -> input -> post('id'),$specifications_values);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}
	public function speci_delete($spec_id='')
	{
		extract($_POST);		
		$this -> catspecvals -> delete($spec_id);					
	}
	public function cspecifi_delete()
	{
		extract($_POST);
		$del_catagory = array('spec_id' =>$spec_id,'cat_id' =>$c_id );		
		$this -> catspes -> delete($del_catagory);					
		$this -> catspecvals -> delete($del_catagory);					
	}
	
	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('abs_id');
	    $result = $this -> cats ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function delete($id='')
	{
		extract($_POST);		
		$this -> cats -> delete($ct_id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

	public function duplicatenamecheck()
	{
		if($_POST['name']!='')
		{
			$checkname = array('name'=> $this -> input -> post('name'));
			if($this -> cats->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}

	public function duplicategorynamecheck()
	{
		if($_POST['name']!='')
		{
			$checkname = array('name'=> $this -> input -> post('name'),'property_type'=>$this -> input -> post('property_type'));
			if($this -> cats->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}
}
