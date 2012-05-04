<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$data['container'] = 'home'; 
    $this->load->view('container', $data); 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */