<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->paginate(10);
        return view('admin.user.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');

        $user = User::where([
            ['name','like','%'.$keyword.'%']
        ])->paginate(5);

        return view('admin.user.search', [
            'user' => $user,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::all();

        return view('admin.user.create',[
            'data'=>$data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6',
                'phone' => 'required',
            ],
            [
                'name.required'=>'Tên không được để trống',
                'email.required'=>'Email không được để trống',
                'email.unique' => 'Email này đã được sử dụng',
                'password.required'=>'Password không được để trống',
                'password.min'=>'Password phải có ít nhất 6 ký tự',
                'phone.required'=>'Số điện thoại k đc để trống',
            ]);
        //khởi tạo lớp model
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = $request->input('role');

        if($request->hasFile('avatar')){ //kiểm tra xem file image có được chọn hay k
            //get file
            $file = $request->file('avatar');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/user/';
            //upload file
            $request->file('avatar')->move($path_upload,$filename);

            $user->avatar = $path_upload.$filename;

        }

        $active = 0;
        if($request->has('active')){//kiem tra is_active co ton tai khong?
            $active = $request->input('active');
        }
        $user->active = $active;

        $user->save();

        return redirect()->route('quantri.user.index')->with('msg','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::all();
        $user = User::findorFail($id);

        return view('admin.user.edit',[
            'data' => $user,
            'user'=> $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email,'.$user->id,
                'phone' => 'required',
            ],
            [
                'name.required'=>'Tên không được để trống',
                'email.required'=>'Email không được để trống',
                'email.unique'=>'Email này đã được sử dụng',
                'phone.required'=>'Số điện thoại k đc để trống',
            ]);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = $request->input('role');

        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($user->avatar));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/user/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $user->avatar = $path_upload.$filename;

        }

        $active = 0;
        if($request->has('active')){//kiem tra is_active co ton tai khong?
            $active = $request->input('active');

        }
        $user->active = $active;

        $user->save();

        return redirect()->route('quantri.user.index')->with('msg','Cập nhật thành công');
    }

    public function changePassword($id)
    {
        $data = User::all();
        $user = User::findorFail($id);

        return view('admin.user.change-password',[
            'data' => $user,
            'user'=> $data,
        ]);
    }

    public function updatePassWord(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect()->route('quantri.user.index')->with('msg','Cập nhật thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return redirect()->route('quantri.user.index')->with('msg','Xóa thành công');
    }
}
