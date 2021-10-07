@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa hợp đồng
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>
        @if(session('msg_qty'))
            <div class="alert alert-info">
                {{session('msg_qty')}}
            </div>
        @endif
        <div class="box-body">
            <form action="{{route('quantri.bookcar.contract.update',[$booking_car->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tên người mua</label>
                            <input type="text" class="form-control" name="name" placeholder="Mời Bạn Nhập Tiêu Đề Dòng Xe" value="{{$booking_car->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Mời Bạn Nhập Tiêu Đề Dòng Xe" value="{{$booking_car->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Ô tô</label>
                            <input type="text" class="form-control" name="email" placeholder="Mời Bạn Nhập Tiêu Đề Dòng Xe" value="{{$booking_car->car->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Chi phí hợp đồng</label>
                            <input type="text" class="form-control" name="price"  value="{{number_format($booking_car->price)}}VNĐ" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số khung xe</label>
                            <input type="text" class="form-control" name="sokhung"  value="{{$contract->sokhung}}">
                            @if($errors->has('sokhung'))
                                <tr>{{$errors->first('sokhung')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số máy</label>
                            <input type="text" class="form-control" name="somay"  value="{{$contract->somay}}">
                            @if($errors->has('somay'))
                                <tr>{{$errors->first('somay')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control select2" style="width: 100%;" name="status">

                                <option {{$booking_car->status == 1 ? 'selected' : ''}} value="1">Đã đặt cọc</option>
                                <option {{$booking_car->status == 2 ? 'selected' : ''}} value="2">Đã giao xe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File hợp đồng đặt cọc</label>
                            <input type="file" class="form-control" name="file_deposit">
                            @if($contract->file_deposit)
                                <a href="{{asset($contract->file_deposit)}}" target="_blank" style="font-size: 18px;">{{$filename}}</a>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>File hợp đồng giao xe</label>
                            <input type="file" class="form-control" name="file_contract" >

                            @if($errors->has('file_contract'))
                                <tr>{{$errors->first('file_contract')}}</tr>
                            @endif

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh hợp đồng</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" >
                            @if($contract->image)
                                <img src="{{asset($contract->image)}}" width="60%" id="output_img">
                            @endif
                            @if($errors->has('image'))
                                <tr>{{$errors->first('image')}}</tr>
                            @endif
                        </div>
                    </div>



                </div>
            </form>
        </div>

    </div>


    </section>
@endsection
@section('script')
    <script>CKEDITOR.replace( 'editor1' );</script>
@endsection
