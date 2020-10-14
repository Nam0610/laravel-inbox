<?php

namespace App\Http\Controllers;

use App\inboxModel;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    protected $zone = '1,2';
    function index(Request $request){
        $model=inboxModel::getAll();
        //dd($request);
        //dd($request->trangThai0);
        return view('index',compact('model'));
    }
    function create(){
        $model=inboxModel::getAll();
        return view('create',compact('model'));
    }
    function createProcess(Request $request){
        $this->validate($request,[
            'tieuDe' => 'required',
            'link' => 'required',
            'noiDung' => 'required',
            'date' => 'required',

            'phamVi' => 'required',
            'importCSV' => 'required',
            'khongHienThiVoiCacGianHang' => 'required',
        ]);
        $model=new inboxModel();
        $model->id=$request->id;
        $model->tieu_de=$request->tieuDe;
        $model->link=$request->link;
        $model->trang_thai=0;
        $model->noi_dung=$request->noiDung;
        $model->hien_thi_toi_ngay=$request->date;
        if($request->hienThiTrenZone == null){
            $hien_thi_tren_zone=('1,2,4,5,6,8,9,10,11,12,13,14,17,18');
            $model->hien_thi_tren_zone=$hien_thi_tren_zone;
        }
        else{
            $model->hien_thi_tren_zone=$request->hienThiTrenZone;
        }
        $model->pham_vi_gian_hang=$request->phamVi;
        $model->import_csv=$request->importCSV;
        $model->khong_hien_thi_voi_cac_gian_hang=$request->khongHienThiVoiCacGianHang;
        $model->createProcess();
        return redirect(route('index'));
    }
    function update($id){
        $model=inboxModel::getOne($id);
        return view('update',compact('model'));
    }
    public function updateProcess(Request $request){
        //validate

        //save db
        $this->zone = $request->has('zone') ? $request->get('zone') : $this->zone;
        $payload = $request->all();
        $payload['zone'] = $this->zone;

        inboxModel::querey()->create($payload);

        $model=new inboxModel();
        $model->id=$request->id;
        $model->tieu_de=$request->tieuDe;
        $model->link=$request->link;
        $model->trang_thai=0;
        $model->noi_dung=$request->noiDung;
        $model->hien_thi_toi_ngay=$request->date;
        if($request->hienThiTrenZone == null){
            $hien_thi_tren_zone=('1,2,4,5,6,8,9,10,11,12,13,14,17,18');
            $model->hien_thi_tren_zone=$hien_thi_tren_zone;
        }
        else{
            $model->hien_thi_tren_zone=$request->hienThiTrenZone;
        }
        $model->pham_vi_gian_hang=$request->phamVi;
        $model->import_csv=$request->importCSV;
        $model->khong_hien_thi_voi_cac_gian_hang=$request->khongHienThiVoiCacGianHang;
        $model->updateProcess();
        return redirect(route('index'));
    }
    function destroy($id){
        $model=new inboxModel();
        $model->id=$id;
        $model->xoa();
        return redirect(route('index'));
    }
    function show($id){
        $model=inboxModel::getOne($id);
        return view('show',compact('model'));
    }
    function search(Request $request){
        $search=$request->timKiem;
        $radio=$request->trangThai;
        dd($search);

    }


}
