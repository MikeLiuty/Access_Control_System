<?php

error_reporting(E_ERROR);

class Welcome extends CI_Controller {
    
    public function __contructor() {
        
        parent::__contructor();
    }
    
    public function index() {

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('login_window');
        
    }
    
    function login_user() {
        $this->load->library('session');
        $_SESSION['username'] = $this->input->post('username');
        $username = htmlentities($_SESSION['username']);
        $password = $this->input->post('password');
        
        $this->load->model('Login_verify');
        if ($this->Login_verify->typecheck($username)) {
            if ($username && $password && $this->Login_verify->sersys($username, $password)) {
                $this->serinfo();
            } else {
                $this->index();
            }
        }
        
        else {
            if ($username && $password && $this->Login_verify->verify($username, $password)) {
                
                $userdata = array(
                    'username' => $username,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($userdata);
                $this->dr_save();
            }
            
            else {
                $this->index();
            }
        }
    }
    
    function dr_save() {
        $this->load->model('Detail');
        
        if ($this->Detail->manager_detail()) {
            $this->Detail->getDr();
        } else {
        }
        
        $this->mg_save();
    }
    
    function mg_save() {
        $this->load->model('Database');
        $this->Database->mg_save();
        
        $this->getmginfo();
    }
    
    function getmginfo() {
        
        $this->load->helper('url');
        $this->load->view('mginfo');
        
    }
    
    function serinfo() {
        $this->load->model('Detail');
        $this->Detail->serdetail();
        $this->load->model('Database');
        $this->Database->ser_save();
        $this->serdash();
    }
    
    function serdash() {
        $this->load->helper('url');
        $this->load->view('sernavpage');
        
    }
    
    function serinadash() {
        $this->load->helper('url');
        $this->load->view('serinadash');
    }
    
    function getserinfo() {
        $this->load->helper('url');
        $this->load->view('serinfo');
    }
    
    function mgprofile() {
        $this->load->helper('url');
        $this->load->view('mgprofile');
    }
    
    function smtcount() {
        $this->load->model('Database');
        $mg_cnsub = $this->input->post('user');
        echo $mg_cnsub;
        $this->Database->sub_save($mg_cnsub);
    }
}
?>