<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$data['container'] = 'home'; 
    $this->load->view('container', $data); 
	}

	public function generate(){

		echo 'backup generated';

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */