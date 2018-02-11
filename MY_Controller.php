<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /*****************************************************************************/
    public function __construct()
    {
        parent::__construct();
 
        define('base', rtrim(base_url(), '/'));
        $this->data['base']       = base;
        $this->data['tahun']      = date('Y'); 
        $this->data['CI_VERSION'] = CI_VERSION;
        $this->data['site_title'] = 'Contoh';

        if (isset($_SESSION['user_info'])) { 
            $this->data['user_info'] = $_SESSION['user_info'];
            $this->data['is_login']  = 'is_login';
            $this->data['is_logout'] = 'hidden';
            $this->data['is_admin']  = $_SESSION['user_info'][0]->user_level == 2 ? 'is_admin' : 'hidden';
            $this->_is_admin         = $_SESSION['user_info'][0]->user_level == 2 ? true : false;
            $this->_is_login         = true;
        } else {
            $this->data['user_info'] = array();
            $this->data['is_login']  = 'hidden';
            $this->data['is_admin']  = 'hidden';
            $this->data['is_logout'] = 'is_logout';
            $this->_is_admin         = false;
            $this->_is_login         = false;
        }
    }
    /*****************************************************************************/ 
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
