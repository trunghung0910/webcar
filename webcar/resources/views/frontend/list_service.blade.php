@extends('frontend.layout.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h3>Danh sách dịch vụ</h3>
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên dịch vụ</th>
                        <th>Hình ảnh</th>
                        <th>Giá dịch vụ</th>
                        <th>Quản lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($service as $key => $item)
                        <form action="" method="post" >
                            @csrf
                            <tr class="tr_text">
                                <td>{{$i}}</td>
                                <td>{{$item->name}}</td>
                                <td><img src="{{asset($item->options->image)}}" alt="" style="width: 100px"></td>
                                <td>{{number_format($item->price)}}VNĐ</td>
                                <td>
                                    <a href="{{route('frontend.delete.service',['id' => $key])}}"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('bạn có muốn xóa không')"><i class="fa fa-trash"></i></button></a>
                                </td>
                        </form>
                        <?php $i++;?>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="float-right">
                    <p>Tổng tiền: {{\Cart::subtotal(0)}} VND</p>
                    <a href="{{route('frontend.book.service')}}" class="btn btn-info">Đặt hẹn dịch vụ</a>
                </div>
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


@endsection
