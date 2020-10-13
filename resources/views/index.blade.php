@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
             <div class="col-2" >
                 <div class=""style="background-color: white" >
                 <div class="text-white bg-primary">
                 Tìm kiếm
                 </div>
                 <input type="text" placeholder="Nhập tiêu đề.." name="timKiem">
                 <div class="text-white bg-primary">
                     Trạng thái
                 </div>
                 <input type="radio" checked="checked" name="trangThai" style="color: #4cff29">Tất cả
                 <br>
                 <input type="radio"name="trangThai"style="color: #4cff29" >Lưu tạm
                 <br>
                 <input type="radio" name="trangThai" style="color: #4cff29">Đã gửi
                 <div class="text-white bg-primary">
                     Lựa chọn hiển thị
                 </div>
                 Số bản ghi:
                 <select >
                     <option></option>
                 </select>
             </div>
            </div>
            <div class="col-10">
                <h4 class="text-secondary">   Inbox Campaigns</h4>
                  <div class="text-right">
                      <a href="{{ route('create') }}" class="btn btn-success"> +     Thêm mới</a>
                  </div>
                <table class="table table-bordered">
                    <tr bgcolor="#57ffdb">
                        <td>Tiêu đề</td>
                        <td>Link</td>
                        <td>Trạng thái</td>
                        <td>Nội dung</td>
                        <td></td>
                    </tr>
                    @foreach($model as $value)
                        <tr>
                            <td>{{ $value->tieu_de }}</td>
                            <td>{{ $value->link }}</td>
                            @if($value->trang_thai==0)
                            <td>Lưu tạm</td>
                            @else
                                <td>Đã gửi</td>
                            @endif
                            <td>{{ $value->noi_dung }}</td>
                            <td><a href="{{ route('update',['id'=>$value->id]) }}"> <i class="far fa-edit"></i></a>
                           <a href="{{ route('show',['id'=>$value->id]) }}"> <i class="far fa-eye"></i></a>
                           <a href="{{ route('destroy',['id'=>$value->id]) }}"> <i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        </div>


    </div>
@endsection
