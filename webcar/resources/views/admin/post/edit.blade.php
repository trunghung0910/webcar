@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.post.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.post.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}" >
                            @if($errors->has('title'))
                                <tr>{{$errors->first('title')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" >
                            @if($data->image)
                                <img src="{{asset($data->image)}}" id="output_img" alt="" width="100%" height="300px">
                            @endif
                        </div>


                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <input type="text" class="form-control" name="description" value="{{$data->description}}" >
                            @if($errors->has('description'))
                                <tr>{{$errors->first('description')}}</tr>
                            @endif
                        </div>


                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="editor1" >{{$data->content}}</textarea>
                            @if($errors->has('content'))
                                <tr>{{$errors->first('content')}}</tr>
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
