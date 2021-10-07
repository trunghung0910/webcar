<?php

namespace App\Http\Controllers;

use App\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = banner::latest()->paginate(5);
        return view('admin.banner.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = banner::all();
        return view('admin.banner.create',['data'=>$data]);
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
                'name' => 'required|unique:banners|max:255',
                'image' => 'required',
            ],
            [
                'name.required'=>'Tên banner không được để trống',
                'name.unique'=>'Tên banner này đã được sử dụng',
                'image.required'=>'Ảnh không được để trống',
            ]);
        //khởi tạo lớp model
        $banner = new banner();
        $banner->name = $request->input('name');
        $banner->slug = Str::slug($request->input('name'));
        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/banner/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $banner->image = $path_upload.$filename;

        }

        $active = 0;
        if($request->has('active')){//kiem tra is_active co ton tai khong?
            $active = $request->input('active');

        }
        $banner->active = $active;

        $banner->save();

        return redirect()->route('quantri.banner.index')->with('msg','Thêm mới thành công');;
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
        $data = banner::all();
        $banner = banner::findorFail($id);

        return view('admin.banner.edit',[
            'data' => $banner,
            'banner'=> $data
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
        $banner = banner::findorFail($id);
        $request->validate(
            [
                'name' => 'required|max:255|unique:banners,name,'.$banner->id,
            ],
            [
                'name.required'=>'Tên banner không được để trống',
                'name.unique'=>'Tên banner này đã được sử dụng',
            ]);

        $banner->name = $request->input('name');
        $banner->slug = Str::slug($request->input('name'));

        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($banner->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/banner/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $banner->image = $path_upload.$filename;

        }

        $active = 0;
        if($request->has('active')){//kiem tra is_active co ton tai khong?
            $active = $request->input('active');

        }
        $banner->active = $active;

        $banner->save();

        return redirect()->route('quantri.banner.index')->with('msg','Cập nhật thành công');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = banner::destroy($id);
        return redirect()->route('quantri.banner.index')->with('msg','Xóa thành công');
    }
}
