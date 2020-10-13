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
                    @foreach($model as $value)
                    <center style="padding-top: 50px">

                    <table class="table table-bordered">
                        <tr >
                            <td bgcolor="#57ffdb">Tiêu đề</td>
                            <td>{{ $value->tieu_de }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Link</td>
                            <td>{{ $value->link }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Trạng thái</td>
                            @if($value->trang_thai==0)
                                <td>Lưu tạm</td>
                            @else
                                <td>Đã gửi</td>
                            @endif
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Nội dung</td>
                            <td>{{ $value->noi_dung }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Hiển thị tới ngày</td>
                            <td>{{ $value->hien_thi_toi_ngay }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Hiển thị trên Zone</td>
                            <td>{{ $value->hien_thi_tren_zone }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Phạm vi gian hàng</td>
                            @if($value->pham_vi_gian_hang==1)
                            <td>Tất cả gian hàng đang hoạt động</td>
                                @elseif($value->pham_vi_gian_hang==2)
                            <td>Tất cả gian hàng đang hoạt động và đã trả tiền</td>
                                @else
                            <td>Khác</td>
                                @endif

                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Import CSV</td>
                            <td>{{ $value->import_csv }}</td>
                        </tr>
                        <tr >
                            <td bgcolor="#57ffdb">Không hiển thị với các gian hàng</td>
                            <td>{{ $value->khong_hien_thi_voi_cac_gian_hang }}</td>
                        </tr>
                    </table>

                    </center>
                    @endforeach
                </div>
            </div>
        </center>
    </div>

    @endsection
