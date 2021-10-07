<?php

namespace App\Http\Controllers;

use App\banner;
use App\car;
use App\car_img;
use App\contact;
use App\in_car;
use App\models;
use App\out_car;
use App\post;
use App\service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $banner = banner::where('active',1)->get();
        $model = models::orderBy('name', 'DESC')->get();
        $service = service::latest()->limit(4)->get();
        $post = post::latest()->limit(3)->get();

        $list = [];
        foreach ($model as $key => $item){
            $ids = $item->id;
            $list[$key]['model'] = $item;
            $list[$key]['car'] = car::where('model_id',$ids)
                ->orderBy('price','ASC')
                ->first();
        }

        return view('frontend.index',[
            'banner' => $banner,
            'service' => $service,
            'post' => $post,
            'list' => $list,
        ]);
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function postContact(Request $request){
        $contact = new contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->content = $request->input('content');
        $contact->status = 0;
        $contact->save();

        return redirect()->back()->with('alert_contact','Gửi liên hệ thành công');
    }

    public function car(Request $request){
        $banner = banner::where('active',1)->get();
        $model = models::orderBy('name','DESC')->get();
        $car = car::whereNotNull('name');

        if($request->price){
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $car->where('price','<',300000000);
                    break;
                case '2':
                    $car->whereBetween('price',[300000000,500000000]);
                    break;
                case '3':
                    $car->whereBetween('price',[500000000,1000000000]);
                    break;
                case '4':
                    $car->where('price','>',1000000000);
                    break;
            }
        }
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'desc':
                    $car->orderBy('id','DESC');
                    break;
                case 'price_asc':
                    $car->orderBy('price','ASC');
                    break;
                case 'price_desc':
                    $car->orderBy('price','DESC');
                    break;
                default:
                    $car->orderBy('name','DESC');
            }
        }

        $car = $car->paginate(6);





        return view('frontend.car',[
            'banner' => $banner,
            'car' => $car,
            'model' => $model,
        ]);
    }

    public function model(Request $request,$slug){
        $banner = banner::where('active',1)->get();
        $model = models::where(['slug' => $slug])->first();
            $allmodel = models::orderBy('name','DESC')->get();
            $ids = [];
            foreach ($allmodel as $key => $allmodels){
                if($allmodels->id == $model->id){
                    $ids['model_id'] = $model->id;
                }
            }
            $car = car::where(['model_id' => $ids]);

        if($request->price){
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $car->where('price','<',300000000);
                    break;
                case '2':
                    $car->whereBetween('price',[300000000,500000000]);
                    break;
                case '3':
                    $car->whereBetween('price',[500000000,1000000000]);
                    break;
                case '4':
                    $car->where('price','>',1000000000);
                    break;
            }
        }
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'desc':
                    $car->orderBy('id','DESC');
                    break;
                case 'price_asc':
                    $car->orderBy('price','ASC');
                    break;
                case 'price_desc':
                    $car->orderBy('price','DESC');
                    break;
                default:
                    $car->orderBy('name','DESC');
            }
        }

        $car = $car->paginate(6);







        return view('frontend.model',[
            'banner' => $banner,
            'car' => $car,
            'allmodel' => $allmodel,
            'model' => $model,
        ]);

    }

    public function carDetail($id){
        $banner = banner::where('active',1)->get();
        $car = car::where('id',$id)->first();
        $carImage = car_img::where('car_id',$id)->get();
        $outCarTop = out_car::where('car_id',$id)->first();
        $outcar = out_car::where('car_id',$id)->skip(1)->take(5)->get();
        $inCarTop = in_car::where('car_id',$id)->first();
        $incar = in_car::where('car_id',$id)->skip(1)->take(5)->get();

        return view('frontend.car_detail',[
            'banner' => $banner,
            'car' => $car,
            'carImage' => $carImage,
            'outCarTop' => $outCarTop,
            'outCar' => $outcar,
            'inCarTop' => $inCarTop,
            'inCar' => $incar,
        ]);
    }

    public function search(Request $request)
    {
        $banner = banner::where('active',1)->get();
        $model = models::orderBy('name','DESC')->get();

            $keyword = $request->input('tu-khoa');
            $slug = Str::slug($keyword);

            $car = car::where([
                ['name','like','%'.$keyword.'%']
            ]);


        if($request->price){
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $car->where('price','<',300000000);
                    break;
                case '2':
                    $car->whereBetween('price',[300000000,500000000]);
                    break;
                case '3':
                    $car->whereBetween('price',[500000000,1000000000]);
                    break;
                case '4':
                    $car->where('price','>',1000000000);
                    break;
            }
        }
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'desc':
                    $car->orderBy('id','DESC');
                    break;
                case 'price_asc':
                    $car->orderBy('price','ASC');
                    break;
                case 'price_desc':
                    $car->orderBy('price','DESC');
                    break;
                default:
                    $car->orderBy('name','DESC');
            }
        }

        $car = $car->paginate(6);

        return view('frontend.search', [
            'banner' => $banner,
            'model' => $model,
            'car' => $car,
            'paginate' => $request->query()
        ]);
    }

    public function service(){
        $serviceTop = service::orderBy('id','DESC')->first();
        $service = service::whereNotIn('id',[$serviceTop->id])->orderBy('id','DESC')->paginate(9);


        return view('frontend.service',[
            'serviceTop' => $serviceTop,
            'service' => $service,
        ]);
    }

    public function serviceDetail($id){
        $service = service::where('id',$id)->first();
        $post = post::orderBy('view','DESC')->limit(4)->get();
        return view('frontend.service_detail',[
            'service' => $service,
            'post' => $post,
        ]);
    }

    public function post(){
        $postTop = post::orderBy('id','DESC')->first();
        $post = post::whereNotIn('id',[$postTop->id])->orderBy('id','DESC')->paginate(9);


        return view('frontend.post',[
            'postTop' => $postTop,
            'post' => $post,
        ]);
    }

    public function postDetail($id){
        $post = post::where('id',$id)->first();
        $postHot = post::orderBy('view','DESC')->limit(4)->get();
        $post->view +=1;
        $post->save();
        return view('frontend.post_detail',[
            'post' => $post,
            'postHot' => $postHot,
        ]);
    }

    public function getRegister(){
        return view('frontend.register');
    }

    public function postRegister(Request $request){
        $request->validate(
            [
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6',

            ],
            [
                'email.required'=>'email k đc để trống',
                'email.unique' => 'email này đã được sử dụng',
                'password.required'=>'password k đc để trống',
                'password.min'=>'password phải có ít nhất 6 ký tự',
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 0;
        $password = $request->password;
        $repassword = $request->repassword;

        if($password == $repassword){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('alert','Đăng ký tài khoản thành công');
        }else{
            return redirect()->back()->with('alert','Mật khẩu không trùng khớp');
        }
    }

    public function getLogin(){
        return view('frontend.login');
    }

    public function postLogin(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,

        ];
        if (Auth::attempt($arr)) {
            $user = Auth::user();
            if( $user->active == 1)
                return redirect()->route('frontend');
            else
                Auth::logout();
                return redirect()->back()->with('alert_user','Tài khoản đã bị chặn');

        }else{
            return redirect()->back()->with('alert_user','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('frontend');
    }

    public function getchangePassword(){
        return view('frontend.change-password');
    }

    public function postchangePassword(Request $request){
        $request->validate(
            [
                'old_password' => 'required|max:255',
                'password' => 'required|min:6',
                're_password' => 'required|same:password',
            ],
            [
                'old_password.required'=>'Mật khẩu cũ không được để trống',
                'password.required'=>'Mật khẩu không được để trống',
                'password.min'=>'Mật khẩu phái có ít nhất 6 ký tự',
                're_password.required'=>'Xác nhận mật khẩu không được để trống',
                're_password.same'=>'Mật khẩu xác nhận không trùng khớp',
            ]);
        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with('alert_pass','Mật khẩu mới không được trùng với mật khấu mới');
        }

        if(Hash::check($request->old_password,Auth::user()->password)){
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with('alert_pass','Đổi mật khẩu thành công');
        }
            return redirect()->back()->with('alert_pass','Mật khẩu cũ không đúng');
    }

    public function getchangeProfile(){
        $user = Auth::user();
        return view('frontend.change_profile',['user' => $user]);
    }

    public function postchangeProfile(Request $request){



        $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();

            return redirect()->back()->with('alert_changeprofile','Cập nhật thông tin thành công');

    }
}
