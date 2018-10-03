<?php
/**
 * <b>App Model Service </b>
 *
 *
 * @package    	people
 * @author     	Cesar Ramirez <candresramirez@gmail.com>
 * @version    	1.0
 */
class App_model  extends CI_Model  {
    function __construct(){
        parent::__construct();
    }
    public function insertData($table,$data){
      $this->db->insert($table,$data);
      if ($this->db->insert_id()) {
        $data = array($table.'_id' => $this->db->insert_id());
        echo json_encode($data);
      }else{
        $data = array($table.'_id' => null);
        echo json_encode($data);
      }
    }

    public function updateData($conditional,$table,$data){
      $this->db->where($conditional);
      $this->db->update($table,$data);
      $id = explode('=',$conditional);
      if ($this->db->affected_rows() > 0) {
        $data = array($table.'_id' => $id[1]);
        echo json_encode($data);
        return true;
      }else{
        $data = array($table.'_id' => null);
        echo json_encode($data);
        return false;
      }
    }

    public function deleteData($conditional,$table){
      $this->db->where($conditional);
      $this->db->set('erased', true);
      $this->db->update($table);
      if ($this->db->affected_rows() > 0) {
        $data = array('result' => 1);
        echo json_encode($data);
      }else{
        $data = array('result' => 0);
        echo json_encode($data);
      }
    }

    function selectData($conditional,$dataColumn,$table){
      $this->db->select($dataColumn);
      $this->db->where($conditional);
      $query = $this->db->get($table);
      $data = array();
      $data_post = array();
      if($query->num_rows() > 0){
        foreach ($query->result() as $key => $value) {
          $data[$key] = $value;
        }
        $data_post['result'] = $data;
        echo json_encode($data_post);
        return $data;
      }else{
        echo json_encode($data);
      }
    }

    function verify($email, $password){
      $where = array('email' => $email, 'password' => $password);
      $this->db->where($where);
      $query = $this->db->get('users');
      return $query;
    }

    function _schema($table_name){
      $where = array('table_name' => $table_name);
      $this->db->where($where);
      $this->db->order_by("order", "asc");

      $query = $this->db->get('schema_tables');
      return $query;
    }
    function selectUsers($conditional){
      $this->db->where($conditional);
      $query = $this->db->get('users');
      return $query;
    }

    public function verifyEmail($email){
      $this->db->where('email',$email);
      $query = $this->db->get('users');
      return $query;
    }

    function alterUser($conditional){
      $this->db->select('users.users_id, identification_type,identification_number,extension_number, "position", email,first_name,last_name,phone, phone_movil');
      $this->db->join('alternate','alternate.users_id = users.users_id');
      $this->db->where($conditional);
      $query = $this->db->get('users');
      $data = array();
      foreach ($query->result() as $key => $value) {
        $data[$key] = $value;
      }
      echo json_encode($data);
    }

    function service($conditional){
//       $this->db->select('service.template_row_id, type_service, status_service, start_date, end_date, created_date, created_time, address, neighborhood, info, latitude, longitude, payment_id,
// name, lastname, identity,area,phone,email,city,position');
      $this->db->join('service','template_row.template_row_id = service.template_row_id');
      $this->db->join('bill','bill.bill_id = service.bill_id');
      $this->db->where($conditional);
      $query = $this->db->get('template_row');
      $data = array();
      foreach ($query->result() as $key => $value) {
        $data[$key] = $value;
      }
      echo json_encode($data);
    }

    function selectProfessional($conditional){
      $this->db->join('professional p','p.users_id = u.users_id');
      $this->db->where($conditional);
      $this->db->where('u.erased', false);
      $query = $this->db->get('users u');
      $data = array();
      foreach ($query->result() as $key => $value) {
        $data[$key] = $value;
      }
      echo json_encode($data);
    }
  }
