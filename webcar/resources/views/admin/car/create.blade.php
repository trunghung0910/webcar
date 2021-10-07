@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{route('quantri.car.index')}}" class="btn btn-primary" >Danh Sách</a>
        </h1>

    </section>

    <!-- Main content -->


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Thông Tin</h3>
        </div>

        <div class="box-body">
            <form action="{{route('quantri.car.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;" name="model_id">
                                <option value="0">--Chọn--</option>
                                @foreach($model as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('model_id'))
                                <tr>{{$errors->first('model_id')}}</tr>
                            @endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tên ô tô</label>
                            <input type="text" class="form-control" name="name" placeholder="Mời Bạn Nhập Tên Ô TÔ" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <tr>{{$errors->first('name')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" name="image" id="input_img" placeholder="">
                            <img src="{{asset('uploads/no_image.jpg')}}" id="output_img" alt="" width="40%" height="200px">
                            @if($errors->has('image'))
                                <tr>{{$errors->first('image')}}</tr>
                            @endif
                        </div>

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="qty" min="0" value="0">
                            @if($errors->has('qty'))
                                <tr>{{$errors->first('qty')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control" name="price" min="0" value="0">
                            @if($errors->has('price'))
                                <tr>{{$errors->first('price')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" name="color" >
                            @if($errors->has('color'))
                                <tr>{{$errors->first('color')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tốc độ tối đa</label>
                            <input type="number" class="form-control" name="speed" min="0" value="0">
                            @if($errors->has('speed'))
                                <tr>{{$errors->first('speed')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Động cơ</label>
                            <input type="text" class="form-control" name="engine" >
                            @if($errors->has('engine'))
                                <tr>{{$errors->first('engine')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Dung tích xi lanh</label>
                            <input type="number" class="form-control" name="cylinder_capacity" min="0" value="0">
                            @if($errors->has('cylinder_capacity'))
                                <tr>{{$errors->first('cylinder_capacity')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Công suất</label>
                            <input type="text" class="form-control" name="wattage" >
                            @if($errors->has('wattage'))
                                <tr>{{$errors->first('wattage')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô men xoắn</label>
                            <input type="text" class="form-control" name="torque" >
                            @if($errors->has('torque'))
                                <tr>{{$errors->first('torque')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Dung tích nhiên liệu</label>
                            <input type="number" class="form-control" name="fuel_capacity" min="0" value="0">
                            @if($errors->has('fuel_capacity'))
                                <tr>{{$errors->first('fuel_capacity')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nhiên liệu</label>
                            <input type="text" class="form-control" name="fuel" >
                            @if($errors->has('fuel'))
                                <tr>{{$errors->first('fuel')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kích thước ô tô (DxRxC)</label>
                            <input type="text" class="form-control" name="size" >
                            @if($errors->has('size'))
                                <tr>{{$errors->first('size')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Hộp số</label>
                            <input type="text" class="form-control" name="gear" >
                            @if($errors->has('gear'))
                                <tr>{{$errors->first('gear')}}</tr>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số ghế</label>
                            <input type="number" class="form-control" name="seat" min="0" value="0">
                            @if($errors->has('seat'))
                                <tr>{{$errors->first('seat')}}</tr>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Media ô tô</label>
                            <input type="file" class="form-control select2" name="images[]" id="file" multiple="multiple">
                            <div id="imagePreview"></div>

                        </div>
                    </div>
                    <div class="col-md-11">

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
