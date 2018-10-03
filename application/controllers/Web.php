<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * <b>App Service </b>
 * Controlador que facilita la implementacion de metodos
 * comunes para los servicios solicitados por las aplicaciones externas
 * (IOS, Android), eliminando la
 * reescritura de codigo redundante en cada sistema y facilitando
 * el mantenimiento de este codigo comun.
 * @package      Application
 * @subpackage   controllers
 * @author       Andy Camargo <andy.camargo@domoti-sas.com>
 * @copyright    Por definir
 * @license      Por definir
 * @version      v-1 Version 26/05/2016
 * */
class Web extends CI_Controller {
  public function __construct(){
	parent::__construct();
    //$this->id = $this->session->userdata("users_id");
	}
  public function index(){
    $this->load->view('home/header');
    $this->load->view('home/center_home');
    $this->load->view('home/footer');
  }
}
