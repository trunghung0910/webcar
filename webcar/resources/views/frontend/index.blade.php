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
    <section class="container mt-2">
        <h2>Các dòng xe</h2>
        <div class="row">
            <?php
                $list = array_chunk($list,2);
            ?>
                @foreach($list as $key =>$item)
                    @if($key % 2 == 0)
                        @foreach($item as $value)
                            <div class="col-md-6 model-item">
                                <a href="{{route('frontend.model',['slug'=>$value['model']->slug])}}">
                                    <div class="row model-item-size">
                                        <div class="col-md-6 model-bg d-flex flex-wrap align-content-center justify-content-center"><img src="{{asset($value['model']->image)}}" alt=""></div>
                                        <div class="col-md-6 d-flex flex-wrap align-content-center justify-content-center model-info">
                                            <div class="text-center">
                                                <b>{{$value['model']->name}}</b>
                                                @if(isset($value['car']->price))
                                                    <p><small>Giá từ: {{number_format($value['car']->price)}} VNĐ</small></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        @foreach($item as $key1 => $value)
                            <div class="col-md-6 model-item">
                                <a href="{{route('frontend.model',['slug'=>$value['model']->slug])}}">
                                    <div class="row model-item-size">
                                        <div class="col-md-6 d-flex flex-wrap align-content-center justify-content-center model-info">
                                            <div class="text-center">
                                                <b>{{$value['model']->name}}</b>
                                                @if(isset($value['car']->price))
                                                    <p><small>Giá từ: {{number_format($value['car']->price)}} VNĐ</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 model-bg d-flex flex-wrap align-content-center justify-content-center"><img src="{{asset($value['model']->image)}}" alt=""></div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endforeach

        </div>

    </section>
    <section id="service" class="container-fluid mt-5">
        <div class="container">
            <h2 class="text-center">DỊCH VỤ SỬA CHỮA</h2>
            <div class="row mt-5">
                @foreach($service as $item)
                    <div class="col-md-3">
                        <a href="{{route('frontend.service.detail',['id'=>$item->id])}}" class="item-service">
                            <div class="item-service-1">
                                <img src="{{asset($item->image)}}" class="img-thumbnail image_service" style="width: 100%;height: 240px;" >
                                <div class="middle">
                                    <div><i class="fa fa-wrench" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <h5 class="text-center mt-2">{{$item->title}}</h5>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <section id="article" class="container-fluid mt-5">
        <section class="container">
            <h2 class="text-center pt-3	">TIN TỨC</h2>
            <div class="row pt-3">
                @foreach($post as $item)
                    <div class="col-md-4">
                        <a href="{{route('frontend.post.detail',['id'=>$item->id])}}">
                            <div class="item-article">
                                <div class="p-2">
                                    <h6>{{$item->title}}</h6>
                                    <small><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($item->created_at, 'd/m/Y')}}</small>
                                    <p>{{$item->description}}</p>
                                </div>
                                <div class="img-article">
                                    <img src="{{asset($item->image)}}" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </section>
    <section id=contact class="container mt-5">
        <h2 class="text-center">Liên hệ</h2>
        <div class="row">
            <div class="col-md-6">
                <h5 class="h5-contact">CHÀO MỪNG ĐẾN VỚI TOYOTA HƯNG VIỆT</h5>
                <b>Được thành lập bới hai đối tác: Công ty Cổ phần Quản lý Đầu tư và Phát triển (IDMC) và Công ty Toyota Tsusho Cooperation (TTC) - Nhật Bản. Công ty TNHH Toyota Hưng Việt là Đại lý chính thức của Công ty Ôtô Toyota Việt Nam trong lĩnh vực:</b>
                <ul class="pl-3">
                    <li>Bán xe ôtô TOYOTA.</li>
                    <li>Dịch vụ sửa chữa, bảo dưỡng, bảo hành xe TOYOTA.</li>
                    <li>Dịch vụ cung cấp phụ tùng chính hãng TOYOTA.</li>
                </ul>
                <h5>LIÊN HỆ</h5>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i>54 Phố Triều Khúc, Thanh Xuân Nam, Thanh Xuân, Hà Nội</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i>Hotline:0395139875</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i>Email:toyotahungviet@gmail.com</p>
                <p><i class="fa fa-globe" aria-hidden="true"></i>Website:toyotahungviet.com</p>
            </div>
            <div class="col-md-6">


                <form action="{{route('frontend.post.contact')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Họ và tên" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-mobile" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" id="inputEmail3" name="phone" placeholder="Số điện thoại" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="inputEmail3" name="address" placeholder="Địa chỉ" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-comments" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" placeholder="Nội dung" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark offset-1">Gửi</button>
                </form>
                @if(session('alert_contact'))
                    <div class="alert alert-info mt-3">
                        {{session('alert_contact')}}
                    </div>
        @endif
    </section>
@endsection
