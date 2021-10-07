@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Thành viên
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
                    <a href="{{route('quantri.user.create')}}" class="btn btn-info">Thêm mới</a>
                </div>
                <div>
                    <form action="{{route('quantri.user.search')}}" method="GET" class="sidebar-form">
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
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th>Avatar</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>0{{$item->phone}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>
                                            @if($item->role == 1)
                                                Admin
                                            @elseif(($item->role == 2))
                                                Quản lý
                                            @else
                                                User
                                            @endif
                                        </td>
                                        <td>{{($item->active == 1) ? 'Hoạt động' : 'Chặn'}}</td>
                                        <td>
                                            @if($item->avatar)
                                                <img src="{{asset($item->avatar)}}" width="200">
                                            @endif
                                        </td>

                                        <td>
{{--                                            <a href="{{route('quantri.user.change.password',[$item->id])}}" class="btn btn-danger">Đổi mật khẩu</a>--}}
                                            <a href="{{route('quantri.user.edit',[$item->id])}}" class="btn btn-info">Sửa thông tin</a>
                                            <a href="{{route('quantri.user.delete',['id'=>$item->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>
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
