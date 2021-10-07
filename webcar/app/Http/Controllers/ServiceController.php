<?php

namespace App\Http\Controllers;


use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = service::latest()->paginate(10);
        return view('admin.service.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);


        $service = service::where([
            ['title','like','%'.$keyword.'%']
        ])->orWhere([
            ['slug','like','%'.Str::slug($keyword). '%']
        ])->paginate(5);

        return view('admin.service.search', [
            'service' => $service,

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
        $data = service::all();

        return view('admin.service.create',[
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
                'title' => 'required|unique:services|max:100',
                'image' => 'required',
                'price' => 'required',
                'description' => 'required|max:200',
                'content' => 'required',

            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'title.unique'=>'Tiêu đề này đã được sử dụng',
                'image.required'=>'Ảnh không được để trống',
                'price.required'=>'Giá dịch vụ không được để trống',
                'description.required'=>'Mô tả ngắn không được để trống',
                'content.required'=>'Nội dung không được để trống',
            ]);
        //khởi tạo lớp model
        $service = new service();
        $service->title = $request->input('title');
        $service->slug = Str::slug($request->input('title'));
        $service->price = $request->input('price');
        $service->description = $request->input('description');
        $service->content = $request->input('content');


        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/service/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $service->image = $path_upload.$filename;

        }
        $service->save();

        return redirect()->route('quantri.service.index')->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = service::all();
        $service = service::findorFail($id);

        return view('admin.service.show',[
            'data' => $service,
            'post'=> $data,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = service::all();
        $service = service::findorFail($id);

        return view('admin.service.edit',[
            'data' => $service,
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
        $service = service::findorFail($id);
        $request->validate(
            [
                'title' => 'required|max:255|unique:services,title,'.$service->id,
                'price' => 'required',
                'description' => 'required|max:200',
                'content' => 'required',

            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'title.unique'=>'Tiêu đề này đã được sử dụng',
                'price.required'=>'Giá dịch vụ không được để trống',
                'description.required'=>'Mô tả ngắn không được để trống',
                'content.required'=>'Nội dung không được để trống',
            ]);

        $service->title = $request->input('title');
        $service->slug = Str::slug($request->input('title'));
        $service->price = $request->input('price');
        $service->description = $request->input('description');
        $service->content = $request->input('content');



        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($service->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/service/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $service->image = $path_upload.$filename;

        }



        $service->save();

        return redirect()->route('quantri.service.index')->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = service::destroy($id);
        return redirect()->route('quantri.service.index')->with('msg','Xóa thành công');
    }
}
