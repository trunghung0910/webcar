@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Chi tiết dịch vụ
        </h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>-->
    </section>
    <div class="col-xs-12">
        <div class="box">
            <div class="row">


            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                @if(session('msg'))
                                    <tr>{{session('msg')}}</tr>
                                @endif
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Image</th>
                                    <th>Giá</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{asset($item->image)}}" width="200">
                                            @endif
                                        </td>
                                        <td>{{number_format($item->price)}} VNĐ</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        {{--                        <div class="container">--}}
                        {{--                            {{$data->links()}}--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
@endsection
