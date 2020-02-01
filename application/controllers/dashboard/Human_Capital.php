<?php 

class Human_capital extends CI_Controller{

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
	function CoC(){

		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = "Human Capital";
		$v['modul'] = 'dashboard/module/codeOfConduct';
		$title = $this->input->get('title');
        $v['data']= $this->m_home->search_auto($title);
		$this->load->view('dashboard/view_dashboard',$v);	
	}
	function get_auto(){
			if (isset($_GET['term'])) {
            $result = $this->m_home->search_auto($_GET['term']);
	            if (count($result) > 0) {
	              foreach ($result as $row)
	                $arr_result[] = array(
	                    'label' => $row->content,
	                );
	                echo json_encode($arr_result);
		        }
	        }
	}
}