@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Ô tô
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
                <div class="box-header">
                    <a href="{{route('quantri.car.create')}}" class="btn btn-info">Thêm mới</a>
                </div>
                <div>
                    <form action="{{route('quantri.car.search')}}" method="GET" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu-khoa" class="form-control" placeholder="Search..." value="{{isset($keyword) ? $keyword : ''}}">
                            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                    <form action="{{route('quantri.car.index')}}"  method="GET" >
                        <div>
                            <select name="orderby" class="custom-select orderby" style="margin-left: 10px;" onchange="this.form.submit()">
                                <option {{Request::get('orderby') == "macdinh" || !Request::get('orderby') ?   "selected='selected'" : ""}} value="macdinh" selected="selected">Mặc định</option>
                                <option {{Request::get('orderby') == "saphethang" ? "selected='selected'" : ""}} value="saphethang">Sắp hết hàng</option>
                                <option {{Request::get('orderby') == "hethang" ? "selected='selected'" : ""}} value="hethang">Hết hàng</option>

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
                                    <th>Tên ô tô</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Ảnh</th>
                                    <th>Nội thất</th>
                                    <th>Ngoại thất</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{number_format($item->price)}}VNĐ</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{asset($item->image)}}" width="200">
                                            @endif
                                        </td>
                                        <td><a href="{{route('quantri.incar.index',[$item->id])}}" class="btn btn-danger">Nội thất</a></td>
                                        <td><a href="{{route('quantri.outcar.index',[$item->id])}}" class="btn btn-danger">Ngoại thất</a></td>

                                        <td>
                                            <a href="{{route('quantri.car.show',[$item->id])}}" class="btn btn-danger">Xem</a>
                                            <a href="{{route('quantri.car.edit',[$item->id])}}" class="btn btn-info">Sửa</a>
                                            <a href="{{route('quantri.car.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>

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
