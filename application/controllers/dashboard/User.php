<?php 

class User extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library(array('encrypt'));
		$this->load->model(array('m_home','m_login'));
	}

	function index(){
		$v['dashboard'] = $this->m_home->konfig();
		// $v['menu'] = $this->m_home->Menu()->result();
		$v['judul'] = 'User';
		$v['modul'] = 'dashboard/module/listUser';
		$v['list'] = $this->m_home->get_all_user();

		$this->load->view('dashboard/view_dashboard', $v);
	}
}