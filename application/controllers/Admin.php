<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * <b>Admin Controller </b>
 * Controlador que facilita la implementacion de metodos
 * comunes en la generacion de implementacion basica (CRUD),
 * para el rol de administrador del sistema, aporta metodos para
 * ser heredados por otras clases, eliminando la
 * reescritura de codigo redundante en cada sistema y facilitando
 * el mantenimiento de este codigo comun.
 * @package      Application
 * @subpackage   controllers
 * @author       Cesar Ramirez <candresramirez@gmail.com>
 * @copyright    Por definir
 * @license      Por definir
 * @version      v-1 Version 26/05/2016
 * */
class Admin extends CI_Controller {
  private $id;
  public function __construct(){
		parent::__construct();
		$this->load->database();
    $this->id = $this->session->userdata("users_id");
    $this->user_type = $this->session->userdata("user_type");
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
      $newdata = array(
          'email'  	=> $email,
          'user_type' 	=> $verify['user_type'],
          'users_id'		=> $verify['users_id'],
          'logged_in' 	=> TRUE
          );
      $this->session->set_userdata($newdata);

      $data["menu"]= $this->itemMenu();
      $data["mensaje"] = "Seleccione cualquiera de las opciones del men&uacute; principal";
      $this->load->view("admin/home", $data);

    }else{
      $data["warning"]= "Username y/o Password introducida no es correcta.";
      $this->load->view("admin/login", $data);
    }
  }
  public function itemMenu(){
    $user_type = $this->session->userdata("user_type");
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
		$this->load->view("admin/home", $data);
	}

  public function tableMenu(){
    $query = $this->admin_model->tableName();
    $out = '';
    foreach ($query->result() as $value) {
      $out .= anchor($value->url.'/'.$value->name_table, $value->title).nbs(2);
    }
    $out .= anchor('admin/logout', 'Cerrar Sesi&oacute;n');
    return $out;
  }

  public function listAll($table = ''){
    $out = '';
    $searchField = $this->input->post('searchfield');
    //$table = $this->uri->segment(3);
    if(!isset($table)){
      $table = ($this->input->post('table'))? $this->input->post('table') : $this->uri->segment(3);
    }
    $rows = $this->admin_model->get_data_search($table, $searchField);
    //die($this->db->last_query());
    $field = $this->admin_model->searchField($table);
    $data['search'] = $this->_search($table);
    $data['tables'] = anchor('admin/form/'.$table.'/add','Ingresar Registro').br(2).$this->generateTable($field,$rows,$table);
    return $data;
    // switch ($table) {
    //   case 'client':
    //     $data['menu'] = $this->itemMenu();
    //     $this->load->view('admin/client_home',$data);
    //     break;
    //
    //   default:
    //     $data['menu'] = $this->itemMenu();
    //     $this->load->view('admin/home',$data);
    //     break;
    // }

  }

  public function _search($table = ''){
    $out = '';
    $out .= '<table border="1"><tr>';
    $out .= form_open_multipart('admin/listAll');
    $out .= form_hidden('table',$table);
    $out .= '<tr>';
    $out .= '<td>'.form_input('searchfield').'</td>';
    $out .= '<td>'.form_submit('botonSubmit', 'Buscar').'</td>';
    $out .=  '</tr>';
    $out .= form_close();
    $out .= '';
    return $out;
  }

  public function generateTable($field,$rows,$add = ''){
    foreach ($field->result() as $value) {
      $tittle[] = $value->tittle;
      $column_name[] = $value->column_name;
      if($value->column_type == 'combobox') $category[] =  $value->column_name;
    }

    foreach ($rows->result_array() as  $values) {
      $id = $values[$add.'_id'];
      foreach ($column_name as $column) {
        if(!empty($category)){
          foreach ($category as $value) {
            $get = $this->admin_model->get_category($value,$values[$value]);
            (isset($get->row()->value))? $values[$value] = $get->row()->value : $values[$column];
          }
        }
        if($column == 'professional_id'){
          $get = $this->admin_model->get_names('professional_id',$values[$column]);
          (isset($get->row()->name))? $values['professional_id'] = $get->row()->name : $values[$column];
        }
        if($column == 'template_row_id'){
          $get = $this->admin_model->get_tables('service','template_row.template_row_id = '.$values[$column],'template_row','template_row.template_row_id = service.template_row_id');
          (isset($get->row()->name))? $values['template_row_id'] = $get->row()->name.' '.$get->row()->lastname : $values[$column];
        }
        $add_column[$column] = $values[$column];
      }
      $add_column['operacion'] = $this->generateOperation($add,$id);
      unset($add_column[$add.'_id']);
      unset($add_column['erased']);
      $data[] = $add_column;
    }
    $tittle[] = 'Operacion';
    //unset($tittle[0]);
    $this->table->set_heading($tittle);

    if(empty($data)){
      $table = $this->table->generate();
    }else{
      $table = $this->table->generate($data);
    }
    return $table;
  }

  public function generateOperation($table,$id){

    $attr = array("onclick" => "return confirm('Est&aacute; seguro de borrar este registro')");
    $out = '';
    switch ($table) {
      case 'service':
        $out .= anchor('','Informe').br();
        $out .= anchor('admin/form/'.$table.'/edit/'.$id,'Editar').br();
        $out .= anchor('admin/delete/'.$table.'/'.$id,'Borrar',$attr);
        break;
      case 'client':
        $out .= anchor('admin/tabs/'.$table.'/ver/'.$id,'Ver').nbs();
        $out .= anchor('admin/form/'.$table.'/edit/'.$id,'Editar').nbs();
        $out .= anchor('admin/delete/'.$table.'/'.$id,'Borrar',$attr);
        break;
      case 'template_row':
        $out .= anchor('admin/detailView/'.$table.'/'.$id,'Detalle de Servicio').nbs();
        break;
      default:
        $out .= anchor('admin/form/'.$table.'/edit/'.$id,'Editar').nbs();
        $out .= anchor('admin/delete/'.$table.'/'.$id,'Borrar',$attr);
        break;
    }

    return $out;
  }

  public function generateAnchor($link,$title,$attrDel= ''){
    $attr = array(
				              'width'      => '380',
				              'height'     => '230',
				              'scrollbars' => 'yes',
				              'status'     => 'yes',
				              'resizable'  => 'yes',
				              'screenx'    => '500',
				              'screeny'    => '300'
				            );
    if(empty($attrDel)){
      return anchor_popup($link,$title,$attr);
    }else{
      return anchor($link,$title,$attrDel);
    }

  }

  public function form($table='',$operation='',$id=''){
    (isset($table))? $table : $this->uri->segment(3);
    (isset($operation))? $operation : $this->uri->segment(4);
    (isset($id))? $id : $this->uri->segment(5);
    if($table == 'availability' && ($operation == 'add' || $operation == 'edit')){
      $data['form'] = $this->formAvailability($table,$id,$operation);
    }else{
      if($operation == 'edit'){
        $query = $this->admin_model->get_tables($table,$table."_id = ".$id);
        $row = $query->row_array();
      }
      $schema = $this->_schema($table);
      $out = '';
      $out .= '<table border="1">';
      $out .= form_open_multipart('admin/dataProcess');
      $out .= form_hidden('table',$table);
      $out .= form_hidden('operation',$operation);
      $out .= form_hidden('id',$id);
      foreach ($schema as $value) {
        $row_data = (isset($row[$value->column_name]))? $row[$value->column_name] : '';
        switch ($value->column_type) {
          case 'varchar':
          case 'integer':
          case 'numeric':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_input($value->column_name,$row_data).'</td></tr>';
            break;
          case 'boolean':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_checkbox($value->column_name,$row_data,true).'</td></tr>';
            break;
          case 'upload':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_upload($value->column_name,$row_data).'</td></tr>';
            break;
          case 'hidden':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_hidden($value->column_name,$row_data).'</td></tr>';
            break;
          case 'password':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_password($value->column_name,$row_data).'</td></tr>';
            break;
          case 'combobox':
            $r = $this->admin_model->get_categories($value->category);
            $combobox = array();
            foreach ($r as $val) {
              $combobox[$val->key]= $val->value;
            }
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_dropdown($value->column_name,$combobox,$row_data).'</td></tr>';
            break;
          case 'select':
            $r = $this->admin_model->get_tables('users','user_type = 2','client','users.users_id = client.users_id');
            $combo = array();
            foreach ($r->result() as $val) {
              $id = $val->client_id;
              $combo[$val->client_id]= $val->first_name. ' '.$val->last_name;
            }
            $ajax = $this->ajaxSelect($id,$table);
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td> Cliente: '.form_dropdown($value->category,$combo,$row_data,"id = '$id'").br().'Evaluado: '.form_dropdown('template_row_id','','',"id =".$table.$id).'</td></tr>';
            break;
          case 'drop-down':
            switch ($table) {
              case 'service':
              case 'professional':
              case 'document':
                $r = $this->admin_model->get_tables('users','user_type = 4','professional','users.users_id = professional.users_id');
                foreach ($r->result() as $val) {
                  $combo2[$val->professional_id]= $val->first_name. ' '.$val->last_name;
                }
                break;
              case 'client':
                $r = $this->admin_model->get_tables('users','user_type = 2','client','users.users_id = client.users_id');
                foreach ($r->result() as $val) {
                  $combo2[$val->client_id]= $val->first_name. ' '.$val->last_name;
                }
                break;
            }
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_dropdown($value->column_name,$combo2,$row_data).'</td></tr>';
            break;
          case 'date':
            $data = array(
                  'name' => $value->column_name,
                  'class' => 'datepicker'
            );
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_input($data,$row_data).'</td></tr>';
            break;
          case 'hour':
            $data = array(
                  'name' => $value->column_name,
                  'class' => 'datetimepicker'
            );
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_input($data,$row_data).'</td></tr>';
            break;
          case 'text':
            $out .= '<tr><td>'.form_label($value->tittle).'</td>';
            $out .= '<td>'.form_textarea($value->column_name,$row_data).'</td></tr>';
            break;
        }
      }
      $out .= '</table>'.br();
      $out .= form_submit('botonSubmit', 'Enviar');
      $base = base_url();
      $js = array('onclick' => "window.location.href= '$base/index.php/admin/'");
      $out .= form_button('botonCancel', 'Cancelar',$js);
      $out .= form_close();
      $out .= '';
      $data['form'] = $out;
   }
    (isset($ajax))? $data['ajax'] = $ajax : $data['ajax'] = '';

    $data['menu'] = $this->itemMenu();
    $this->load->view('admin/home',$data);
  }

  public function formAvailability($table, $id = '',$operation = ''){
    $schema = $this->_schema($table);
    $out = '';
    $out .= '<table border="1"><tr>';
    $out .= form_open_multipart('admin/diaryProcess');
    if(!empty($id)){
      $query = $this->admin_model->get_tables($table,$table."_id = ".$id);
      $row = $query->row_array();
      $out .= form_hidden('professional_id',$row['professional_id']);
      $turn = $this->admin_model->get_category('turn',$row['turn']);
      $day = $this->admin_model->get_category('day',$row['day']);
    }
    $out .= form_hidden('table',$table);
    $out .= form_hidden('operation',$operation);
    $out .= form_hidden('id',$id);

    foreach ($schema as $label) {
      if($operation == 'edit'){
        $out .= '<td>'.form_label($label->tittle).'</td>';
      }else {
        if($label->column_name == 'day' || $label->column_name == 'turn' ){
          $out .= '<td colspan="2">'.form_label($label->tittle).'</td>';
        }else{
          $out .= '<td>'.form_label($label->tittle).'</td>';
        }
      }
    }
    $out .= '</tr>';
    $categories = $this->admin_model->get_categories('day');
    $manana = 'manana';
    $tarde = 'tarde';
    if($operation == 'edit'){
      $out .= '<tr>';
      $out .= '<td>'.$day->row()->value.'</td>';
      $out .= '<td>'.$turn->row()->value.'</td>';
      $out .= '<td>'.form_input('start_time_'.$id,$row['start_time'],'class = "datetimepicker"').'</td>';
      $out .= '<td>'.form_input('end_time_'.$id,$row['end_time'],'class = "datetimepicker"').'</td>';
      $out .= '</tr>';
    }else{
      foreach ($categories as $category){
        $out .= '<tr>';
        $out .= '<td rowspan="2">'.$category->value.'</td>';
        $out .= '<td rowspan="2">'.form_checkbox($category->key,$category->key).'</td>';
        $out .= '<td>Ma&ntilde;ana</td>';
        $out .= '<td >'.form_checkbox($manana.'_'.$category->categories_id,1).'</td>';
        $out .= '<td>'.form_input($manana.'_start_time_'.$category->categories_id,'','class = "datetimepicker"').'</td>';
        $out .= '<td>'.form_input($manana.'_end_time_'.$category->categories_id,'','class = "datetimepicker"').'</td>';
        $out .= '</tr><tr>';
        $out .= '<td>Tarde</td>';
        $out .= '<td >'.form_checkbox($tarde.'_'.$category->categories_id,2).'</td>';
        $out .= '<td>'.form_input($tarde.'_start_time_'.$category->categories_id,'','class = "datetimepicker"').'</td>';
        $out .= '<td>'.form_input($tarde.'_end_time_'.$category->categories_id,'','class = "datetimepicker"').'</td>';
      }
    }
    $out .= '</tr></table>'.br(2);
    $out .= form_submit('botonSubmit', 'Enviar');
    $out .= form_close();
    $out .= '';
    return $out;
  }
  public function dataProcess(){
      $tabla = $this->input->post('table');
      $operation = $this->input->post('operation');
      $is_corp = ($this->input->post('is_corporative'))? $this->input->post('is_corporative') : '';
			$campos = $this->_schema($tabla);
			$entrada = array();
      //die(print_r($this->input->post()));
			foreach ($campos as $value){
        $this->form_validation->set_rules($value->column_name,$value->tittle,$value->rules);
   				switch($value->column_type){
   					case "password":
   						$entrada[$value->column_name] = sha1($this->input->post($value->column_name));
   						break;
            case "boolean":
              if($this->input->post($value->column_name) == true){
                $entrada[$value->column_name] = '1';
              }else{
                $entrada[$value->column_name] = '0';
              }
              break;
            case "upload":
              $dataUp = $this->do_upload();
              $entrada[$value->column_name] = $dataUp['file_name'];
              break;
  					default:
  						$entrada[$value->column_name] = $this->input->post($value->column_name);
    			}
			}

      if ($this->form_validation->run() == FALSE){
        $data['validation_errors'] = validation_errors();
        $data['menu'] = $this->itemMenu();
        $this->load->view('admin/home',$data);
      }else{
  			if ($operation == 'add'){
  				$this->admin_model->insert($tabla, $entrada);
          //$data['mensaje'] = 'Registro de datos Exitoso';
  			} else {
          $id = $this->input->post('id');
  				$this->admin_model->update($id, $tabla, $entrada);
          //$data['mensaje'] = 'Actualizacion de datos Exitoso';
  			}
        //redirect('admin/listAll/'.$tabla, 'refresh');
        $data['mensaje'] = 'Operacion exitosa!';
        $data['menu'] = $this->itemMenu();
        $this->load->view('admin/home',$data);
      }

  }

  public function diaryProcess(){
    $categories = $this->admin_model->get_categories('dias');
    $data_post = array();
    $tabla = $this->input->post('table');
    $operation = $this->input->post('operation');
    $id = $this->input->post('id');

    if ($operation == 'add'){
      foreach ($categories as $category) {
        if($this->input->post($category->key)){
          $data_entry['professional_id'] = $this->input->post('professional_id');
          $data_entry['day'] = $this->input->post($category->key);
          $data_entry['start_time'] = $this->input->post('start_time_'.$id);
          $data_entry['end_time'] = $this->input->post('end_time_'.$id);
          $data_post[] = $data_entry;
        }
      }
      $this->admin_model->insert($tabla, $data_post);
      //$data['mensaje'] = 'Registro de datos Exitoso';
    } else {
      $id = $this->input->post('id');
      $data_entry['professional_id'] = $this->input->post('professional_id');
      $data_entry['day'] = $this->input->post('day');
      $data_entry['start_time'] = $this->input->post('start_time_'.$id);
      $data_entry['end_time'] = $this->input->post('end_time_'.$id);
      $this->admin_model->update($id, $tabla, $data_entry);
      //$data['mensaje'] = 'Actualizacion de datos Exitoso';
    }
    redirect('admin/listAll/'.$tabla, 'refresh');
  }

  public function delete(){
    $table = $this->uri->segment(3);
    $id = $this->uri->segment(4);
    $result = $this->admin_model->delete($table,$id);
    if($result == true) redirect('admin/listAll/'.$table, 'refresh');
  }

  public function _schema($table){
    return $this->admin_model->_schema($table);
  }

  public function do_upload(){
    $path = './uploads/';
    $pathUser = $path.$this->id;
    if (!file_exists($pathUser)) {
      mkdir($pathUser, 0777, true);
    }
    $config['upload_path'] = $pathUser;
    $config['allowed_types'] = 'pdf|txt';
    $config['remove_spaces']= TRUE;
    $config['max_size']    = '2048';

    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('userfile')){
      $this->form_validation->set_message('do_upload', 'En el Documento %s la extesion no es valida');
      return false;
    }else{
      $upload_data = $this->upload->data();
      $file_name = $upload_data['file_name'];
      $data = array('result' => true, 'file_name' => $file_name);
      return $data;
    }
  }

  public function getAjax(){
		if($this->input->is_ajax_request() && $this->input->get("id")){
			$Id = $this->input->get("id");
	    $values = $this->admin_model->get_tables('template_row','client_id = '.$Id);
	    $data = array(
	        "values" => $values->result()
	    );
      echo json_encode($data);
		}
	}

  public function ajaxSelect($id,$table){
    $out = '';
    $out .= '$("#'.$id.'").on("change", function(){';
    $out .= 'var itemSelected = $( "#'.$id.' option:selected").attr("value");';
    $out .= '$.get("'.base_url("index.php/admin/getAjax").'", {"id":itemSelected}, function(data){';
    $out .= 'var valores = "";';
    $out .= 'var valor = JSON.parse(data);';
    $out .= 'for(var datos in valor.values){';
    $out .=   "valores +=";
    $out .=   "'<option value='";
    $out .=   "+ valor.values[datos].template_row_id+";
    $out .=   "'>'";
    $out .=   '+valor.values[datos].name + " " +';
    $out .=   'valor.values[datos].lastname +';
    $out .=   "'</option>'";
    $out .=  '}';
    $out .=  '$("select#'.$table.$id.'").html(valores);';
    $out .=  "});});";
    return $out;
  }
  public function profile(){
   $this->form('users','edit',$this->id);
  }
  public function tabs(){
    $table = $this->uri->segment(3);
    $operation = $this->uri->segment(4);
    $id = $this->uri->segment(5);

    $view = array('menu' => $id );
    $tabs = $this->load->view('admin/client_home',$view,true);
    $data['tabs'] = $tabs;
    $data['menu'] = $this->itemMenu();
    $this->load->view('admin/home',$data);
  }

  public function listCase(){
    $table = $this->uri->segment(3);
    $view['table'] = $this->listAll($table);
    $tabs = $this->load->view('admin/client_home',$view,true);
    $data['tabs'] = $tabs;
    $data['menu'] = $this->itemMenu();
    $this->load->view('admin/home',$data);
  }

  public function detailView(){
    $table = $this->uri->segment(3);
    $id = $this->uri->segment(4);
    $client = $this->admin_model->get_tables($table,'template_row_id ='.$id);
    $where = "template_row_id = 3 AND category = 'type_service' AND extract(month from start_date) = extract(month from current_date)";
    $service = $this->admin_model->get_tables('service',$where,'categories','categories.key = service.type_service');
    $client = $client->row();

    $out = '';
    $out .= $client->client_id.br();
    $out .= $client->name.br();
    $out .= $client->lastname.br();
    $out .= $client->city.br();
    $out .= br(2);
    foreach ($service->result() as  $result) {
      $out .= $result->value.br();
    }
    $rowdate = $this->admin_model->getDate($client->template_row_id);
    $d = explode('-', $service->row()->start_date);
    $year = $d[0];
    $month = $d[1];

    $dateCalendar = array();
    foreach ($rowdate->result() as $value) {
      $date = new DateTime($value->start_date);
      $day = $date->format('j');
      $dateCalendar[$day] = 'http://localhost/people';
    }

    $view['calendar'] = $this->calendar->generate($year,$month,$dateCalendar);
    $view['detail'] = $out;
    $tabs = $this->load->view('admin/client_home',$view,true);
    $data['tabs'] = $tabs;
    $data['menu'] = $this->itemMenu();
    $this->load->view('admin/home',$data);
  }
}
