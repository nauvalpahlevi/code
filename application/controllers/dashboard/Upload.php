<?php 

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('m_home','m_login'));
		$this->load->helper();
		$this->load->library(array('encrypt','form_validation'));
		if($this->session->userdata('login') != TRUE){
			$link = base_url();
			redirect($link);
		}
	}

	function index(){
		$v['dashboard'] = $this->m_home->konfig();
		$v['category'] = $this->m_home->category();
		$v['judul'] = 'Upload Document';
		$v['modul'] = 'dashboard/module/upload-training';
		$this->form_validation->set_rules('title','Title','trim|required',array('required'=>'Title Wajib Diisi!'));
		if($this->form_validation->run()==FALSE){
			$this->load->view('dashboard/view_dashboard',$v);
		}else{

				
				$konfig["upload_path"] = array($sop,$etika,$trainee);
				$konfig['allowed_types'] = 'pdf';
				$konfig['max_size'] = 2000;
				$this->load->library('upload', $konfig);
			
					if(!$this->upload->do_upload('lampiran')){
						$data = $this->session->set_flashdata('notification',"<div class='alert alert-danger'>Please Check Type & Size File!</div>");
						redirect('dashboard/upload',$data);
					}else{

						$Title = $this->input->post('title');
						$Content = $this->input->post('content');
						$Attch = $this->upload->data();
						$Lampiran = $Attch['file_name'];
						$Depart = $this->input->post('depart');
						$Tgl = date('Y-m-d H:i');
						$User = $this->session->userdata('Username');
						$typedoc = $this->input->post('typeupload');
						if($typedoc == 'Sop'){

							$this->m_home->sop(array(
								'category_id' => $Depart,
								'title' => $Title,
								'content' => $Content,
								'lampiran' => $Lampiran,
								'create_date' => $Tgl,
								'created_by' => $User
							));
						$konfig['upload_path'][0];
						}else if($typedoc == 'Conduct'){

							$this->m_home->etik(array(
								'category_id' => $Depart,
								'title' => $Title,
								'content' => $Content,
								'lampiran' => $Lampiran,
								'create_date' => $Tgl,
								'created_by' => $User
							));
							// $konfig['upload_path'] = "assets/etika";a

						}else if($typedoc == 'trainee'){

							$this->m_home->trainee(array(
								'category_id' => $Depart,
								'title' => $Title,
								'content' => $Content,
								'lampiran' => $Lampiran,
								'create_date' => $Tgl,
								'created_by' => $User
							));
							$konfig['upload_path'] = "assets/trainee";
						}else{

							$this->m_home->file_ceklist(array(
								'category_id' => $Depart,
								'title' => $Title,
								'content' => $Content,
								'lampiran' => $Lampiran,
								'create_date' => $Tgl,
								'created_by' => $User
							));
							// $konfig['upload_path'] = "assets/file-ceklist";
						}
							
							$data = $this->session->set_flashdata('notification',"<div class='alert alert-success'>Data Success Submitted!</div>");
							redirect('dashboard/upload',$data);
						}
		}

					}
		}
