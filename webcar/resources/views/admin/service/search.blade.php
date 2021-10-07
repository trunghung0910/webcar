@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Dịch vụ
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
                    <a href="{{route('quantri.service.create')}}" class="btn btn-info">Thêm mới</a>
                </div>
                <div>
                    <form action="{{route('quantri.service.search')}}" method="GET" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu-khoa" class="form-control" placeholder="Search..." value="{{isset($keyword) ? $keyword : ''}}">
                            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
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
                                    <th>Tiêu đề</th>
                                    <th>Ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{asset($item->image)}}" height="150px" width="200">
                                            @endif
                                        </td>
                                        <td width="400px">{{$item->description}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <a href="{{route('quantri.service.show',[$item->id])}}" class="btn btn-danger">Xem</a>
                                            <a href="{{route('quantri.service.edit',[$item->id])}}" class="btn btn-info">Sửa</a>
                                            <a href="{{route('quantri.service.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="container">
                            {{$service->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
@endsection
