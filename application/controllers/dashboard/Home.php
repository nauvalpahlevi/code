<?php 

/**

 * 

 */

class Home extends CI_Controller

{

	



	function __construct()

	{

		parent::__construct();

		$this->load->model(array('M_home','M_login'));

		$this->load->helper(array('url'));

		$this->load->library('encrypt');

		$this->load->library('form_validation','session');

		if($this->session->userdata('login') != TRUE){

			$link = base_url();

			redirect($link);

		}

	}

	function index(){

		

		$v['dashboard'] = $this->M_home->konfig();

		// $v['menu'] = $this->m_home->Menu()->result();

		$v['judul'] = 'Home';

		$v['modul'] = 'dashboard/module/home';

		$this->load->view('dashboard/view_dashboard', $v);

	}





	public function logout()

    {

    	$this->session->sess_destroy();

    	redirect('login','refresh');

    }

 	

 	public function setting(){



            $v['dashboard'] = $this->M_home->konfig();

            $v['judul'] = 'Setting';

            $v['modul'] = 'dashboard/module/setting';

            $this->form_validation->set_rules('Password','password', 'trim|required|min_length[5]|max_length[10]', array('required'=>'Password Wajib Diisi!','min_length'=>"Min.5 Characters Password", 'max_length'=>"Max.10 Characters Password"));



            if($this->form_validation->run()==false){

                  $this->load->view('dashboard/view_dashboard', $v);

            }else{

                  

                  $nama = $this->input->post('Nama');

                  $pass = sha1($this->input->post('Password'));

                  $this->M_home->edit_user(

                        $pass,

                        $nama

                  );

                  $data = $this->session->set_flashdata('notif',"<div class='alert alert-success'>Data Success Submitted!</div>");

                  redirect('login', $data);

                  

            }



 	}

   





 	public function add_user(){



 		$v['dashboard'] = $this->M_home->konfig();

		// $v['menu'] = $this->m_home->Menu()->result();

		$v['judul'] = 'Add User';

		$v['modul'] = 'dashboard/module/adduser';

		$this->form_validation->set_rules('username','Username','trim|required',array('required'=>'Username Wajib Diisi!'));

		$this->form_validation->set_rules('password','Password','trim|required|max_length[15]',array('required'=>'Password Wajib Diisi!','max_length'=>'Max.15 Characters'));

		$this->form_validation->set_rules('nama','Nama','trim|required',array('required'=>'Nama Wajib Diisi!'));

            

		



	 	if($this->form_validation->run()==false){

	 		$this->load->view('dashboard/view_dashboard', $v);

	 	}else{



	 	$config['upload_path']         = 'assets/photos/';  // folder upload 

            $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file

            $config['max_size']             = 300;



            $this->load->library('upload', $config);

                  if(!$this->upload->do_upload('photo')) {

                      $user = $this->input->post('username');

                        $pass = sha1($this->input->post('password'));

                        $nama = $this->input->post('nama');

                        $file = $this->upload->data();

                        $img = $file['file_name'];

                        $depart = $this->input->post('depart');

                        $level = $this->input->post('lvl');

                              $this->m_home->add_user(array(

                                          'username' => $user,

                                          'password' => $pass,

                                          'nama'=> $nama,

                                          'photos'=>$img,

                                          'department' => $depart,

                                          'level' => $level

                              ));

                        $data = $this->session->set_flashdata('lonceng',"<div class='alert alert-success'>Data Success Submitted!</div>");

                        redirect('dashboard/home/add_user', $data);

                  }else{

                  	

                  	$user = $this->input->post('username');

                  	$pass = sha1($this->input->post('password'));

                  	$nama = $this->input->post('nama');

                  	$file = $this->upload->data();

                  	$img = $file['file_name'];

                  	$depart = $this->input->post('depart');

                  	$level = $this->input->post('lvl');

                  		$this->m_home->add_user(array(

                  				'username' => $user,

                  				'password' => $pass,

                  				'nama'=> $nama,

                  				'photos'=>$img,

                  				'department' => $depart,

                  				'level' => $level

                  		));

                  	$data = $this->session->set_flashdata('lonceng',"<div class='alert alert-success'>Data Success Submitted!</div>");

                  	redirect('dashboard/home/add_user', $data);

                  }

	 	}

 	}

	





 	



}