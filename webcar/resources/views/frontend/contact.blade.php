@extends('frontend.layout.main')
@section('content')
    <section id="contact">
        <div class="container-fluid p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2034039271252!2d105.79597481460432!3d20.984482086022407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc696073dd9%3A0x6dce4502afe3e1!2zNTQgUGjhu5EgVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1614845325788!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="container pt-3">
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

                </div>

            </div>
        </div>
    </section>
@endsection
