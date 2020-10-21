@extends('layout')
@section('content')
    <div class="card-body">
        <center>
            <div class="card">
                <div class="text-left " style="margin-left: 50px;margin-top: 100px">
                    <div class="row">
                        <div class="col-4">
                            <h4>Đăng ký </h4>
                        </div>
                    </div>
                    <div class="form-group " style="padding-top: 50px">
                        <form action="{{ route('register') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-2">
                                    <font style="font-weight: bold">Tên </font>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Nhập tên ">
                                    @error('name')
                                    <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-2">
                                    <font style="font-weight: bold">Email</font>
                                </div>
                                <div class="col-8">
                                    <input type="email" name="email" class="form-control"
                                           placeholder="Nhập email">
                                    @error('email')
                                    <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                    <div class="row" style="padding-top: 20px">
                        <div class="col-2">
                            <font style="font-weight: bold">Password</font>
                        </div>
                        <div class="col-8">
                            <input name="password" class="form-control" placeholder="Nhập password" type="password">
                            @error('password')
                            <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="text-right" style="margin-right: 250px">
                        <button type="submit" class="btn btn-success">Gửi</button>
                        <button class="btn btn-success">Lưu</button>
                        <button type="reset" class="btn btn-success">Bỏ qua</button>
                    </div>
                    </form>
                </div>
            </div>
        </center>
    </div>
    </center>
    </div>
@endsection
