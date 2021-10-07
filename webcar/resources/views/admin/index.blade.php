@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$car}}</h3>

                        <p>Ô tô</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('quantri.car.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$service}}</h3>

                        <p>Dịch vụ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('quantri.service.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$user}}</h3>

                        <p>Thành viên</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('quantri.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$post}}</h3>

                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('quantri.post.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container1"></div>

                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container2"></div>

                    </figure>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->


    </section>



@endsection
@section('script')
    <script>
        // Create the chart
        Highcharts.chart('container1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu dịch vụ ngày và tháng {{date('m-Y')}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Doanh thu ngày",
                            y: {{$moneyDayService}},
                            drilldown: "Doanh thu ngày"
                        },
                        {
                            name: "Doanh thu tháng",
                            y: {{$moneyMonthService}},
                            drilldown: "Doanh thu tháng"
                        },
                    ]
                }
            ]
        });

        // Create the chart
        Highcharts.chart('container2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu ô tô ngày và tháng {{date('m-Y')}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Doanh thu ngày",
                            y: {{$moneyDayCar}},
                            drilldown: "Doanh thu ngày"
                        },
                        {
                            name: "Doanh thu tháng",
                            y: {{$moneyMonthCar}},
                            drilldown: "Doanh thu tháng"
                        },
                    ]
                }
            ]
        });
    </script>
@stop
