<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\Http\Requests\inboxRequest;
use App\Model\inboxModel;
use Illuminate\Http\Request;

class inboxController extends Controller
{
    protected $zone = '1,2,4,5,6,8,9,10,11,12,13,14,17,18';
    public function index(){
        $model=inboxModel::all();
        return view('index',['model'=>$model]);
    }
    public function create(){
        return view ('create');
    }
    public function createProcess(inboxRequest $request){
       $zone = $request->zone != null ? $request->zone : $this->zone;
        $payload = $request->all();
        $payload['status'] = 0;
        $payload['zone'] = $zone;
        $model=new inboxModel();
        $model->create($payload);
        return redirect(route('index'));
    }
    public function update($id){
        $model=inboxModel::findOrFail($id);
        return view('update',['model'=>$model]);
    }
    public function updateProcess(inboxRequest $request,$id){
        $model=inboxModel::findOrFail($id);
        $model->update($request->all());
        return redirect(route('index'));
    }
    public function destroy($id){
        $model=inboxModel::findOrFail($id);
        $model->destroy($id);
        return redirect(route('index'));
    }
    public function show($id){
        $model=inboxModel::findOrFail($id);
        return view('show',['model'=>$model]);
    }
}
