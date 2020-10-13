<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class inboxModel extends Model
{
    public $id;
    public $tieu_de;
    public $link;
    public $trang_thai;
    public $noi_dung;
    public $hien_thi_toi_ngay;
    public $hien_thi_tren_zone;
    public $pham_vi_gian_hang;
    public $import_csv;
    public $khong_hien_thi_voi_cac_gian_hang;

    static function getAll(){
        $result=DB::select('select * from inbox_campaigns');
        return $result;
    }
    public function createProcess(){
       DB::insert('insert into inbox_campaigns values (?, ?,?,?,?,?,?,?,?,?)', [
            $this->id,
            $this->tieu_de,
            $this->link,
            $this->trang_thai,
            $this->noi_dung,
            $this->hien_thi_toi_ngay,
            $this->hien_thi_tren_zone,
            $this->pham_vi_gian_hang,
            $this->import_csv,
            $this->khong_hien_thi_voi_cac_gian_hang
        ]);
    }
    static function getOne($id){
           $result=DB::select('select * from inbox_campaigns where id = ?', [$id]);
           return $result;
    }
    public function updateProcess(){
       DB::update('update inbox_campaigns set
                          tieu_de = ?, link=?,trang_thai=?,noi_dung=?,hien_thi_toi_ngay=?,hien_thi_tren_zone=?,pham_vi_gian_hang=?,import_csv=?,khong_hien_thi_voi_cac_gian_hang=?
                          where id = ?', [
           $this->tieu_de,
           $this->link,
           $this->trang_thai,
           $this->noi_dung,
           $this->hien_thi_toi_ngay,
           $this->hien_thi_tren_zone,
           $this->pham_vi_gian_hang,
           $this->import_csv,
           $this->khong_hien_thi_voi_cac_gian_hang,
           $this->id,
       ]);
    }
    public function xoa(){
        DB::delete('delete from inbox_campaigns where id = ?', [$this->id]);
    }



}
