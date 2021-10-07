<?php

namespace App\Http\Controllers;


use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = post::latest()->paginate(10);
        return view('admin.post.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);


        $post = post::where([
            ['title','like','%'.$keyword.'%']
        ])->orWhere([
            ['slug','like','%'.Str::slug($keyword). '%']
        ])->paginate(5);

        return view('admin.post.search', [
            'post' => $post,

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
        $data = post::all();

        return view('admin.post.create',[
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
                'title' => 'required|unique:posts|max:100',
                'image' => 'required',
                'description' => 'required|max:200',
                'content' => 'required',
            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'title.unique'=>'Tiêu đề này đã được sử dụng',
                'image.required'=>'Ảnh không được để trống',
                'description.required'=>'Mô tả ngắn không đươc để trống',
                'content.required'=>'Nội dung không được để trống',
            ]);
        //khởi tạo lớp model
        $post = new post();
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->description = $request->input('description');
        $post->content = $request->input('content');


        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/post/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $post->image = $path_upload.$filename;

        }
        $post->save();

        return redirect()->route('quantri.post.index')->with("msg","Thêm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = post::all();
        $post = post::findorFail($id);

        return view('admin.post.show',[
            'data' => $post,
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
        $data = post::all();
        $post = post::findorFail($id);

        return view('admin.post.edit',[
            'data' => $post,
            'post'=> $data,
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
        $article = post::findorFail($id);
        $request->validate(
            [
                'title' => 'required|max:100|unique:posts,title,'.$article->id,
                'description' => 'required|max:200',
                'content' => 'required',
            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'title.unique'=>'Tiêu đề này đã được sử dụng',
                'description.required'=>'Mô tả ngắn không đươc để trống',
                'content.required'=>'Nội dung không được để trống',
            ]);
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->description = $request->input('description');
        $article->content = $request->input('content');



        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($article->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/post/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $article->image = $path_upload.$filename;

        }



        $article->save();

        return redirect()->route('quantri.post.index')->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::destroy($id);
        return redirect()->route('quantri.post.index')->with('msg','Xóa thành công');
    }
}
