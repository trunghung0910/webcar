@extends('admin.layout.main')
@section('content')

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin Cá Nhân</h3>
            <a href="{{route('quantri.change.password.profile')}}" class="btn btn-default btn-info pull-right">Đổi mật khẩu</a>
        </div>



        <div class="box-body">
            <form action="{{route('quantri.update.profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        @if(session('msg'))
                            <div class="alert alert-info">
                                {{session('msg')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" >
                            @if($errors->has('email'))
                                <tr>{{$errors->first('email')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" value="0{{Auth::user()->phone}}" >
                            @if($errors->has('phone'))
                                <tr>{{$errors->first('phone')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" >
                            @if($errors->has('address'))
                                <tr>{{$errors->first('address')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" >
                            @if(Auth::user()->avatar)
                                <img src="{{asset(Auth::user()->avatar)}}" id="output_img" alt="" width="100%" height="300px">
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
