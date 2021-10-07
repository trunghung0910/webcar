@extends('frontend.layout.main')
@section('content')

    <section id="new-detail">
        <div class="container-fluid bg-new-detail">
            <div class="container new-detail-title">
                <div class="col-md-8">
                    <h2>{{$service->title}}</h2>
                    <p class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($service->created_at, 'd/m/Y')}}</p>
                    <h5>Giá dịch vụ: <span >{{number_format($service->price)}}VNĐ</span> </h5>
                    <a href="{{route('frontend.add.service',['id'=>$service->id])}}" class="btn btn-info addservice">Đặt dịch vụ</a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="img-content">{!! $service->content !!}</div>
                </div>
                <div class="col-md-4 new-hot">
                    <h4>TIN TỨC NỔI BẬT</h4>
                    <ul class="list-group list-group-flush">
                        @foreach($post as $key => $item)
                        <li class="list-group-item">
                            <a href="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{asset($item->image)}}" alt="" width="100%">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>{{$item->title}}</h6>
                                        <small><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($item->created_at, 'd/m/Y')}}</small>
                                        <small><i class="fa fa-eye mr-1" aria-hidden="true"></i>{{$item->view}}</small>

                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
