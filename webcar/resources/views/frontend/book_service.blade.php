@extends('frontend.layout.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8" id="book-service">
                <h3>Thông tin khách hàng</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="inputEmail3" name="name" value="{{Auth::user()->name}}" placeholder="Họ và tên" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="email" class="form-control" id="inputEmail3" name="email" value="{{Auth::user()->email}}" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-mobile" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" id="inputEmail3" name="phone" value="0{{Auth::user()->phone}}" placeholder="Số điện thoại" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="inputEmail3" name="address" value="{{Auth::user()->address}}" placeholder="Địa chỉ" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-comments" aria-hidden="true"></i></label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note" placeholder="Ghi chú" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark offset-1">Gửi</button>
                </form>

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

                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
