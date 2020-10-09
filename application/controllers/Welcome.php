<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
$data['title'] = 'Add Users';





		$this->load->view('welcome_message',$data);
	}


	function saveusers()
	{
		 try {
            $postdata = $this->input->post();
           if(!empty($postdata['firstname'])  && !empty($postdata['email']) && !empty($postdata['mobile']) && !empty($postdata['country']))
		  {
		  	  $postdata['addeddate'] = date('Y-m-d h:i:s');

		  	   /*$curl = curl_init();
$auth_data = array(
	'grant_type' 		=> 'client_credentials',
	'client_id' 		=> '4757d16a-6950-4e42-8402-ea90dfa0d5b1',
	'Client_secret' 	=> '859gGi6QjlGep81ss8paNipvyxG5odtt'
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_URL,'https://281-PON-571.mktorest.com/identity/oauth/token');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
if(!$result){die("Connection Failure");}
curl_close($curl);
echo $result;

die;
	
	$p_url = 'https://281-PON-571.mktorest.com/rest/v1/leads.json';
	
	$post_array = array(
		'Access_token' => $result['auth_token'],
		'domain' => 'https://281-PON-571.mktorest.com',
		'product_url' => $p_url,
		'email' => $postdata['addeddate'],
		'FirstName' => $postdata['firstname'],
		'mobile' =>$postdata['mobile'],
		'country' =>$postdata['country']
	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post_array);
	curl_setopt($curl, CURLOPT_URL, 'https://api-site.com/v1/reviews');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	$result = curl_exec($curl);
	if(!$result){die("Connection Failure");}
	curl_close($curl);
	//echo $result;*/


              if(isset($postdata['id']) && !empty($postdata['id']))
              {
               $this->Common_model->updatedata('users',$postdata,['id'=>$postdata['id']]);
              $this->session->set_flashdata('msg', '<div class="alert alert-success">Customers updated successfully.</div>');
              } 
              else
              { 
              $this->Common_model->insert('users',$postdata);
              $this->session->set_flashdata('msg', '<div class="alert alert-success">Customers added successfully.</div>');
               }

              redirect('welcome/userlist');
		  }
        }catch (Exception $e) {
         $this->session->set_flashdata('msg', '<div class="alert alert-warning">Some datas are missing please fill all the fields</div>');
         redirect($_SERVER['HTTP_REFERER']);
        }
   }


   function userlist()
   {
   	 $data['title'] = 'User List';
   	  $data['users'] = $this->Common_model->select('users'); 
   	  $this->load->view('userlist',$data);  
   }


   function getuserdetails()
   { 
      $users = $this->Common_model->select('users'); 
      echo json_encode($users);
   }


   function editusers($id=0)
   {
   	       $data['title'] = 'Update Users';
           $data['users'] = $this->Common_model->selectrow('users',['id'=>$id]); 
           $this->load->view('welcome_message',$data);
   }

   function deleteusers($id=0)
   {
            if(!empty($id))
            {
            	$this->Common_model->delete_data(['id'=>$id],'users');
            	 $this->session->set_flashdata('msg', '<div class="alert alert-success">Customers deleted successfully.</div>');
            	 redirect($_SERVER['HTTP_REFERER']);
            }
   }


}
