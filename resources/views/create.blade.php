@extends('layout')
@section('content')
    <div class="card-body">
        <center>
            <div class="card">
                <div class="text-left " style="margin-left: 50px;margin-top: 100px">
                    <div class="row">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="col-4">
                            <h4>Thêm mới chiến dịch gửi tin</h4>
                        </div>
                    </div>
                    <div class="form-group " style="padding-top: 50px">
                        <form action="{{ route('create_process') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-2">
                                    <font style="font-weight: bold">Tiêu đề:</font>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="tieuDe" class="form-control" placeholder="Nhập tên chiến dịch">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Link:</font>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="link" class="form-control" placeholder="Nhập Link tham chiếu của chiến dịch">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Trạng Thái</font>
                                </div>
                                <div class="col-8">
                                    Phiếu tạm
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Nội dung</font>
                                </div>
                                <div class="col-8">
                                    <textarea name="noiDung" class="form-control" placeholder="Nhập nội dung của chiến dịch" data-height="300px"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Hiển thị tới ngày:</font>
                                </div>
                                <div class="col-8">
                                    <input type="datetime-local" name="date" class="form-control" placeholder="Nhập Link tham chiếu của chiến dịch">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Phạm vi</font>
                                </div>
                                <div class="col-8">
                                    Hiển thị trên Zone (để trống  nếu hiển thị trên tất cả Zone)
                                    <textarea name="hienThiTrenZone" class="form-control" placeholder="1,2,3,4,5,6,8,9,10,11,12,13,14,17,18"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">

                                </div>
                                <div class="col-8">
                                    <input type="radio" name="phamVi" value="1" checked="checked">Tất cả các gian hàng đang hoạt động &nbsp;&nbsp;
                                    <input type="radio" name="phamVi" value="2">Tất cả các gian hàng đang hoạt động đã trả tiền &nbsp;&nbsp;
                                    <input type="radio" name="phamVi" value="3">Khác
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    Import CSV
                                    <textarea name="importCSV" class="form-control" placeholder="66911, 549979 , 54445454, 5454545,"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    Không hiển thị với các gian hàng
                                    <textarea name="khongHienThiVoiCacGianHang" class="form-control" placeholder="autotest,autotest59910"></textarea>
                                </div>
                            </div>

                            <br>
                            <div class="text-right" style="margin-right: 250px">
                                <button type="submit" class="btn btn-success" >Gửi</button>
                                <button class="btn btn-success" >Lưu</button>
                                <button type="reset" class="btn btn-success">Bỏ qua</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
    @endsection