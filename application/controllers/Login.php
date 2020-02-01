<?php 



class Login extends CI_Controller {



	public function __construct(){



		parent::__construct();		

		$this->load->model(array('m_home','m_login'));

                $this->load->library(array('encrypt','session'));

                if($this->session->userdata('login') == TRUE){

                        redirect(base_url('dashboard/home'));

                }else{
                       base_url();
                }

	}



	public function index(){



		$v['config'] = $this->m_login->konfig()->result();

		$this->load->view('login',$v);

	}



	public function checked_login(){

	$user=htmlspecialchars($this->input->post('user',TRUE),ENT_QUOTES);

        $pass=htmlspecialchars($this->input->post('pass',TRUE),ENT_QUOTES);

        



        $cek_model = $this->m_login->auth_user($user,$pass);
        	if($cek_model->num_rows() > 0){
        		$vdata = $cek_model->row_array();
        		$this->session->set_userdata('login',TRUE);
        			if($vdata['level']== 1){

                                        $this->session->set_userdata('login',TRUE);

                                        $this->session->set_userdata('access', 1);

                                        $this->session->set_userdata('Id', $vdata['id']);

        				$this->session->set_userdata('Department', $vdata['department']);

        				$this->session->set_userdata('Username', $vdata['username']);

        				$this->session->set_userdata('Password', $vdata['password']);

        				$this->session->set_userdata('Name', $vdata['nama']);

                                        $this->session->set_userdata('Foto', $vdata['photos']);

        				redirect('dashboard/home');

        			}else if($vdata['level']== 2){

                                        $this->session->set_userdata('login',TRUE);

                                        $this->session->set_userdata('Id', $vdata['id']);

                                        $this->session->set_userdata('access', 2);

                                        $this->session->set_userdata('Department', $vdata['department']);

                                        $this->session->set_userdata('Username', $vdata['username']);

                                        $this->session->set_userdata('Password', $vdata['password']);

                                        $this->session->set_userdata('Name', $vdata['nama']);

                                        $this->session->set_userdata('Foto', $vdata['photos']);

                                        redirect('dashboard/home');

                                }else{

                                        $this->session->set_userdata('login',TRUE);

                                        $this->session->set_userdata('access', 3);

                                        $this->session->set_userdata('Id', $vdata['id']);

                                        $this->session->set_userdata('Department', $vdata['department']);

                                        $this->session->set_userdata('Username', $vdata['username']);

                                        $this->session->set_userdata('Password', $vdata['password']);

                                        $this->session->set_userdata('Name', $vdata['nama']);

                                        $this->session->set_userdata('Foto', $vdata['photos']);
                                        
                                        $session = $this->session->set_userdata('Started');

                                        redirect('dashboard/home');

                                }

        	}else{

        				if($user =='' || $pass==''){

        					$data = $this->session->set_flashdata('error','<div style="color:red;text-align:center;font-weight:bold">Username atau Password Wajib Diisi!</div>');

        				redirect('login',$data);

	        			}else{

	        				$data = $this->session->set_flashdata('error','<div style="color:red;text-align:center;font-weight:bold">Username atau Password Salah!</div>');

	        				redirect('login',$data);

	        			}

        		}

	}

}