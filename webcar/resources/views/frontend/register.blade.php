@extends('frontend.layout.main')
@section('content')
    <section id="contact">
{{--        <div class="container-fluid p-0">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2034039271252!2d105.79597481460432!3d20.984482086022407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc696073dd9%3A0x6dce4502afe3e1!2zNTQgUGjhu5EgVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1614845325788!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--        </div>--}}
        <div class="container pt-3">
                <h4 class="text-center">ĐĂNG KÝ</h4>
                <div class="col-md-6 offset-3">
                    <form action="{{route('frontend.post.register')}}" method="post" enctype="multipart/form-data">
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
                                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="{{old('email')}}" required>
                                @if($errors->has('email'))
                                    <tr>{{$errors->first('email')}}</tr>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-lock" aria-hidden="true"></i></label>
                            <div class="col-sm-11">
                                <input type="password" class="form-control" id="inputEmail3" name="password" placeholder="Password" value="{{old('password')}}" required>
                                @if($errors->has('password'))
                                    <tr>{{$errors->first('password')}}</tr>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fa fa-lock" aria-hidden="true"></i></label>
                            <div class="col-sm-11">
                                <input type="password" class="form-control" id="inputEmail3" name="repassword" placeholder="Nhập lại password" required>
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
                        <button type="submit" class="btn btn-dark offset-1">Đăng ký</button>
                    </form>
                    @if(session('alert'))
                        <div class="alert alert-info mt-3">
                            {{session('alert')}}
                        </div>
                    @endif
                </div>
        </div>
    </section>
@endsection
