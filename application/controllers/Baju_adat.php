<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Baju_adat
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller REST
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
use chriskacerguis\RestServer\RestController;
class Baju_adat extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Bajuadat_model', 'bajuadat');
    $this->methods['index_get']['limit'] = 50; 
  }

  public function index_get()
  {
    $id = $this->get('id', true);
    if ($id === null) {
      $p = $this->get('page', true);
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->bajuadat->count();
      $total_page = ceil($total_data / 20);
      $start = ($p - 1) * 20;
      $list = $this->bajuadat->get(null, 20, $start);
      if ($list) {
        $data = [
          'status' => true,
          'page' => $p,
          'total_data' => $total_data,
          'total_page' => $total_page,
          'data' => $list
        ];
      } else {
        $data = [
          'status' => false,
          'msg' => 'Data tidak ditemukan'
        ];
      }
      $this->response($data, RestController::HTTP_OK);
    } else {
      $data = $this->bajuadat->get($id);
      if ($data) {
        $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
      } else {
        $this->response(['status' => false, 'msg' => $id . ' tidak ditemukan'], RestController::HTTP_NOT_FOUND);
      }
    }
  }

  public function index_post()
  {
    $data=[
      'id' => $this->post('id',true),
      'nama' => $this->post('nama',true),
      'daerah' => $this->post('daerah',true),
      'stok' => $this->post('stok',true),
      'harga' => $this->post('harga',true)
    ];
    $simpan=$this->bajuadat->add($data);
    if($simpan['status']){
      $this->response(['status'=>true,'msg'=>$simpan['data']. ' Data telah ditambahkan'], RestController::HTTP_CREATED);
    }else{
      $this->response(['status'=>false,'msg'=>$simpan['msg']],RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data=[
      'id' => $this->put('id', true),
      'nama' => $this->put('nama',true),
      'daerah' => $this->put('daerah',true),
      'stok' => $this->put('stok',true),
      'harga' => $this->put('harga',true)
    ];
    $id=$this->put('id',true);
    if($id===null){
      $this->response(['status'=>false,'msg'=>'Masukkan ID yang akan diubah'],RestController::HTTP_INTERNAL_ERROR);
    }
    $simpan=$this->bajuadat->update($id, $data);
    if($simpan['status']){
      $status=(int)$simpan['data'];
      if($status>0)
      $this->response(['status'=>true,'msg'=>$simpan['data']. ' Data telah diubah'], RestController::HTTP_OK);
      else
      $this->response(['status'=>false,'msg'=>'Tidak ada data yang diubah'],RestController::HTTP_BAD_REQUEST);
    }else{
      $this->response(['status'=>false,'msg'=>$simpan['msg']],RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id=$this->delete('id',true);
    if($id===null){
      $this->response(['status'=>false,'msg'=>'Masukkan ID yang akan dihapus'],RestController::HTTP_INTERNAL_ERROR);
    }
    $delete=$this->bajuadat->delete($id);
    if($delete['status']){
      $status=(int)$delete['data'];
      if($status>0)
      $this->response(['status'=>true,'msg'=>$id. ' telah dihapus'], RestController::HTTP_OK);
      else
      $this->response(['status'=>false,'msg'=>'Tidak ada data yang dihapus'],RestController::HTTP_BAD_REQUEST);
    }else{
      $this->response(['status'=>false,'msg'=>$delete['msg']],RestController::HTTP_INTERNAL_ERROR);
    }
  }

}

/* End of file Baju_adat.php */
/* Location: ./application/controllers/Baju_adat.php */