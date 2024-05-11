<?php 
$config = array(
   'userlogin' => array(
      array(
      'field' => 'username',
      'label' => 'Email Id',
      'rules' => 'required|valid_email'
      ),
      array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required'
      )
   ),
   'guestlogin' => array(
      array(
      'field' => 'guestusername',
      'label' => 'Email Id',
      'rules' => 'required|valid_email'
      )
   ),
   'contactus_form' => array(
      array(
      'field' => 'fname',
      'label' => 'Fisrt Name',
      'rules' => 'required'
      ),
      array(
      'field' => 'phonenumber',
      'label' => 'Phone Number',
      'rules' => 'required'
      ),
      array(
      'field' => 'emailid',
      'label' => 'Email Id',
      'rules' => 'required|valid_email'
      ),
      array(
      'field' => 'message',
      'label' => 'Message',
      'rules' => 'required'
      )
   ),
   'productreview_form' => array(
      array(
      'field' => 'emailid',
      'label' => 'Email Id',
      'rules' => 'required|valid_email'
      ),
      array(
      'field' => 'productid',
      'label' => 'Product Id',
      'rules' => 'required'
      ),
      array(
      'field' => 'fullname',
      'label' => 'Full Name',
      'rules' => 'required'
      ),
      array(
      'field' => 'comments',
      'label' => 'Commnets',
      'rules' => 'required'
      )
   ),
   'homesearch_form' => array(
      array(
      'field' => 'name',
      'label' => 'Product Name',
      'rules' => 'required'
      )
   ),
   'postprojects_form' => array(
     
      array(
      'field' => 'propertytype',
      'label' => 'property type',
      'rules' => 'required'
      ),
      array(
      'field' => 'qty',
      'label' => 'qty',
      'rules' => 'required'
      ),
      array(
      'field' => 'main_id',
      'label' => 'Category name',
      'rules' => 'required'
      ),
      array(
      'field' => 'cat_id',
      'label' => 'Sub Category name',
      'rules' => 'required'
      ),
      array(
      'field' => 'Localityaddress',
      'label' => 'Locality address',
      'rules' => 'required'
      ),
      array(
      'field' => 'state',
      'label' => 'state name',
      'rules' => 'required'
      ),
      array(
      'field' => 'cityname',
      'label' => 'City name',
      'rules' => 'required'
      ),
      array(
      'field' => 'totalarea',
      'label' => 'total area',
      'rules' => 'required'
      ),
      array(
      'field' => 'available_from',
      'label' => 'available from',
      'rules' => 'required'
      ),
      array(
      'field' => 'pricetype',
      'label' => 'price type',
      'rules' => 'required'
      ),
      array(
      'field' => 'price',
      'label' => 'price',
      'rules' => 'required'
      ),
   /*    array(
      'field' => 'description',
      'label' => 'description',
      'rules' => 'required'
      )*/
   ),
   'postproperties_form' => array(
     /* array(
      'field' => 'name',
      'label' => 'name',
      'rules' => 'required'
      ),
      array(
      'field' => 'contact',
      'label' => 'contact',
      'rules' => 'required'
      ),*/
      array(
      'field' => 'user_type',
      'label' => 'user type',
      'rules' => 'required'
      ),
      array(
         'field' => 'projectname',
         'label' => 'Project name',
         'rules' => 'required'
         ),
      array(
      'field' => 'propertytype',
      'label' => 'property type',
      'rules' => 'required'
      ),
      array(
      'field' => 'main_id',
      'label' => 'Category name',
      'rules' => 'required'
      ),
      array(
      'field' => 'cat_id',
      'label' => 'sub Category name',
      'rules' => 'required'
      ),
   /*   array(
      'field' => 'propertystatus',
      'label' => 'property status',
      'rules' => 'required'
      ),
      array(
      'field' => 'pricetype',
      'label' => 'price type',
      'rules' => 'required'
      ),
     
      array(
      'field' => 'house',
      'label' => 'house',
      'rules' => 'required'
      ),
      array(
      'field' => 'street',
      'label' => 'street',
      'rules' => 'required'
      ),*/
    
      
      array(
      'field' => 'priceper',
      'label' => 'price per',
      'rules' => 'required'
      ),
     /*  array(
      'field' => 'available_from',
      'label' => 'available from',
      'rules' => 'required'
      ),
      array(
      'field' => 'negotiable',
      'label' => 'negotiable',
      'rules' => 'required'
      ), */
      array(
      'field' => 'price',
      'label' => 'price',
      'rules' => 'required'
      )
   ),
    'postproperties_form1' => array(
    
      array(
      'field' => 'user_type',
      'label' => 'user type',
      'rules' => 'required'
      ),
     
   )

);