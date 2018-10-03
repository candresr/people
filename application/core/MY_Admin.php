<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->database();
	}

  public function index(){
    return $this->verify();
  }

  function verify(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $query = $this->admin_model->verify($email, sha1($password));
    $verify = $query->row_array();
    if($query->num_rows() > 0){
      $session_id = $this->session->userdata('session_id');
      $row = $this->verify_register($verify['users_id'],$verify['user_type']);
      $newdata = array(
          'email'  	=> $email,
          'user_type' 	=> $verify['user_type'],
          'users_id'		=> $verify['users_id'],
          'logged_in' 	=> TRUE,
          'registered'  => $row['num'],
          'table' => $row['table']
          );
      $this->session->set_userdata($newdata);

      $data['email'] = $row['email'];
      $data["mensaje"] = "Seleccione cualquiera de las opciones del men&uacute; principal";
      $data["menu"]= $this->itemMenu();
      $this->load->view("web", $data);

    }else{

      $data["warning"]= "Username y/o Password introducida no es correcta.";
      $this->load->view("web", $data);
    }
  }
  public function verify_register($id,$type){
    $row = array();
    switch ($type) {
      case 1:
        $row['num'] = $this->admin_model->get_verify_register('client',$id);
        $row['table'] = 'client';
        $value = $this->web_model->get_id('users',$id,'');
        $row['email'] = $value->email;
        break;
      case 2:
        $row['num'] = $this->admin_model->get_verify_register('client',$id);
        $row['table'] = 'client';
        $value = $this->web_model->get_id('users',$id,'');
        $row['email'] = $value->email;
        break;
      case 3:
        $row['num'] = $this->admin_model->get_verify_register('professional',$id);
        $row['table'] = 'professional';
        $value = $this->web_model->get_id('users',$id,'');
        $row['email'] = $value->email;
        break;
    }
    return $row;
  }

  public function itemMenu(){
    $user_type = $this->session->userdata('user_type');
		$query = $this->admin_model->menu($user_type);
		$out = "";
		$attr = array('class' => 'item_menu');
		foreach($query->result() as $file){
			$out .= anchor($file->link, $file->tittle).nbs(2);
		}
		$out .= anchor('admin/logout', 'Cerrar Sesi&oacute;n',$attr);
		$out .= "";
		return $out;
  }
  function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$data["advertencia"]= "";
		$this->load->view("web", $data);
	}

}
