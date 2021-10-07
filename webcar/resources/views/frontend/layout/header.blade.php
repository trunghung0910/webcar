<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);

    }

</script>
<section id="header" class="container-fluid">
    <section class="container top-info">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item"><img src="/frontend/image/toyotahungviet.png" alt="" style="width: 150px;"></li>
            <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i><span> Số 54 Triều Khúc, Thanh Xuân, Hà Nội</span></li>
            <li class="list-group-item"><div>
                    <i class="fa fa-phone" aria-hidden="true"></i> Phòng bán hàng
                </div><div><p>0395139875</p></div></li>
            <li class="list-group-item"><div>
                    <i class="fa fa-phone" aria-hidden="true"></i> Tư vấn dịch vụ
                </div><div><p>0395139875</p></div></li>
            <li class="list-group-item"><img src="/frontend/image/toyotalogo.jfif" alt="" style="width: 200px;"></li>
        </ul>

    </section>
    <section class="container-fluid bg-dark top-nav">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark container">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('frontend')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.about')}}">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.car')}}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.service')}}">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.post')}}">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.contact')}}">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.list.service')}}">Đặt dịch vụ</a>
                </li>
                <li class="nav-item dropdown">
                    @if(Auth::check())
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('frontend.get.logout')}}">Đăng xuất</a>
                            <a class="dropdown-item" href="{{route('frontend.get.change.password')}}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="{{route('frontend.get.change.profile')}}">Thay đổi thông tin cá nhân</a>
                        </div>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Tài khoản
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('frontend.get.register')}}">Đăng ký</a>
                            <a class="dropdown-item" href="{{route('frontend.get.login')}}">Đăng nhập</a>
                        </div>
                    @endif
                </li>

                    <form class="form-inline" method="get" action="{{route('frontend.search')}}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="tu-khoa" aria-label="Search">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                    </form>

            </ul>
        </nav>
    </section>
</section>
