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
 * @author       Cesar Ramirez <candresramirez@gmail.com>
 * @copyright    Por definir
 * @license      Por definir
 * @version      v-1 Version 26/05/2016
 * */
class App extends CI_Controller {

  public function __construct(){
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, application/x-www-form-urlencoded");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->database();
	}
  public function postData(){

    $handle = fopen("php://input", "rb");
    $raw_post_data = '';
    while (!feof($handle)) {
        $raw_post_data .= fread($handle, 8192);
    }
    fclose($handle);
    $request_data = json_decode($raw_post_data, true);
    foreach ($request_data as $key => $value) {
      ($key == 'conditional')?  $conditional = $value : '';
      ($key == 'operation')?  $opert = $value : '';
      ($key == 'table')?  $table = $value : '';
      ($key == 'columns')?  $dataColumn = explode(',',$value) : '';
      ($key == 'values')?  $dataValues = explode(',',$value) : '';
    };
    switch ($opert) {
      case 0:
        $this->insertData($table,$dataColumn,$dataValues);
        break;
      case 1:
        $this->updateData($conditional,$table,$dataColumn,$dataValues);
        break;
      case 2:
        $this->deleteData($conditional,$table);
        break;
      case 3:
        $this->selectData($conditional,$dataColumn,$table);
        break;
      case 4:
        $this->login($dataColumn,$dataValues);
        break;
      case 5:
        $this->activeUsers($conditional,$table);
        break;
      case 6:
        $this->alterUser($conditional);
        break;
      case 7:
        $this->service($conditional);
        break;
      case 8:
        $this->selectProfessional($conditional);
        break;
    }
  }

  public function insertData($table,$dataColumn,$dataValues){
    $dataFormat = array_combine($dataColumn,$dataValues);
    switch ($table) {
      case 'users':
        $email = $dataFormat['email'];
        $result = $this->emailRegister($email);
        ($result == true)? $this->app_model->insertData($table,$dataFormat) :  'Send Email Failure';
        break;
      default:
        $this->app_model->insertData($table,$dataFormat);
        break;
    }

  }

  public function updateData($conditional,$table,$dataColumn,$dataValues){
    $dataFormat = array_combine($dataColumn,$dataValues);
    $this->app_model->updateData($conditional,$table,$dataFormat);
  }

  public function deleteData($conditional,$table){
    $this->app_model->deleteData($conditional,$table);
  }

  public function selectData($conditional,$dataColumn,$table){
    $this->app_model->selectData($conditional,$dataColumn,$table);
  }

  public function login($dataColumn,$dataValues){
    $dataFormat = array_combine($dataColumn,$dataValues);
    $email = $dataFormat['email'];
    $password = sha1($dataFormat['password']);
    $query = $this->app_model->verify($email, $password);
    $verify = $query->row_array();
    if($query->num_rows() > 0){
      $data = array();
      $query = $this->app_model->_schema('users');
      foreach ($query->result() as $value) {
        $data[$value->column_name] = $verify[$value->column_name];
      }
      echo json_encode($data);
    }else{
      $data = array('msn' => 'usuario sin autorizacion');
      echo json_encode($data);
    }
  }

  public function do_upload(){
    $id = $this->input->post('id');
    $path = './uploads/';
    $pathUser = $path.$id;
    if (!file_exists($pathUser)) {
      mkdir($pathUser, 0777, true);
    }
    $temp = explode(".", $_FILES["userfile"]["name"]);
  	$newfilename = round(microtime(true)) . '.' . end($temp);
    $config['upload_path'] = $pathUser;
    $config['allowed_types'] = 'png|jpg|jpeg|pdf';
    $config['remove_spaces']= TRUE;
    $config['max_size']    = '10240';
    $config['file_name']   = $newfilename;

    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('userfile')){
      $data = array('failure' => $this->upload->display_errors());
      echo json_encode($data);
      return false;
    }else{
      $data = array('success' => true, 'file_name' => $newfilename);
      echo json_encode($data);
      return true;
    }
  }

  public function recoverPassword(){
    $email = $this->input->post('username');
    $query = $this->app_model->verifyEmail($email);
    if($query->num_rows() > 0){
      $verify = $query->row();
      $pass = $this->generatePass();
      $data['password'] = sha1($pass);
      $conditional = 'users_id = '.$verify->users_id;
      $update = $this->app_model->updateData($conditional,'users',$data);
      if($update == true){
        $body = "<h2>Recuperar Contraseña al sistema PEOLE</h2><hr><br>
                 Para procesar su trámite ingrese con la siguiente contraseña:<br>
                 Usuario: $email<br>
                 Clave: $pass<br>
                 Por su seguridad se recomienda cambiar su contraseña para uso del sistema.";
        $from = 'Administracion PEOPLE';
        $subject = 'Recuperacion de Contraseña PEOPLE';

        $this->sendEmail($verify->email,$from,$subject,$body);
      }else{
        echo json_encode(array('failure' => true));
      }
    }else{
      echo json_encode(array('failure' => true));
    }
  }

  public function emailRegister($email){
    //$body = $this->load->view('email',$value,true);
    $body = "<h2>Registro al sistema PEOPLE</h2><hr><br> Bienvenid@!<br>
             Usted ha sido registrado exitosamente en nuestro Sistema.
             Con el siguiente usuario:<br>
             $email<br>
             Recibira un correo con la confirmacion de la activacion de la cuenta.";
    $from = 'Administracion PEOPLE';
    $subject = 'Bienvenido/a a Sistema PEOPLE';
    $result = $this->sendEmail($email,$from,$subject,$body);
    return $result;
  }

  public function emailActive($email,$pass){
    $body = "<h2>Activacion al sistema PEOPLE</h2><hr><br>
             Usted ha sido Activado exitosamente en nuestro Sistema.
             Para procesar su trámite ingrese con la siguiente contraseña:<br>
             Usuario: $email<br>
             Clave: $pass<br>
             Por su seguridad se recomienda cambiar su contraseña para uso del sistema.";
    $from = 'Administracion PEOPLE';
    $subject = 'Bienvenido/a a Sistema PEOPLE';
    $result = $this->sendEmail($email,$from,$subject,$body);
    return $result;
  }


  public function sendEmail($email,$from,$subject,$body,$response = '',$id = ''){
    $config = array(
     'protocol' => 'smtp',
     'smtp_host' => 'ssl://smtp.gmail.com',
     'smtp_port' => 465,
     'smtp_user' => 'no-reply@domoti-sas.com',
     'smtp_pass' => 'E<mYm5<n',
     'mailtype' => 'html',
     'charset' => 'utf-8',
     'newline' => "\r\n"
     );
     $this->email->initialize($config);

     $this->email->from($from);
     $this->email->to($email);
     $this->email->subject($subject);
     $this->email->message($body);

     if($this->email->send()){
       return true;
     }else{
       return false;
     }
  }

  function generatePass(){

    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
    $pass = "";
    $longitudPass=8;

    for($i=1 ; $i<=$longitudPass ; $i++){
        $pos=rand(0,$longitudCadena-1);
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
  }

  public function activeUsers($conditional,$table){
    $pass = $this->generatePass();
    $password = sha1($pass);
    $select = $this->app_model->selectUsers($conditional);
    $email = $select->row()->email;
    $data = array('active' => 1, 'password' => $password);
    $result = $this->emailActive($email,$pass);
    ($result == true)? $this->app_model->updateData($conditional,$table,$data) :  'Send Email Failure';
  }

  public function attitudeTest(){
    $this->load->view('professional/attitude');
  }

  public function alterUser($conditional){
    $this->app_model->alterUser($conditional);
  }

  public function service($conditional){
    $this->app_model->service($conditional);
  }
  public function selectProfessional($conditional){
    $this->app_model->selectProfessional($conditional);
  }
}
