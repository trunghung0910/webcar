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
            <form action="{{route('quantri.car.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;" name="model_id" disabled>
                                <option value="0">--Chọn--</option>
                                @foreach($model as $item)
                                    <option {{ ($data->model_id == $item->id ? 'selected':'') }} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tên ô tô</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <label>ẢNH</label>
                            <input type="file" class="form-control" id="input_img" name="new_image" disabled>
                            @if($data->image)
                                <img src="{{asset($data->image)}}" width="40%" id="output_img" height="200px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="qty" min="0" value="{{$data->qty}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control" name="price" min="0" value="{{$data->price}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" name="color" value="{{$data->color}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tốc độ tối đa</label>
                            <input type="number" class="form-control" name="speed" min="0" value="{{$data->speed}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Động cơ</label>
                            <input type="text" class="form-control" name="engine" value="{{$data->engine}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Dung tích xi lanh</label>
                            <input type="number" class="form-control" name="cylinder_capacity" min="0" value="{{$data->cylinder_capacity}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Công suất</label>
                            <input type="text" class="form-control" name="wattage" value="{{$data->wattage}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Mô men xoắn</label>
                            <input type="text" class="form-control" name="torque" value="{{$data->torque}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Dung tích nhiên liệu</label>
                            <input type="number" class="form-control" name="fuel_capacity" min="0" value="{{$data->fuel_capacity}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nhiên liệu</label>
                            <input type="text" class="form-control" name="fuel" value="{{$data->fuel}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kích thước ô tô (DxRxC)</label>
                            <input type="text" class="form-control" name="size" value="{{$data->size}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Hộp số</label>
                            <input type="text" class="form-control" name="gear" value="{{$data->gear}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số ghế</label>
                            <input type="number" class="form-control" name="seat" min="0" value="{{$data->seat}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ẢNH liên quan</label>
                            <input type="file" class="form-control select2" name="new_images[]"  id="file" multiple="multiple" disabled>
                            <div id="hide_img">
                                @foreach($carImage as $item)
                                    @if($item->image)
                                        <img src="{{asset($item->image)}}" height="200" width="200">
                                    @endif
                                @endforeach
                            </div>
                            <div id="imagePreview"></div>
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
