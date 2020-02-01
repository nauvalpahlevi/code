<?php 

class Category extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('m_home','m_login'));
		$this->load->helper();
		$this->load->library('encrypt');
		if($this->session->userdata('login') != TRUE){
			$link = base_url();
			redirect($link);
		}
	}

	function index(){
		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = 'Category';
		$v['subjudul']='';
		$v['modul'] = 'dashboard/module/category';
		$this->load->view('dashboard/view_dashboard',$v);
	}

	function warehouse(){
		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = "Warehouse";
		$v['modul'] = 'dashboard/module/warehouse';
		$this->load->view('dashboard/view_dashboard',$v);
	}
	function human_capital(){
		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = "Human Capital";
		$v['modul'] = 'dashboard/module/hc';
		$this->load->view('dashboard/view_dashboard',$v);	
	}

	function qhse(){
		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = "Quality Health Safety Environtment";
		$v['modul'] = 'dashboard/module/QHSE';
		$this->load->view('dashboard/view_dashboard',$v);
	}

}