<?php

/**

 * 

 */

class M_home extends CI_Model

{	



	public function __construct(){

		parent::__construct();

		$this->load->database();

		$this->load->library('session');

	}



	function konfig(){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$config = $DB1->get("sys_config");

		return $config->result();

	}



	function category(){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$cat = $DB1->get('category');

		return $cat->result_array();

	}



	function add_user($v){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$insert = $DB1->insert('sys_user',$v);

		return $insert;

	}



	function edit_user($pass,$nama){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);
		$data = array(

			'password' => $pass
		);
		$this->db->where('nama', $nama);

		$update = $this->db->update("sys_user",$data);

		return $update;

	}



	function etik($v){



		$DB1 = $this->load->database('default', TRUE);

		$DB2 = $this->load->database('db2',TRUE);

		$upInsert = $DB2->insert('tb_etik',$v);

		return $upInsert;

	}

	function sop($v){



		$DB1 = $this->load->database('default', TRUE);

		$DB2 = $this->load->database('db2',TRUE);

		$upInsert = $DB1->insert('sop',$v);

		return $upInsert;

	}

	function trainee($v){



		$DB1 = $this->load->database('default', TRUE);

		$DB2 = $this->load->database('db2',TRUE);

		$upInsert = $DB2->insert('trainee',$v);

		return $upInsert;

	}

	function file_ceklist($v){



		$DB1 = $this->load->database('default', TRUE);

		$DB2 = $this->load->database('db2',TRUE);

		$upInsert = $DB2->insert('file_ceklist',$v);

		return $upInsert;

	}



	function runtime(){

		$DB1 = $this->load->database('default',TRUE);

		$getTime = $DB1->get('time_quiz');
		
		return $getTime->result_array();
	}

	function get_all_user(){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$getAll = $DB1->get("sys_user");

		return $getAll->result_array();

	}
	function getSetting(){

		$DB1 = $this->load->database('default',TRUE);

		$getSetting = $DB1->get("tb_setting");

		return $getSetting->result_array();
	}

	public function getSoal(){

		$DB1 = $this->load->database('default', TRUE);

		$DB1->where('aktif','Y');
		
		return  $DB1->get('tbl_soal');

	}

	public function RANDQuiz(){

		$DB1 = $this->load->database('default', TRUE);

		$DB1->order_by('RAND ()');

		$DB1->where('aktif','Y');

		$select = $DB1->get('tbl_soal');

		// $DB1->num_rows();

		return $select;

		// print_r($data);exit;
	}

	public function rumus(){

		$hitung = $this->db->get_where('tbl_soal', array('aktif'=>'Y') );

		return $hitung->num_rows();
	}

	public function check($nomor, $jawab){

		$checkjawab = $this->db->get_where('tbl_soal', array('id_soal' => $nomor, 'knc_jawaban'=> $jawab, 'aktif'=>'Y') );
		return $checkjawab->num_rows();
		
	}

	public function check1(){

		$session = $this->session->userdata('Id');

		$q2 = $this->db->query("SELECT id_user from tbl_nilai where id_user='".$this->session->userdata('Id')."' ");

		return $q2;

	}
	
	public function ref_nilai(){

		$nilai = $this->db->get_where('tbl_nilai', ['id_user'=> $this->session->userdata('Id')] );
		return $nilai;
	}

	public function search_auto($title){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$DB1->like('title',$title,'both');

		$DB1->where('category_id',6,'both');

		$DB1->order_by('content','ASC');

		$DB1->limit(10);

		return $DB1->get('tb_etik')->result_array();

	}

	public function search_sop($title){



		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$DB1->like('title',$title,'both');

		$DB1->where('category_id',3,'both');

		$DB1->order_by('content','ASC');

		$DB1->limit(10);

		return $DB1->get('sop')->result_array();

	}

	function search_etik($title){



		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$DB1->like('title',$title,'both');

		$DB1->where('category_id',2,'both');

		$DB1->order_by('content','ASC');

		$DB1->limit(10);

		return $DB1s->get('sop')->result_array();

	}

	function setting_ujian(){

		$q1 = $this->db->get('tb_setting');

		return $q1->result_array();

	}


}