<?php 
/**
 * 
 */
class Kuisioner extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		if($this->session->userdata('login') != TRUE){

			$link = base_url();

			redirect($link);

		}
	}	

	public function index(){

		$v['dashboard'] = $this->m_home->konfig();

		$v['category'] = $this->m_home->category();

		$v['agreement'] = $this->m_home->getSetting();

		$v['judul'] = "Kuisioner Employee";

		$v['modul'] = 'dashboard/module/kuisioner';

		$refNilai = $this->m_home->ref_nilai();

		if($refNilai->num_rows() > 0 ){
			$data['dashboard'] = $this->m_home->konfig();

			$data['category'] = $this->m_home->category();

			$data['judul'] = "Score Quiz";

			$data['ref_nilai'] = $this->m_home->ref_nilai()->result_array();

			$data['modul'] = 'dashboard/module/result_test';

			$this->load->view('dashboard/view_dashboard',$data);
		}else{
			$this->load->view('dashboard/view_dashboard',$v);
		}

		
	}

	public function quiz(){

		$v['dashboard'] = $this->m_home->konfig();

		$v['category'] = $this->m_home->category();

		$v['timer'] = $this->m_home->runtime();
		
		$v['soal'] = $this->m_home->RANDQuiz();

		$v['hitung'] = $this->m_home->RANDQuiz();

		$v['judul'] = "Quiz Started";

		$v['modul'] = 'dashboard/module/quiz';
        
		$this->load->view('dashboard/view_dashboard',$v);
	}

	public function submit(){

		if(isset($_POST['finishQuestion'])){

			$pilih = $this->input->post('pilihan');

			$id = $_POST['id'];

			$jumlah =  $this->m_home->RANDQuiz();
		
			$sum = $jumlah->num_rows();
			$benar = 0 ;
			$salah = 0 ;
			$score = 0 ;
			$kosong = 0;
			

			for ($i=0;$i<$sum;$i++){
				// $a = $id[$i];
					if(empty($pilih[$i])){
						$kosong++;
					}else{

						$nomor = $id;
						$jawab = $pilih[$i];
						// print_r($jawab);exit;

						$check = $this->m_home->check($nomor, $jawab); //misteri
						// echo $check;exit;
							if($check){
								$benar++;
							}else{
								$salah++;
							}

					}

				// RUMUS 
				$result = $this->m_home->rumus();
				
				// print_r($result);exit;
				$score = 100/$result*$benar;
				$nilai = floor($score);
				
			}
		}
		// CHECKING DATABASE
		$check2 = $this->m_home->check1();

		if($check2->num_rows() < 1){
			
			$data = $this->m_home->getSetting();
			foreach($data as $nilaimin){

				$nilai_min = $nilaimin['nilai_min'];

				if($nilai >= $nilai_min){
				$iduser= ucwords($this->session->userdata('Id'));
				$param = array(
					'id_user' => $iduser,
					'benar' => $benar,
					'salah' => $salah,
					'kosong' => $kosong,
					'score' => $score,
					'tanggal' => date('Y-m-d H:i'),
					'keterangan' => "Lulus"
				);
			$a = $this->db->insert('tbl_nilai',$param);

			}else{

					$iduser = ucwords($this->session->userdata('Id'));

						$param = array(
							'id_user' => $iduser,
							'benar' => $benar,
							'salah' => $salah,
							'kosong' => $kosong,
							'score' => $score,
							'tanggal' => date('Y-m-d H:i'),
							'keterangan' => "Tidak Lulus"
						);
					$a = $this->db->insert('tbl_nilai',$param);	
				}

			}
			
			
		}
		// cetak hasil test
			$data['dashboard'] = $this->m_home->konfig();

			$data['category'] = $this->m_home->category();

			$data['judul'] = "Score Quiz";

			$data['ref_nilai'] = $this->m_home->ref_nilai()->result_array();

			$data['modul'] = 'dashboard/module/result_test';

			redirect('dashboard/kuisioner/',$data);
	}

}

	
		