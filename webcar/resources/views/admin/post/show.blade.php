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
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" name="new_image" disabled>
                            @if($data->image)
                                <img src="{{asset($data->image)}}" width="100%" height="300px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <input type="text" class="form-control" name="description" value="{{$data->description}}" disabled>
                        </div>



                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="editor1" readonly>{{$data->content}}</textarea>
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
