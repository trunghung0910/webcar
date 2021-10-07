@extends('frontend.layout.main')
@section('content')


    <section id="new" class="container-fluid">
        <div class="container pt-3">
            <h3>DỊCH VỤ</h3>
            <div class="row mt-5">
                <div class="col-md-6 item-top-new">
                    <a href="{{route('frontend.service.detail',['id'=>$serviceTop->id])}}">
                        <img src="{{asset($serviceTop->image)}}" height="350px"  alt="Cinque Terre">
                    </a>
                </div>
                <div class="col-md-6">
                    <h4>{{$serviceTop->title}}</h4>
                    <p><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($serviceTop->created_at, 'd/m/Y')}}</p>
                    <p>Giá dịch vụ: {{number_format($serviceTop->price)}}VNĐ</p>
                    <p>{{$serviceTop->description}}</p>
                    <a href="{{route('frontend.add.service',['id'=>$serviceTop->id])}}" class="btn btn-info addservice" >Đặt dịch vụ</a>
                    <a href="{{route('frontend.service.detail',['id'=>$serviceTop->id])}}" class="btn btn-danger">Đọc tiếp</a>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5">
        <div class="row">
            @foreach($service as $key =>$item)
            <div class="col-md-4 pb-3">
                <a href="{{route('frontend.service.detail',['id'=>$item->id])}}" style="text-decoration: none;">
                    <div class="item-top-new bd-item-new">
                        <img src="{{asset($item->image)}}" height="200px" alt="Cinque Terre">
                    </div>
                    <div class="item-info-new">
                        <h6 style="color: black;">{{$item->title}}</h6>
                        <p>Giá dịch vụ: {{number_format($item->price)}}VNĐ</p>
                        <a href="{{route('frontend.add.service',['id'=>$item->id])}}" class="btn btn-info addservice">Đặt dịch vụ</a>
                        <p><small><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($item->created_at, 'd/m/Y')}}</small></p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <div>
            {{$service->links()}}
        </div>
    </section>

@endsection



