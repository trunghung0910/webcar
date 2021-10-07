@extends('admin.layout.main')
@section('content')


    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.outcar.store',[$car_id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tên ngoại thất</label>
                            <input type="text" class="form-control" name="name" placeholder="Mời Bạn Nhập Tên Ngoại thất" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" placeholder="Mời Bạn Nhập Mô tả" name="description"></textarea>
                            @if($errors->has('description'))
                                <tr>{{$errors->first('description')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" name="image" id="input_img" placeholder="">
                            <img src="{{asset('uploads/no_image.jpg')}}" id="output_img" alt="" width="100%" height="300px">
                            @if($errors->has('image'))
                                <tr>{{$errors->first('image')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-primary">reset</button>
                        </div>

                    </div>
                    <!-- /.col -->

                </div>
            </form>
        </div>

    </div>


@endsection

@section('script')
    <script>CKEDITOR.replace( 'editor1' );</script>
@endsection
