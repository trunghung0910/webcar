@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.model.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.model.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Dòng xe</label>
                            <input type="text" class="form-control" name="name" placeholder="Mời Bạn Nhập Tiêu Đề Dòng Xe" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" name="image" id="input_img" placeholder="">
                            @if($errors->has('image'))
                                <tr>{{$errors->first('image')}}</tr>
                            @endif
                            <img src="{{asset('uploads/no_image.jpg')}}" id="output_img" alt="" width="100%" height="300px">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-primary">reset</button>
                        </div>

                    </div>


                </div>
            </form>
        </div>

    </div>


@endsection

@section('script')
    <script>CKEDITOR.replace( 'editor1' );</script>
@endsection
