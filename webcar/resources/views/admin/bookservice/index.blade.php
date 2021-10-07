@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh sách đặt hẹn dịch vụ
        </h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>-->
    </section>
    <div class="col-xs-12">
        <div class="box">
            <div >

                <div>
                    <form action="{{route('quantri.bookservice.search')}}" method="GET" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu-khoa" class="form-control" placeholder="Search..." value="{{isset($keyword) ? $keyword : ''}}">
                            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                    <form action="{{route('quantri.bookservice.index')}}"  method="GET" >
                        <div>
                            <select name="orderby" class="custom-select orderby" style="margin-left: 10px;" onchange="this.form.submit()">
                                <option {{Request::get('orderby') == "macdinh" || !Request::get('orderby') ?   "selected='selected'" : ""}} value="macdinh" selected="selected">Mặc định</option>
                                <option {{Request::get('orderby') == "daxuly" ? "selected='selected'" : ""}} value="daxuly">Đã xử lý</option>
                                <option {{Request::get('orderby') == "chuaxuly" ? "selected='selected'" : ""}} value="chuaxuly">Chưa xử lý</option>

                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                @if(session('msg'))
                                    <div class="alert alert-info">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>0{{$item->phone}}</td>
                                        <td>{{$item->note}}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <a href="#" class="btn btn-success" onclick="return alert('Dịch vụ đã được xử lý');" >Đã xử lý</a>
                                            @else
                                                <a href="{{route('quantri.bookservice.active',['id' => $item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn đã xử lý dịch vụ')">Chờ xử lý</a>
                                            @endif
                                        </td>
                                        <td>{{number_format($item->total_price)}} VNĐ</td>

                                        <td>
                                            <a href="{{route('quantri.bookservice.show',[$item->id])}}" class="btn btn-danger">Xem</a>
                                            @if($item->status == 0)
                                                <a href="{{route('quantri.bookservice.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="container">
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
@endsection
