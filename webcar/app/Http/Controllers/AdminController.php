<?php

namespace App\Http\Controllers;

use App\booking_car;
use App\booking_service;
use App\car;
use App\post;
use App\User;
use App\service;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

        $car = car::sum('qty');
        $service = service::count();
        $user = User::count();
        $post = post::count();
        //Doanh thu ô tô theo ngày
        $moneyDayCar = booking_car::whereDay('updated_at',date('d'))
            ->whereMonth('updated_at',date('m'))
            ->where('status',2)
            ->sum('price');


        //Doanh thu ô tô theo tháng
        $moneyMonthCar = booking_car::whereMonth('updated_at',date('m'))
            ->where('status',2)
            ->sum('price');
        //Doanh thu dịch vụ theo ngày
        $moneyDayService = booking_service::whereDay('updated_at',date('d'))
            ->whereMonth('updated_at',date('m'))
            ->where('status',1)
            ->sum('total_price');

        //Doanh thu dịch vụ theo tháng
        $moneyMonthService = booking_service::whereMonth('updated_at',date('m'))
            ->where('status',1)
            ->sum('total_price');

        return view('admin.index',[
            'car' => $car,
            'service' => $service,
            'user' => $user,
            'post' => $post,
            'moneyDayCar' => $moneyDayCar,
            'moneyMonthCar' => $moneyMonthCar,
            'moneyDayService' => $moneyDayService,
            'moneyMonthService' => $moneyMonthService,
        ]);
    }

    public function profile(){
        return view('admin.profile.index');
    }

    public function  updateProfile(Request $request){
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email,'.Auth::user()->id,
                'phone' => 'required',
            ],
            [
                'name.required'=>'Tên không được để trống',
                'email.required'=>'Email không được để trống',
                'email.unique' => 'Email này đã được sử dụng',
                'phone.required'=>'Số điện thoại k đc để trống',
            ]);

        $profile = User::findorFail(Auth::user()->id);
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');

        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($profile->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/user/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);
            $profile->avatar = $path_upload.$filename;
        }

        $profile->save();

        return redirect()->route('quantri.profile')->with('msg','Cập nhật thành công');
    }

    public function changePasswordProfile(){
        return view('admin.profile.change_password');
    }
    public function updatePasswordProfile(Request $request){
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
            return redirect()->back()->with('msg','Mật khẩu mới không được trùng với mật khấu mới');
        }

        if(Hash::check($request->old_password,Auth::user()->password)){
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with('msg','Đổi mật khẩu thành công');
        }
        return redirect()->back()->with('msg','Mật khẩu cũ không đúng');
    }

    public function getAdminLogin(){
        return view('admin.login');
    }

    public function postAdminlogin(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($arr)) {
            return redirect()->route('quantri.admin');
        }else{
            return redirect()->route('adminlogin')->with('alert','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function getAdminLogout(){
        Auth::logout();
        return redirect()->route('adminlogin');
    }


}
