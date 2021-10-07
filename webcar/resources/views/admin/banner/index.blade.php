@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Banner
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
                    <a href="{{route('quantri.banner.create')}}" class="btn btn-info">Thêm mới</a>
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
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{asset($item->image)}}" width="200">
                                            @endif
                                        </td>
                                        <td>{{($item->active == 1) ? 'Hiển thị' : 'Ẩn'}}</td>
                                        <td>
                                            <a href="{{route('quantri.banner.edit',['id'=>$item->id])}}" class="btn btn-info">Sửa</a>
                                            <a href="{{route('quantri.banner.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>
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
