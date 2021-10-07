@extends('admin.layout.main')
@section('content')

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin Cá Nhân</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.update.password.profile')}}" method="post" enctype="multipart/form-data">
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
                            <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="old_password">
                            @if($errors->has('old_password'))
                                <tr>{{$errors->first('old_password')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password"  >
                            @if($errors->has('password'))
                                <tr>{{$errors->first('password')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="re_password"  >
                            @if($errors->has('re_password'))
                                <tr>{{$errors->first('re_password')}}</tr>
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
