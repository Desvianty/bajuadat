<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Bajuadat_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Bajuadat_model extends CI_Model {

  // ------------------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
  }


  public function get($id = null, $limit = 5, $offset = 0)
  {
      if ($id === null) {
      return $this->db->get('katalog_baju', $limit,$offset)->result();
    } else {
      return $this->db->get_where('katalog_baju', ['id' => $id])->result_array();
    }
  }
  
  public function count()
  {
    return $this->db->get('katalog_baju')->num_rows();
  }

  public function add($data)
  {
    try{
      $this->db->insert('katalog_baju', $data);
      $error=$this->db->error();
      if(!empty($error['code']))
      {
        throw new exception('Terjadi Kesalahan:' .$error['message']);
        return false; 
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    }catch (Exception $ex) {
      return['status'=>false, 'msg' => $ex->getMessage()];
    }
  }

  public function update($id, $data)
  {
    try{
      $this->db->update('katalog_baju', $data, ['id' =>$id]);
      $error=$this->db->error();
      if(!empty($error['code']))
      {
        throw new exception('Terjadi Kesalahan:' .$error['message']);
        return false; 
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    }catch (Exception $ex) {
      return['status'=>false, 'msg' => $ex->getMessage()];
    }
  }

  public function delete($id)
  {
    try{
      $this->db->delete('katalog_baju', ['id' =>$id]);
      $error=$this->db->error();
      if(!empty($error['code']))
      {
        throw new exception('Terjadi Kesalahan:' .$error['message']);
        return false; 
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    }catch (Exception $ex) {
      return['status'=>false, 'msg' => $ex->getMessage()];
    }
  }

}

/* End of file Bajuadat_model.php */
/* Location: ./application/models/Bajuadat_model.php */