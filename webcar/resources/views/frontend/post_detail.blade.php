@extends('frontend.layout.main')
@section('content')
    <section id="new-detail">
        <div class="container-fluid bg-new-detail">
            <div class="container new-detail-title">
                <div class="col-md-8">
                    <h2>{{$post->title}}</h2>
                    <p class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{date_format($post->created_at, 'd/m/Y')}}</p>

                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="img-content">{!! $post->content !!}</div>
                </div>
                <div class="col-md-4 new-hot">
                    <h4>TIN TỨC NỔI BẬT</h4>
                    <ul class="list-group list-group-flush">
                        @foreach($postHot as $key => $item)
                            <li class="list-group-item">
                                <a href="{{route('frontend.post.detail',['id'=>$item->id])}}">
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
