@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.service.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.service.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tên người liên hệ</label>
                            <input type="text" class="form-control" name="title" value="{{$data->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="title" value="{{$data->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="title" value="{{$data->phone}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="title" value="{{$data->address}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control"  name="content" rows="20" readonly>{{$data->content}}</textarea>
                        </div>

                    </div>

                    <!-- /.col -->

                </div>
            </form>
        </div>

    </div>


    </section>
@endsection

