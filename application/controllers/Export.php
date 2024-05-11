<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends User_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Library
        $this->load->library("excel");
        // Load the Model
        $this->load->model('rbgroup/Reguser_model','regusers');
        $this->load->model('rbgroup/Enquire_model','enquire');
        $this->load->model('rbgroup/Proenquiry_model','proenquiry');
    }

    public function enquery() 
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Enq Type", "Firstname", "Lastname", "Email", "Mobile", "Message", "CreatedOn");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $employee_data = $this->enquery->get_all();

        $excel_row = 2;

        foreach($employee_data as $key => $value)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $value->enqType);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $value->fname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $value->lname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $value->emailid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $value->phoneNumber);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $value->message);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $value->createdOn);
            $excel_row++;
        }
        $file_name= date('y-m-d H:s:i',time());
        $filename=$file_name.'_enquery.xls';
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $object_writer->save('php://output');
        

    }

     public function proenquery($userid='') 
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Name", "Email Id", "Phone Number", "Message", "Property Name", "Property Id", "CreatedOn");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $employee_data = $this ->proenquiry->getConsultantEnquery($userid);

        $excel_row = 2;

        foreach($employee_data as $key => $value)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $value->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $value->emailid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $value->phonenumber);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $value->message);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $value->pname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $value->psku);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $value->updatedon);
            $excel_row++;
        }
        $file_name= date('y-m-d H:s:i',time());
        $filename=$file_name.'_property_enquery.xls';
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $object_writer->save('php://output');
        

    }

    public function userdetails() 
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("RefId", "Full Name", "Firstname", "Lastname", "Email", "Address", "Mobile", "Pincode", "RegType");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $employee_data = $this->regusers->get_all();

        $excel_row = 2;

        foreach($employee_data as $key => $value)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $value->id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $value->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $value->fname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $value->lname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $value->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $value->address1);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $value->phone);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $value->zip_code);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $value->reg_type);
            $excel_row++;
        }
        $file_name= date('y-m-d H:s:i',time());
        $filename=$file_name.'_users.xls';
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $object_writer->save('php://output');
        

    }


        

}