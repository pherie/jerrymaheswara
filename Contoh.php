<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contoh extends MY_Controller {
    /*****************************************************************************/
	public function __construct()
	{
		parent::__construct();
		$this->data['header'] = $this->parser->parse('contoh/header.html', $this->data, true);
		$this->data['footer'] = $this->parser->parse('contoh/footer.html', $this->data, true);
	}
    /*****************************************************************************/
    /*****************************************************************************/
	public function index()
	{
		if ($this->_is_admin) {
			$user_all = $this->db->get('user')->result();
			$this->data['user_all'] = $user_all;
		}
		$this->data['content'] = $this->parser->parse('contoh/content.html', $this->data, true);
		$this->parser->parse('contoh/index.html', $this->data, false);
		
	}
    /*****************************************************************************/
    function login()
    {
    	if ($this->input->post()) {
    		$param = $this->input->post();
    		$this->db->where('user_email', $param['user_email']);
    		$this->db->where('user_password', sha1($param['user_password']));
    		$cek = $this->db->get('user')->num_rows();
    		if ($cek) {
	    		$this->db->where('user_email', $param['user_email']);
	    		$this->db->where('user_password', sha1($param['user_password']));
	    		$user_info = $this->db->get('user')->result();
	    		$_SESSION['user_info'] = $user_info;
	    		redirect(base.'/contoh');
    		}
    	}else{
			$this->data['content'] = $this->parser->parse('contoh/login.html', $this->data, true);
			$this->parser->parse('contoh/index.html', $this->data, false);
    	}
    }
    /*****************************************************************************/
    function register()
    {
    	if ($this->input->post()) {
    		$param = $this->input->post();
    		$param['user_password'] = sha1($param['user_password']);
    		$this->db->insert('user', $param);
    		redirect(base.'/contoh');
    	}else{
			$this->data['content'] = $this->parser->parse('contoh/register.html', $this->data, true);
			$this->parser->parse('contoh/index.html', $this->data, false);
    	}
    }
    /*****************************************************************************/
    function logout()
    {
    	session_destroy();
    	redirect(base.'/contoh');
    }
    /*****************************************************************************/
    /*****************************************************************************/

}

/* End of file Contoh.php */
/* Location: ./application/controllers/Contoh.php */