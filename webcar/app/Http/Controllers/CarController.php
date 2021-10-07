<?php

namespace App\Http\Controllers;

use App\car;
use App\car_img;
use App\in_car;
use App\models;
use App\out_car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = car::latest();
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'saphethang':
                    $data->where('qty','<',2);
                    break;
                case 'hethang':
                    $data->where('qty','=',0);
                    break;
                default:
                    $data->orderBy('id','DESC');
            }
        }
        $data = $data->paginate(10);
        return view('admin.car.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);


        $car = car::where([
            ['name','like','%'.$keyword.'%']
        ]);

        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'saphethang':
                    $car->where('qty','<',2);
                    break;
                case 'hethang':
                    $car->where('qty','=',0);
                    break;
                default:
                    $car->orderBy('id','DESC');
            }
        }
        $car = $car->paginate(10);

        return view('admin.car.search', [
            'car' => $car,
            'keyword' => $keyword ? $keyword : '',
            'paginate' => $request->query(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = car::all();
        $model = models::all();
        return view('admin.car.create',[
            'data'=>$data,
            'model'=>$model,
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
                'model_id' => 'required|not_in:0',
                'name' => 'required|unique:cars|max:255',
                'image' => 'required',
                'qty' => 'required|not_in:0',
                'price' => 'required|not_in:0',
                'color' => 'required',
                'speed' => 'required|not_in:0',
                'engine' => 'required',
                'cylinder_capacity' => 'required|not_in:0',
                'wattage' => 'required',
                'torque' => 'required',
                'fuel_capacity' => 'required|not_in:0',
                'fuel' => 'required',
                'size' => 'required',
                'gear' => 'required',
                'seat' => 'required|not_in:0',
            ],
            [
                'model_id.required'=>'Dòng xe không được để trống',
                'model_id.not_in'=>'Dòng xe không được để trống',
                'name.required'=>'Tên xe không được để trống',
                'name.unique'=>'Tên xe này đã được sử dụng',
                'image.required'=>'Ảnh không được để trống',
                'qty.not_in'=>'Số lượng không được để trống',
                'price.not_in'=>'Giá xe không được để trống',
                'color.required'=>'Màu xe không được để trống',
                'speed.not_in'=>'Tốc độ xe không được để trống',
                'engine.required'=>'Động cơ xe không được để trống',
                'cylinder_capacity.not_in'=>'Dung tích xi lanh không được để trống',
                'wattage.required'=>'Công suất xe không được để trống',
                'torque.required'=>'Mô men xoắn không được để trống',
                'fuel_capacity.not_in'=>'Dung tích nhiên liệu không được để trống',
                'fuel.required'=>'Nhiên liệu không được để trống',
                'size.required'=>'Kích thước xe không được để trống',
                'gear.required'=>'Hộp số không được để trống',
                'seat.not_in'=>'Số ghế không được để trống',
            ]);
        //khởi tạo lớp model
        $car = new car();
        $car->name = $request->input('name');
        $car->slug = Str::slug($request->input('name'));
        $car->qty = $request->input('qty');
        $car->price = $request->input('price');
        $car->model_id = $request->input('model_id');
        $car->color = $request->input('color');
        $car->speed = $request->input('speed');
        $car->engine = $request->input('engine');
        $car->cylinder_capacity = $request->input('cylinder_capacity');
        $car->wattage = $request->input('wattage');
        $car->torque = $request->input('torque');
        $car->fuel_capacity = $request->input('fuel_capacity');
        $car->fuel = $request->input('fuel');
        $car->size = $request->input('size');
        $car->gear = $request->input('gear');
        $car->seat = $request->input('seat');



        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/car/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $car->image = $path_upload.$filename;

        }

        $car->save();

        if($request->hasFile('images')){ //kiểm tra xem file images có được chọn hay k

            foreach ($request->images as $SingleImage){
                $CarImage = new car_img();

                //get file
                $file = $SingleImage;
                //get tên
                $filename = time().'_'.$file->getClientOriginalName();
                //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
                //duong dan upload
                $path_upload = 'uploads/car_img/';
                //upload file
                $file->move($path_upload,$filename);
                $CarImage->image = $path_upload . $filename;
                $CarImage->car_id = $car->id;
                $CarImage->save();

            }
        }

        return redirect()->route('quantri.car.index')->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = car::all();

        $model = models::all();
        $car = car::findorFail($id);
        $carImage = car_img::where('car_id',$car->id)->get();


        return view('admin.car.show',[
            'data' => $car,
            'car'=> $data,
            'model'=>$model,
            'carImage'=>$carImage,
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
        $data = car::all();
        $model = models::all();
        $car = car::findorFail($id);
        $carImage = car_img::where('car_id',$car->id)->get();


        return view('admin.car.edit',[
            'data' => $car,
            'car'=> $data,
            'model'=>$model,
            'carImage'=>$carImage,
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
        $car = car::findorFail($id);
        $request->validate(
            [
                'model_id' => 'required|not_in:0',
                'name' => 'required|max:255|unique:cars,name,'.$car->id,
                'qty' => 'required|not_in:0',
                'price' => 'required|not_in:0',
                'color' => 'required',
                'speed' => 'required|not_in:0',
                'engine' => 'required',
                'cylinder_capacity' => 'required|not_in:0',
                'wattage' => 'required',
                'torque' => 'required',
                'fuel_capacity' => 'required|not_in:0',
                'fuel' => 'required',
                'size' => 'required',
                'gear' => 'required',
                'seat' => 'required|not_in:0',
            ],
            [
                'model_id.required'=>'Dòng xe không được để trống',
                'model_id.not_in'=>'Dòng xe không được để trống',
                'name.required'=>'Tên xe không được để trống',
                'name.unique'=>'Tên xe này đã được sử dụng',
                'qty.not_in'=>'Số lượng không được để trống',
                'price.not_in'=>'Giá xe không được để trống',
                'color.required'=>'Màu xe không được để trống',
                'speed.not_in'=>'Tốc độ xe không được để trống',
                'engine.required'=>'Động cơ xe không được để trống',
                'cylinder_capacity.not_in'=>'Dung tích xi lanh không được để trống',
                'wattage.required'=>'Công suất xe không được để trống',
                'torque.required'=>'Mô men xoắn không được để trống',
                'fuel_capacity.not_in'=>'Dung tích nhiên liệu không được để trống',
                'fuel.required'=>'Nhiên liệu không được để trống',
                'size.required'=>'Kích thước xe không được để trống',
                'gear.required'=>'Hộp số không được để trống',
                'seat.not_in'=>'Số ghế không được để trống',
            ]);
        $car->name = $request->input('name');
        $car->slug = Str::slug($request->input('name'));
        $car->qty = $request->input('qty');
        $car->price = $request->input('price');
        $car->model_id = $request->input('model_id');
        $car->color = $request->input('color');
        $car->speed = $request->input('speed');
        $car->engine = $request->input('engine');
        $car->cylinder_capacity = $request->input('cylinder_capacity');
        $car->wattage = $request->input('wattage');
        $car->torque = $request->input('torque');
        $car->fuel_capacity = $request->input('fuel_capacity');
        $car->fuel = $request->input('fuel');
        $car->size = $request->input('size');
        $car->gear = $request->input('gear');
        $car->seat = $request->input('seat');



        if($request->hasFile('new_image')){ //kiểm tra xem file new_image có được chọn hay k

            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/car/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $car->image = $path_upload.$filename;

        }

        $car->save();

        if($request->hasFile('new_images')){ //kiểm tra xem file new_images có được chọn hay k
            $carImageDelete = car_img::where('car_id',$id)->delete();
            foreach ($request->new_images as $SingleImage){
                $CarImage = new car_img();

                //get file
                $file = $SingleImage;
                //get tên
                $filename = time().'_'.$file->getClientOriginalName();
                //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
                //duong dan upload
                $path_upload = 'uploads/car_img/';
                //upload file
                $file->move($path_upload,$filename);
                $CarImage->image = $path_upload . $filename;
                $CarImage->car_id = $car->id;
                $CarImage->save();

            }
        }

        return redirect()->route('quantri.car.index')->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = car::destroy($id);
        return redirect()->route('quantri.car.index')->with('msg','Xóa thành công');
    }

    public function incarindex($id)
    {
        $car = car::findorFail($id);
        $incar = in_car::all()->where('car_id',$id);
        return view('admin.car.incar.index',[
            'car'=>$car,
            'data'=>$incar,
            'car_id'=>$id,
        ]);
    }

    public function incarcreate($id)
    {
        $data = in_car::all()->where('car_id',$id);
        return view('admin.car.incar.create',[
            'data'=>$data,
            'car_id'=>$id,
        ]);
    }

    public function incarstore(Request $request,$id)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'description' => 'required|max:300',
                'image' => 'required',
            ],
            [
                'name.required'=>'Tên nội thất không được để trống',
                'description.required'=>'Mô tả không được để trống',
                'image.required'=>'Ảnh không được để trống',
            ]);
        //khởi tạo lớp model
        $incar = new in_car();
        $incar->name = $request->input('name');
        $incar->description = $request->input('description');
        $incar->car_id = $id;



        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/incar/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $incar->image = $path_upload.$filename;

        }
        $incar->save();

        return redirect()->route('quantri.incar.index',[$id])->with('msg','Thêm thành công');
    }
    public function incardestroy($id)
    {
        $incar = in_car::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công');
    }

    public function incaredit($id)
    {
        $data = in_car::all();
        $incar = in_car::findorFail($id);

        return view('admin.car.incar.edit',[
            'data' => $incar,
            'incar'=> $data,
        ]);
    }
    public function incarupdate(Request $request, $id)
    {
        $incar= in_car::findorFail($id);
        $request->validate(
            [
                'name' => 'required|max:100,',
                'description' => 'required|max:300',
            ],
            [
                'name.required'=>'Tên nội thất không được để trống',
                'description.required'=>'Mô tả không được để trống',
            ]);
        $incar->name = $request->input('name');
        $incar->description = $request->input('description');




        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($incar->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/incar/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $incar->image = $path_upload.$filename;

        }
        $incar->save();

        return redirect()->route('quantri.incar.index',[$incar->car_id])->with('msg','Cập nhật thành công');
    }

    public function outcarindex($id)
    {
        $car = car::findorFail($id);
        $outcar = out_car::all()->where('car_id',$id);
        return view('admin.car.outcar.index',[
            'car'=>$car,
            'data'=>$outcar,
            'car_id'=>$id,
        ]);
    }

    public function outcarcreate($id)
    {
        $data = out_car::all()->where('car_id',$id);
        return view('admin.car.outcar.create',[
            'data'=>$data,
            'car_id'=>$id,
        ]);
    }

    public function outcarstore(Request $request,$id)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'description' => 'required|max:300',
                'image' => 'required',
            ],
            [
                'name.required'=>'Tên ngoại thất không được để trống',
                'description.required'=>'Mô tả không được để trống',
                'image.required'=>'Ảnh không được để trống',
            ]);
        //khởi tạo lớp model
        $outcar = new out_car();
        $outcar->name = $request->input('name');
        $outcar->description = $request->input('description');
        $outcar->car_id = $id;



        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/outcar/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $outcar->image = $path_upload.$filename;

        }
        $outcar->save();

        return redirect()->route('quantri.outcar.index',[$id]);
    }

    public function outcaredit($id)
    {
        $data = out_car::all();
        $outcar = out_car::findorFail($id);

        return view('admin.car.outcar.edit',[
            'data' => $outcar,
            'outcar'=> $data,
        ]);
    }

    public function outcarupdate(Request $request, $id)
    {
        $outcar= out_car::findorFail($id);
        $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required|max:300',
            ],
            [
                'name.required'=>'Tên ngoại thất không được để trống',
                'description.required'=>'Mô tả không được để trống',
            ]);
        $outcar->name = $request->input('name');
        $outcar->description = $request->input('description');




        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k
            //Xóa file ảnh cũ đi
            @unlink(public_path($outcar->image));
            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/outcar/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $outcar->image = $path_upload.$filename;

        }
        $outcar->save();

        return redirect()->route('quantri.outcar.index',[$outcar->car_id])->with('msg','Cập nhật thành công');
    }

    public function outcardestroy($id)
    {
        $ourcar = out_car::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công');
    }
}
