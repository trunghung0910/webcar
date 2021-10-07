<?php

namespace App\Http\Controllers;


use App\models;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = models::latest()->paginate(10);
        return view('admin.model.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);


        $model = models::where([
            ['name','like','%'.$keyword.'%']
        ])->orWhere([
            ['slug','like','%'.Str::slug($keyword). '%']
        ])->paginate(5);

        return view('admin.model.search', [
            'service' => $model,
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
        $data = models::all();

        return view('admin.model.create',[
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
                'name' => 'required|unique:models|max:100',
                'image' => 'required',
            ],
            [
                'name.required'=>'Tên dòng xe không được để trống',
                'name.unique'=>'Tên dòng xe này đã được sử dụng',
                'image.required'=>'Ảnh không được để trống',
            ]);
        //khởi tạo lớp model
        $model = new models();
        $model->name = $request->input('name');
        $model->slug = Str::slug($request->input('name'));



        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/model/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $model->image = $path_upload.$filename;

        }
        $model->save();

        return redirect()->route('quantri.model.index');
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
        $data = models::all();
        $model = models::findorFail($id);

        return view('admin.model.edit',[
            'data' => $model,
            'service'=> $data,
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
        $model= models::findorFail($id);
        $request->validate(
            [
                'name' => 'required|max:100|unique:models,name,'.$model->id,
            ],
            [
                'name.required'=>'Tên dòng xe không được để trống',
                'name.unique'=>'Tên dòng xe này đã được sử dụng',
            ]);
        $model->name = $request->input('name');
        $model->slug = Str::slug($request->input('name'));

        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($model->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/model/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $model->image = $path_upload.$filename;

        }



        $model->save();

        return redirect()->route('quantri.model.index')->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = models::destroy($id);
        return redirect()->route('quantri.model.index')->with('msg','Xóa thành công');
    }
}
