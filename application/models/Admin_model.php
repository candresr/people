<?php
/**
 * People Admin model
 *
 *
 * @package    	People
 * @author     	Cesar Ramirez <candresramirez@gmail.com>
 * @version    	1.5.4
 */
class Admin_model  extends CI_Model  {
    function __construct(){
      parent::__construct();
    }
    function verify($email, $password){
			$where = array('email' => $email, 'password' => $password, 'erased !=' => true, 'user_type' => 1);
	    $this->db->where($where);
	    $query = $this->db->get('users');
	    return $query;
		}
    function get_verify_register($table,$id){
      $where = array('users_id' => $id, 'erased !=' => true);
      $this->db->where($where);
      //$this->db->order_by("order", "asc");
      $query = $this->db->get($table);
      return $query->num_rows();
    }
    function menu($user_type){
			$where = array('belongs' => $user_type, 'erased !=' => true);
	    $this->db->where($where);
    	$query = $this->db->get('menu');
	    return $query;
		}
    function tableName(){
      $where = array('erased !=' => true);
      $this->db->where($where);
      $query = $this->db->get('structure_tables');
      return $query;
    }

    public function get_data_search($name_table,$searchField=''){
      $OR ='';
      $column = array();

       if (!empty($searchField)) {
         $rows = $this->searchField($name_table);
         $i = 1;
         $condition = '';
         foreach ($rows->result() as  $value) {
           $columnOr = $value->table_name.'.'.$value->column_name;
              switch ($value->column_type) {
                case 'varchar':
                case 'text':
                case 'upload':
                  if(is_string($searchField)){
                    $OR .= " OR upper($columnOr) LIKE upper('%$searchField%') " ;
                  }else{
                    $OR .= '';
                  }
                  break;
                case 'combobox':
                  $r = $this->get_combox($value->column_name,$searchField);
                  if($r->num_rows() > 0){
                    $key = $r->row()->key;
                    $OR .= " OR $columnOr =  $key";
                  }else{
                    $OR .= '';
                  }

                  break;
                case 'boolean':
                  if(is_bool($searchField)){
                    $OR .= " OR $columnOr = $searchField ";
                  }else{
                    $OR .= '';
                  }
                  break;
                case 'integer':
                  if(is_int($searchField)){
                    $OR .= " OR $columnOr = $searchField ";
                  }else{
                    $OR .= '';
                  }
                  break;
                case 'date':
                case 'hour':
                  $date = strpos($columnOr, '-');
                  if($date === false){
                    $OR .= ' ';
                  }else{
                    $OR .= " OR $columnOr = '$searchField'";
                  }
                  break;
              }

             if(!empty($value->join)){
               $column[] = $value->join.'.'.$value->column_name;
             }else{
               $column[] = $value->table_name.'.'.$value->column_name;
             }
             $i+=1;
         }
         $OR = $this->replace_last('OR',' ',$OR);

         $column_join = implode(',',$column);
         $this->db->select($column_join);
         $this->db->where("($OR)");
       }
       $this->db->where(array('erased !=' => true));
       $query = $this->db->get($name_table);
       return $query;
    }

    function replace_last($find, $replace, $text){
      $pos = stripos($text, $find);
      if($pos !== false){
          $text = substr_replace($text, $replace, $pos, strlen($find));
      }
      return $text;
    }

    function get_combox($category,$value){
      $where = "upper(value) = upper('$value') AND upper(category) = upper('$category')";
      $this->db->select('key');
      $this->db->where($where);
      $this->db->where(array('erased !=' => true));
      $query = $this->db->get('categories');

      return $query;
    }

    function searchField($name_table,$aux='') {
        $this->db->select('column_name,tittle,column_type,table_name,category,join');
        $this->db->where(array('table_name' => $name_table,'search' => true, 'erased !=' => true));

        if(!empty($aux)){
         $this->db->or_where('table_name', $aux);
        }
        $this->db->order_by('order','ASC');
        $result = $this->db->get('schema_tables');
        return $result;
     }

     function _schema($table_name){
       $where = array('table_name' => $table_name, 'is_visible !=' => false, 'erased !=' => true);
       $this->db->where($where);
       $this->db->order_by("order", "asc");

       $query = $this->db->get('schema_tables');
       return $query->result();
     }

     function get_tables($table,$where='',$tableJ = '',$join = ''){
       if(!empty($tableJ)) $this->db->join($tableJ,$join);
       if(!empty($where)) $this->db->where($where);
       $this->db->where(array($table.'.erased !=' => true));
       $query = $this->db->get($table);
       return $query;
     }

     public function delete($table,$id){
       $this->db->where($table.'_id',$id);
       $this->db->set('erased', true);
       $this->db->update($table);
       if ($this->db->affected_rows() > 0) {
         return true;
       }else{
         return false;
       }
     }
     function insert($tabla, $data){
       if($tabla == 'availability'){
         $this->db->insert_batch($tabla, $data);
       }else{
         $this->db->insert($tabla, $data);
       }
 		}

    public function update($id,$table,$data){
      $this->db->where($table.'_id',$id);
      $this->db->update($table,$data);
      /*
      if($table == 'availability'){
        $this->db->where($table.'_id',$id);
        $this->db->update_batch($table,$data);
      }else{

        $this->db->where($table.'_id',$id);
        $this->db->update($table,$data);
      }
      */
    }

    function get_category($category,$key){
      $where = array('category' => $category, 'key' => $key);
      $this->db->select('categories_id,key,value');
      $this->db->where($where);
      $this->db->where(array('erased !=' => true));
      $query = $this->db->get('categories');
      return $query;
    }

    function get_names($field,$value){
      list($join,$id) = explode("_", $field);
      $where = array($join.'.'.$field => $value, $join.'.erased !=' => true);
      $this->db->select("(first_name || ' ' || last_name) as name");
      $this->db->join('users', 'users.users_id = '.$join.'.users_id');
      $this->db->where($where);
      $query = $this->db->get($join);
      return $query;
    }

    function get_id($table,$id,$table_aux = ''){

      if(!empty($table_aux)){
        $where = array($table_aux.'_id' => $id );
        $this->db->where($where);
      }else{
        $where = array($table.'_id' => $id );
        $this->db->where($where);
      }
      $this->db->where(array('erased !=' => true));
      $query = $this->db->get($table);
      return $query->row();
    }

    function getProfile($where=''){
      $this->db->where(array('erased !=' => true));
      $this->db->where($where);
      $result = $this->db->get('users');
      return $result;
    }

    function getDate($id) {
      $this->db->select('start_date,type_service');
      $this->db->where(array('erased !=' => true));
      $this->db->where('extract(month from start_date) = extract(month from current_date)');
      $this->db->where('template_row_id',$id);
      $result = $this->db->get('service');
      return $result;
    }
}
