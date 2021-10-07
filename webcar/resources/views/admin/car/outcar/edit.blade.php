@extends('admin.layout.main')
@section('content')


    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.outcar.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tên ngoại thất</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" placeholder="Mời Bạn Nhập Mô tả" name="description">{{$data->description}}</textarea>
                            @if($errors->has('description'))
                                <tr>{{$errors->first('description')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" >
                            @if($data->image)
                                <img src="{{asset($data->image)}}" id="output_img" alt="" width="100%" height="300px">
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
