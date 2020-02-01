	<?php

/**

 * 

 */

class m_login extends CI_Model

{

	public function __construct(){

		parent::__construct();

		$this->load->library(array('encrypt'));

		$this->load->database();

		

	}



	function konfig(){

		$DB1 = $this->load->database('default', TRUE);

		// $DB2 = $this->load->database('db2',TRUE);

		$config = $DB1->get('sys_config');

		return $config;

	}

	function auth_user($user,$pass){

		$query = $this->db->get_where("sys_user", ['username'=>$user, 'password'=>sha1($pass)]);

		return $query;


	}

	

	

}