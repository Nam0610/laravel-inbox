@extends('layout')
@section('content')
    <script>
        function test() {
            const name = document.getElementById("trangThai2");
            alert(name.value)
        }
    </script>
    <div class="card">
        <div class="card-header">
            <div class="row">

             <div class="col-2" >
                 <div class=""style="background-color: white" >
                 <div class="text-white bg-primary">
                 Tìm kiếm
                 </div>
                 <input type="text" placeholder="Nhập tiêu đề.." name="key">
                 <div class="text-white bg-primary">
                     Trạng thái
                 </div>
                 <input type="radio"  name="status" style="color: #4cff29" value="2">Tất cả
                 <br>
                 <input type="radio"name="status"style="color: #4cff29" value="0" >Lưu tạm
                 <br>
                 <input type="radio" name="status" style="color: #4cff29" value="1">Đã gửi
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
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->link }}</td>
                            @if($value->status==0)
                            <td>Lưu tạm</td>
                            @else
                                <td>Đã gửi</td>
                            @endif
                            <td>{{ $value->description }}</td>
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
