@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.banner.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.banner.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">

                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                        @if($errors->has('name'))
                            <tr>{{$errors->first('name')}}</tr>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>ẢNH</label>
                        <input type="file" class="form-control" id="input_img" name="new_image" >
                        @if($data->image)
                            <img src="{{asset($data->image)}}" id="output_img" width="100%" height="200px">
                        @endif
                    </div>

                    <div class="form-group">
                        <input {{ ($data->active == 1) ? 'checked' : '' }} type="checkbox" name="active" value="1">
                        <label>Trạng Thái</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>

                    </div>

                </div>
                <!-- /.col -->
            </form>
        </div>

    </div>


    </section>
@endsection
