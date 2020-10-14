@extends('layout')
@section('content')
    <div class="card-body">
        <center>
            <div class="card">
                <div class="text-left " style="margin-left: 50px;margin-top: 100px">
                    <div class="row">
                        <div class="col-4">
                            <h4>Chi tiết chiến dịch gửi tin</h4>
                        </div>
                    </div>

                    <center style="padding-top: 50px">

                    <table class="table table-bordered">
                        <tr >
                            <td bgcolor="#57ffdb">Tiêu đề</td>
                            <td>{{ $model->title }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Link</td>
                            <td>{{ $model->link }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Trạng thái</td>
                            @if($model->status==0)
                                <td>Lưu tạm</td>
                            @else
                                <td>Đã gửi</td>
                            @endif
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Nội dung</td>
                            <td>{{ $model->description }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Hiển thị tới ngày</td>
                            <td>{{ $model->date }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Hiển thị trên Zone</td>
                            <td>{{ $model->zone }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Phạm vi gian hàng</td>
                            @if($model->limit==1)
                            <td>Tất cả gian hàng đang hoạt động</td>
                                @elseif($model->limit==2)
                            <td>Tất cả gian hàng đang hoạt động và đã trả tiền</td>
                                @else
                            <td>Khác</td>
                                @endif

                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Import CSV</td>
                            <td>{{ $model->import_csv }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Không hiển thị với các gian hàng</td>
                            <td>{{ $model->block }}</td>
                        </tr>
                    </table>

                    </center>

                </div>
            </div>
        </center>
    </div>

    @endsection
