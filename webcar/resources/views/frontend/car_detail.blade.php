@extends('frontend.layout.main')
@section('content')
    <section id="banner" class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <?php $i=0; ?>
                @foreach($banner as $item)
                    <li data-target="#demo" data-slide-to="{{$i}}"
                        @if($i == 0)
                        class="active"
                        @endif
                    ></li>
                    <?php $i++; ?>
                @endforeach
            </ul>
            <div class="carousel-inner">
                <?php $i=0; ?>
                @foreach($banner as $item)
                    <div
                        @if($i == 0)
                        class="carousel-item active"
                        @else
                        class="carousel-item"
                        @endif
                    >
                        <?php $i++; ?>
                        <img src="{{asset($item->image)}}" alt="" >
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <section class="container mt-4">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#tong-quan">TỔNG QUAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#thong-so-ky-thuat">THÔNG SỐ KỸ THUẬT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#ngoai-that">NGOẠI THẤT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#noi-that">NỘI THẤT</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-3">
            <div class="tab-pane container active" id="tong-quan">
                <div class="row">
                    <div class="col-md-5">
                        <h4>{{$car->name}}</h4>
                        <p>Màu: <span>{{$car->color}}</span></p>
                        <h5>Giá:<span class="car-price">{{number_format($car->price)}}</span>VNĐ</h5>
                        <a href="{{route('frontend.book.car',['id'=> $car->id])}}" class="btn btn-danger">Đặt mua ô tô</a>
                    </div>
                    <div class="col-md-7 fotorama" data-nav="thumbs" data-width="100%">
                        @foreach($carImage as $item)
                        <img src="{{asset($item->image)}}" width="200px">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="thong-so-ky-thuat">
                <table class="table table-inverse">
                    <thead>
                    <tr>
                        <th>Động cơ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tốc độ tối đa ( km/h )</td>
                        <td>{{$car->speed}}</td>
                    </tr>
                    <tr>
                        <td>Loại động cơ</td>
                        <td>{{$car->engine}}</td>
                    </tr>
                    <tr>
                        <td>Dung tích xy lanh ( cc )</td>
                        <td>{{$car->cylinder_capacity}}</td>
                    </tr>
                    <tr>
                        <td>Công suất tối đa ( KW (HP)/ vòng/phút )</td>
                        <td>{{$car->wattage}}</td>
                    </tr>
                    <tr>
                        <td>Mô men xoắn tối đa ( Nm @ vòng/phút )</td>
                        <td>{{$car->torque}}</td>
                    </tr>
                    <tr>
                        <td>Dung tích bình nhiên liệu ( L )</td>
                        <td>{{$car->fuel_capacity}}</td>
                    </tr>
                    <tr>
                        <td>Nhiên liệu</td>
                        <td>{{$car->fuel}}</td>
                    </tr>

                    </tbody>
                    <thead>
                    <tr>
                        <th>Kích thước ((D x R x C)/(mm))</th>
                        <td>{{$car->size}}</td>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <th>Hộp số</th>
                        <td>{{$car->gear}}</td>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <th>Số chỗ ngồi</th>
                        <td>{{$car->seat}} chỗ</td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane container fade" id="ngoai-that">
                @if(isset($outCarTop))
                <div class="row">
                    <div class="col-md-8 item-top-new">
                        <a href="{{asset($outCarTop->image)}}" data-fancybox="galleryoutcar" data-caption="{{$outCarTop->name}}" data-width="2048" data-height="1365"><img src="{{asset($outCarTop->image)}}" height="400px" alt="Cinque Terre"></a>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$outCarTop->name}}</h5>
                        <small>{{$outCarTop->description}}</small>
                    </div>
                </div>
                @endif
                @if(isset($outCar))
                <div class="row mt-5">
                    @foreach($outCar as $key => $item)
                    <div class="col-md-3 pb-3">
                        <div class="item-top-new">
                            <a href="{{asset($item->image)}}" data-fancybox="galleryoutcar" data-caption="{{$item->name}}" data-width="2048" data-height="1365"><img class="img-thumbnail" src="{{asset($item->image)}}"  alt="Cinque Terre"></a>
                        </div>
                        <div>
                            <h5>{{$item->name}}</h5>
                            <small>{{$item->description}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
                    @endif
            </div>
            <div class="tab-pane container fade" id="noi-that">
                @if(isset($inCarTop))
                <div class="row">
                    <div class="col-md-8 item-top-new">
                        <a href="{{asset($inCarTop->image)}}" data-fancybox="gallery" data-caption="{{$inCarTop->name}}" data-width="2048" data-height="1365"><img src="{{asset($inCarTop->image)}}" height="400px" alt="Cinque Terre"></a>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$inCarTop->name}}</h5>
                        <small>{{$inCarTop->description}}</small>
                    </div>
                </div>
                @endif
                @if(isset($inCar))
                <div class="row mt-5">
                    @foreach($inCar as $key => $item)
                    <div class="col-md-3 pb-3">
                        <div class="item-top-new">
                            <a href="{{asset($item->image)}}" data-fancybox="gallery" data-caption="{{$item->name}}" data-width="2048" data-height="1365"><img class="img-thumbnail" src="{{asset($item->image)}}"  alt="Cinque Terre"></a>
                        </div>
                        <div>
                            <h5>{{$item->name}}</h5>
                            <small>{{$item->description}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
                    @endif
            </div>
        </div>
    </section>
@endsection

