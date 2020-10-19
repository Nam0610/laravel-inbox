@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-2">
                    <form action="" method="get">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="" style="background-color: white">
                                <div class="text-white bg-primary">
                                    Tìm kiếm
                                </div>

                                <input type="text" placeholder="Nhập tiêu đề.." name="key">
                                <button type="submit">Tìm kiếm</button>
                                <div class="text-white bg-primary">
                                    Trạng thái
                                </div>
                                <input type="radio" name="status" style="color: #4cff29" value="2">Tất cả
                                <br>
                                <input type="radio" name="status" style="color: #4cff29" value="0">Lưu tạm
                                <br>
                                <input type="radio" name="status" style="color: #4cff29" value="1">Đã gửi
                                <div class="text-white bg-primary">
                                    Lựa chọn hiển thị
                                </div>
                                Số bản ghi:
                                <select name="amount" id="maxRows">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-10">
                    <h4 class="text-secondary">Inbox Campaigns</h4>
                    <div class="text-right">
                        <a href="{{ route('create') }}" class="btn btn-success">+Thêm mới</a>
                    </div>
                    <div id="test">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                            <tr bgcolor="#57ffdb">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Link</th>
                                <th>Trạng thái</th>
                                <th>Nội dung</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($model as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
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
                                        <a href="{{ route('destroy',['id'=>$value->id]) }}"> <i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <nav>
                            <ul class="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var table = '#myTable';
      //  alert(table);
        $('#maxRows').on('change', function () {
            $('.pagination').html('');
            var trnum = 0;
            var maxRows = parseInt($(this).val());
            var totalRows = $(table + ' tbody tr').length;
           // alert(total);
            $(table +' tr:gt(0)').each(function () {
                trnum++;
                if (trnum > maxRows) {
                    $(this).hide()
                }
                if (trnum <= maxRows) {
                    $(this).show()
                }
            });
            if (totalRows > maxRows) {
                var pagenum = Math.ceil(totalRows/maxRows)
                for (var i = 1; i <= pagenum;) {
                    $('.pagination').append('<li data-page="'+i+'">\<span >' + i++ + '<span class="sr-only">(current)</span></span>\</li>').show()
                }
            }
            $('.pagination li:first-child').addClass('active');
            $('.pagination li').on('click', function () {
                var pageNum = $(this).attr('data-page');
                var trIndex = 0;
                $('.pagination li').removeClass('active');
                $(this).addClass('active');
                $(table + 'tr:gt(0)').each(function () {
                    trIndex++;
                    if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum) - maxRows)) {
                        $(this).hide()
                    } else {
                        $(this).show()
                    }
                })
            });
            // $(function () {
            //     $('table tr:eq(0)').prepend('<th>ID</th>');
            //     var id = 0;
            //     $('table tr:gt(0)').each(function () {
            //         id++;
            //         $(this).prepend('<td>' + id + '</td>')
            //     })
            // })
        })
    </script>

@endpush
