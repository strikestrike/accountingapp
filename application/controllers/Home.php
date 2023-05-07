<?php
	date_default_timezone_set('Asia/Kolkata');
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller {
		public function __construct(){
			parent::__construct();
		}

		// public function index() {
		// 	$this->load->view('home/header');
		// 	$this->load->view('home/login'); 
		// 	$this->load->view('home/footer');
		// }  

		public function login() {  
			if($this->input->post()){

			//echo "hhelo "; die(); 

			$this->form_validation->set_rules("name","Name","required");
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('com_password', 'Confirm Password', 'required|matches[password]');
					
				//echo "Hello Bro "; die();
						if ($this->form_validation->run() === FALSE)
						{    
							//echo "hemant "; die();
							$this->load->view('home/header');
							$this->load->view('home/login'); 
							$this->load->view('home/footer');
									}


						else{
						$data = $_POST; 


						$this->load->database();
					//echo "<pre>"; print_r($data);die();
						$data= array(
														'name'=> $this->input->post('name'), 
														'password'=> $this->input->post('password'),
														'com_password'=> $this->input->post('com_password'),
									
						); 
															//echo "<pre>"; print_r($data);die();
							if($this->db->insert('login_user', $data))
							{
							//$this->session->set_flashdata('message',generateAdminAlert());  
							redirect(base_url().'Home/admin_client','refresh');
						}
				

						else{ 
									
								redirect(base_url().'home/login','refresh');
						}
				}
			} else {
				//echo "not save "; die();
				$this->load->view('home/header');
				$this->load->view('home/login'); 
				$this->load->view('home/footer');
			}
		}



						 public function dashboard(){   
										$this->load->view('dashboard');
								}
						 
								public function logout() {
										$this->session->unset_userdata('user_id');
										redirect(base_url('home/login'));
													 $this->load->view('home/header');
													 $this->load->view('home/login'); 
													 $this->load->view('home/footer');
								}






								

									public function admin_client() {

										 $this->db->order_by('id', 'desc');

									//  

											 if($this->input->post())
											 {
												 //echo "<pre>";print_r($this->input->post());die;

														$data['name_surname']=$this->input->post("name_surname");
														$data['per_number']=$this->input->post("per_number");
														$this->form_validation->set_rules("name_surname","Name ","required");
														$this->form_validation->set_rules('per_number', 'CNP ', 'required');
														 
											
									 // echo "Hello Bro "; die();
											 if ($this->form_validation->run() === FALSE)
												{  
											 
						 

												 $cond=array();  
											 
												 $data['personal_data_list']= array_reverse($this->db->get_where('personal_data', $cond)->result_array());
												 $this->load->view('home/header1');
													$this->load->view('home/admin_client',$data); 
												 $this->load->view('home/footer1');


														}


														else{
														$data['name_surname']=$this->input->post("name_surname");
														$data['per_number']=$this->input->post("per_number");
														 $cond=array("name_surname"=>$this->input->post("name_surname"),"per_number"=>$this->input->post("per_number"));
																	 $data['personal_data_list']= array_reverse($this->db->get_where('personal_data', $cond)->result_array());
													$this->load->view('home/header1');
													$this->load->view('home/admin_client',$data); 
															$this->load->view('home/footer1');
															}
													 }else{
														$data['name_surname']='';
														$data['per_number']='';

																 $cond=array();
														$data['personal_data_list']= array_reverse($this->db->get_where('personal_data', $cond)->result_array());
													$this->load->view('home/header1');
													$this->load->view('home/admin_client',$data); 
													$this->load->view('home/footer1');

													 }
													}

 

			 


				public function admin_ong() {

						 $this->db->order_by('id', 'desc');

						 
							 if($this->input->post())
							 {
								 //echo "<pre>";print_r($this->input->post());die;

									 $data['name_surname']=$this->input->post("name_surname");
									 $data['registration_no']=$this->input->post("registration_no");
									$this->form_validation->set_rules("name_surname","Name ","required");
										$this->form_validation->set_rules('registration_no', 'Registration No', 'required');
										 
							
					// echo "Hello Bro "; die();
							 if ($this->form_validation->run() === FALSE)
								{  
							 
						 

						 $cond=array();  
					 
						 $data['crypto_income1_list']= array_reverse($this->db->get_where('crypto_income1', $cond)->result_array());
						 $this->load->view('home/header1');
						 $this->load->view('home/admin_ong',$data); 
						 $this->load->view('home/footer1');


							}


								else{
								$data['name_surname']=$this->input->post("name_surname");
								$data['registration_no']=$this->input->post("registration_no");
							 $cond=array("name_surname"=>$this->input->post("name_surname"),"registration_no"=>$this->input->post("registration_no"));
							 $data['crypto_income1_list']= array_reverse($this->db->get_where('crypto_income1', $cond)->result_array());
							 $this->load->view('home/header1');
							 $this->load->view('home/admin_ong',$data); 
							 $this->load->view('home/footer1');
									}
							 }else{
								$data['name_surname']='';
								$data['registration_no']='';

										 $cond=array();
						 $data['crypto_income1_list']= array_reverse($this->db->get_where('crypto_income1', array())->result_array());

						 $this->load->view('home/header1');
						 $this->load->view('home/admin_ong',$data);
						 $this->load->view('home/footer1');
				}
				}






				public function admin_pricing() {     
					 
						if($this->input->post()){ 

						$this->form_validation->set_rules("nr_modules","Nr Modules","required");
						$this->form_validation->set_rules("price","Price","required");
						$this->form_validation->set_rules("sku","SKU","required");
							
							$data['rental'] = 'rental';
							$data['dividents'] = 'dividents';
							$data['stock'] = 'stock';
					 // echo "<pre>";print_r($_POST);
						if ($this->form_validation->run() === FALSE)
								{      
						//echo "validation nhi lg rhi hai  "; die();
						$this->db->order_by('id', 'desc'); 
						$data['rental']= array_reverse($this->db->get_where('income_type' ,array('type'=>'rental'))->result_array()); 
						$this->db->order_by('id', 'desc');
						$data['dividents']= array_reverse($this->db->get_where('income_type' ,array('type'=>'dividents'))->result_array()); 
						$this->db->order_by('id', 'desc');
						$data['stock']= array_reverse($this->db->get_where('income_type' ,array('type'=>'stock'))->result_array()); 
					
								 $this->load->view('home/header1'); 
								 $this->load->view('home/admin_pricing',$data); 
								 $this->load->view('home/footer1');
							}


						else{

							 //   echo "go to the post "; die();
							 $data = $_POST; 
																$data= array(
																'type'=>$this->input->post('type'),
																'nr_modules'=> $this->input->post('nr_modules'),    
																'price'=> $this->input->post('price'),
																'sku'=> $this->input->post('sku'),
																

							 ); 
																 //echo "<pre>"; print_r($data);die();
								 if($this->db->insert('income_type',$data))
								 {
									//$this->session->set_flashdata('message',generateAdminAlert());  
								 redirect(base_url().'home/admin_pricing','refresh');
							 }
					 

							 else{ 
										 
									 redirect(base_url().'home/admin_pricing','refresh');
									 } 
								}
								}else{  //echo "not save "; die();
								 $this->db->order_by('id', 'desc'); 
						$data['rental']= array_reverse($this->db->get_where('income_type' ,array('type'=>'rental'))->result_array()); 
						$this->db->order_by('id', 'desc');
						$data['dividents']= array_reverse($this->db->get_where('income_type' ,array('type'=>'dividents'))->result_array()); 
						$this->db->order_by('id', 'desc');
						$data['stock']= array_reverse($this->db->get_where('income_type' ,array('type'=>'stock'))->result_array()); 
					
								 $this->load->view('home/header1'); 
								 $this->load->view('home/admin_pricing',$data); 
								 $this->load->view('home/footer1');
								 }
								 }


						

		 public function getIncomeTypeData()
		{
				$id = $this->input->post('id');
				$data = array_reverse($this->db->get_where('income_type' ,array('id'=>$id))->result_array());
				
			 echo json_encode($data);

		}
 
 
		
						

		 public function getData()
		{
				$id = $this->input->post('id');
				$data = array_reverse($this->db->get_where('system_configration' ,array('id'=>$id))->result_array());
				
			 echo json_encode($data);

		}
 
	 
		 
								public function rental_update()
								 {
									 
												 $data = $_POST;
												 $this->load->database();
														 

												 $data = array(
																						 'type' => $this->input->post('type'),
																						 'id'=>$this->input->post('editrentalid'),
																							'nr_modules' => $this->input->post('nr_modules'),
																							'price' => $this->input->post('price'),
																							'sku' => $this->input->post('sku'),
																								 );

																								// echo print_r($data); die;
														 $condition = array('id'=>base64_decode($this->input->post('editrentalid')));
														$update_user = $this->Admin_Model->updateData('income_type',$condition,$data);
														redirect(base_url().'home/admin_pricing');
												 
								 }



				public function system_configration() {  
							 //echo "Hello"; die(); 
						if($this->input->post()){ 
						 // echo "Hello"; die(); 
		
						$this->form_validation->set_rules("value","Value","required");
						$this->form_validation->set_rules("year","Year","required");
							
							$data['annual_exchange_rate'] = 'annual_exchange_rate';
							$data['minimum_wage'] = 'minimum_wage';
							$data['BNR_xchange_rate'] = 'BNR_xchange_rate';


						// echo "hey"; die();
						if ($this->form_validation->run() == FALSE)
								{   
								 
					 $data['annual_exchange_rate']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'annual_exchange_rate'))->result_array()); 

										 // echo "<pre>";print_r($data['annual_exchange_rate']);die;
						$this->db->order_by('id', 'desc');
						$data['minimum_wage']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'minimum_wage'))->result_array()); 


						$this->db->order_by('id', 'desc');
						$data['BNR_xchange_rate']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'BNR_xchange_rate'))->result_array()); 

									
						//echo "hemant "; die();
						 $this->load->view('home/header1');   
						 $this->load->view('home/system_configration');  
						 $this->load->view('home/footer1');
							}
						else{
							 $data = $_POST; 
		
							//echo "<pre>"; print_r($data);die();
																$data= array(
																'type'=>$this->input->post('type'),
																'value'=> $this->input->post('value'),    
																'year'=> $this->input->post('year'),
															 
							 ); 
																 //echo "<pre>"; print_r($data);die();
								 if($this->db->insert('system_configration', $data))
								 {
									//$this->session->set_flashdata('message',generateAdminAlert());  
								 redirect(base_url().'home/system_configration','refresh');
							 }
					 

							 else{ 
										 
									 redirect(base_url().'home/system_configration','refresh');
									 } 
								}
								}else{  //echo "not save "; die();

										 
											$this->db->order_by('id', 'desc');


						$data['annual_exchange_rate']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'annual_exchange_rate'))->result_array()); 

										 // echo "<pre>";print_r($data['annual_exchange_rate']);die;
						$this->db->order_by('id', 'desc');
						$data['minimum_wage']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'minimum_wage'))->result_array()); 


						$this->db->order_by('id', 'desc');
						$data['BNR_xchange_rate']= array_reverse($this->db->get_where('system_configration' ,array('type'=>'BNR_xchange_rate'))->result_array()); 

								 $this->load->view('home/header1'); 
								$this->load->view('home/system_configration',$data); 
								 $this->load->view('home/footer1');
								 }
								 }

								 





								 
											
				public function admin_client_delete($id) { 
				$delete = $this->Admin_Model->delete($id);
				if ($delete) {
				 
						 redirect(base_url().'home/admin_client','refresh');
					 }        
					 } 


				public function admin_ong_delete($id) { 
				$delete = $this->Admin_Model->delete1($id);
				if ($delete) {
				 
					 redirect(base_url().'home/admin_ong','refresh');
					 }        
					 } 



					 public function getStudentsWhereLike($field, $search)
								{
										$query = $this->db->like($name_surname, $per_nomber)->orderBy('id')->get('personal_data');
										return $query->result();
								}
	}    
