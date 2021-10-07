@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.user.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.user.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tên thành viên</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$data->email}}" >
                            @if($errors->has('email'))
                                <tr>{{$errors->first('email')}}</tr>
                            @endif
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Password</label>--}}
{{--                            <input type="password" class="form-control" name="password"  value="{{$data->password}}">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" value="0{{$data->phone}}" >
                            @if($errors->has('phone'))
                                <tr>{{$errors->first('phone')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{$data->address}}" >

                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control select2" style="width: 100%;" name="role">
                                <option value="{{$data->role}}" selected>
                                    @if($data->role == 1)
                                        Admin
                                    @elseif(($data->role == 2))
                                        Quản lý
                                    @else
                                        User
                                    @endif
                                </option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                                <option value="2">Quản lý</option>
                            </select>
                        </div>
                        <div class="form-group">

                            <input {{ ($data->active == 1) ? 'checked' : '' }} type="checkbox" name="active" value="1">
                            <label>Trạng Thái</label>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" >
                            @if($data->avatar)
                                <img src="{{asset($data->avatar)}}" id="output_img" alt="" width="100%" height="300px">
                            @endif
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>

                    </div>

                    <!-- /.col -->

                </div>
            </form>
        </div>

    </div>


    </section>
@endsection
@section('script')
    <script>CKEDITOR.replace( 'editor1' );</script>
@endsection
