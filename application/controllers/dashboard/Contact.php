<?php 


class Contact extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_home','m_login'));
		$this->load->helper();
		if($this->session->userdata('login') != TRUE){
			$link = base_url();
			redirect($link);
		}
	}
	function index(){
		
		$v['dashboard'] = $this->m_home->konfig();
		$v['judul'] = 'Contact';
		$v['modul'] = 'dashboard/module/contact';
		$this->load->view('dashboard/view_dashboard',$v);

	}

}