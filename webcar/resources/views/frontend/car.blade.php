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
    <section id="oto" class="container mt-3">
        <div class="row">
            <div class="col-md-3 ">
                <div>
                    <h3 class="text-center text-info ">Dòng xe</h3>
                    <div class="list-group">
                        @foreach($model as $item)
                        <a href="{{route('frontend.model',['slug'=>$item->slug])}}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="mt-2">
                    <div id="select-gia">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#collapseOne">
                                <a class="card-link" >
                                    Giá
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#select-gia">
                                <ul class="list-group select-price">
                                    <li class="list-group-item list-group-item-action {{Request::get('price') == 1 ? "active" : ""}}"><a href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 300 Triệu</a></li>
                                    <li class="list-group-item list-group-item-action {{Request::get('price') == 2 ? "active" : ""}}"><a href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">300 - 500 Triệu</a></li>
                                    <li class="list-group-item list-group-item-action {{Request::get('price') == 3 ? "active" : ""}}"><a href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">500 - 1 Tỷ</a></li>
                                    <li class="list-group-item list-group-item-action {{Request::get('price') == 4 ? "active" : ""}}"><a href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">Trên 1 Tỷ</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-info">Tất cả ô tô</h3>
                    </div>
                    <div class="col-md-8">
                        <form id="form_order" method="get">
                            <div class="form-group row justify-content-end">
                                <label for="inputEmail3" class="col-sm-3 col-form-label pr-0 sapxep">Sắp xếp theo:</label>
                                <div class="col-sm-4 pl-0">
                                    <select name="orderby" class="custom-select orderby" onchange="this.form.submit()">
                                        <option {{Request::get('orderby') == "macdinh" || !Request::get('orderby') ?   "selected='selected'" : ""}} value="macdinh" selected="selected">Mặc định</option>
                                        <option {{Request::get('orderby') == "desc" ? "selected='selected'" : ""}} value="desc">Mới nhất</option>
                                        <option {{Request::get('orderby') == "price_asc" ? "selected='selected'" : ""}} value="price_asc">Giá tăng dần</option>
                                        <option {{Request::get('orderby') == "price_desc" ? "selected='selected'" : ""}} value="price_desc">Giá giảm dần</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Item car -->
                <div class="row">
                    @foreach($car as $item)
                    <div class="col-md-4 pb-2">
                        <div class="card" style="width:100%">
                            <img class="card-img-top" src="{{asset($item->image)}}" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title h4-oto">{{$item->name}}</h4>
                                <p class="card-text">Giá:<b class="pl-1">{{number_format($item->price)}} VNĐ</b></p>
                                <p>Nhiên liệu: <span class="pl-1">{{$item->fuel}}</span></p>
                                <p>Số chố ngồi: <span class="pl-1">{{$item->seat}} chỗ</span></p>
                                <p>Dung tích: <span class="pl-1">{{$item->cylinder_capacity}} cc</span></p>
                                <a href="{{route('frontend.car.detail',['id'=>$item->id])}}" class="btn btn-danger stretched-link mt-3">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div >
                        {{$car->links()}}
                </div>
            </div>

        </div>

    </section>
@endsection


