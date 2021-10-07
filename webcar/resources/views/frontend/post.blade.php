@extends('frontend.layout.main')
@section('content')
    <section id="new" class="container-fluid">
        <div class="container pt-3">
            <h3>TIN TỨC</h3>
            <div class="row mt-5">
                <div class="col-md-6 item-top-new">
                    <a href="{{route('frontend.post.detail',['id'=>$postTop->id])}}">
                        <img src="{{asset($postTop->image)}}" height="350px"  alt="Cinque Terre">
                    </a>
                </div>
                <div class="col-md-6">
                    <h4>{{$postTop->title}}</h4>
                    <p><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($postTop->created_at, 'd/m/Y')}}</p>

                    <p>{{$postTop->description}}</p>
                    <a href="{{route('frontend.post.detail',['id'=>$postTop->id])}}" class="btn btn-danger">Đọc tiếp</a>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5">
        <div class="row">
            @foreach($post as $key =>$item)
                <div class="col-md-4 pb-3">
                    <a href="{{route('frontend.post.detail',['id'=>$item->id])}}" style="text-decoration: none;">
                        <div class="item-top-new bd-item-new">
                            <img src="{{asset($item->image)}}" height="200px" alt="Cinque Terre">
                        </div>
                        <div class="item-info-new">
                            <h6 style="color: black;">{{$item->title}}</h6>
                            <p><small><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($item->created_at, 'd/m/Y')}}</small></p>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
        <div>
            {{$post->links()}}
        </div>
    </section>
@endsection
