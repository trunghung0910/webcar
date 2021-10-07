@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh sách đặt hẹn mua ô tô
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
                    <form action="{{route('quantri.bookcar.search')}}" method="GET" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu-khoa" class="form-control" placeholder="Search..." value="{{isset($keyword) ? $keyword : ''}}">
                            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                </div>
                <div style="margin-left: 10px;">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Sắp xếp theo
                            <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ request()->fullUrlWithQuery(['orderby' => 'macdinh']) }}">Mặc định</a></li>
                            <li><a href="{{ request()->fullUrlWithQuery(['orderby' => 'chuaxuly']) }}">Chưa xử lý</a></li>
                            <li><a href="{{ request()->fullUrlWithQuery(['orderby' => 'dadatcoc']) }}">Đã đặt cọc</a></li>
                            <li><a href="{{ request()->fullUrlWithQuery(['orderby' => 'dagiaoxe']) }}">Đã giao xe</a></li>
                        </ul>
                    </div>
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
                                @foreach($bookcar as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->note}}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <a href="#" class="btn btn-info">Đã đặt cọc</a>
                                            @elseif($item->status == 2)
                                                <a href="#" class="btn btn-success">Đã giao xe</a>
                                            @else
                                                <a href="#" class="btn btn-default">Chưa xử lý</a>
                                            @endif
                                        </td>
                                        <td>{{number_format($item->price)}} VNĐ</td>

                                        <td>
                                            @if($item->status == 1)
                                                <a href="{{route('quantri.bookcar.contract.edit',['id'=>$item->id])}}" class="btn btn-info">Cập nhật hợp đồng</a>
                                            @elseif($item->status == 0)
                                                <a href="{{route('quantri.bookcar.contract',['id'=>$item->id])}}" class="btn btn-info">Hợp đồng</a>
                                            @endif
                                            @if($item->status == 0 || $item->status == 1)
                                                <a href="{{route('quantri.bookcar.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="container">
                            {{$bookcar->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
@endsection
