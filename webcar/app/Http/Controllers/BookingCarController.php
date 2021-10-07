<?php

namespace App\Http\Controllers;

use App\booking_car;
use App\car;
use App\contract;
use App\post;
use App\User;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class BookingCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $data = booking_car::latest()->paginate(10);
        $data = booking_car::latest();
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'chuaxuly':
                    $data->where('status','=',0);
                    break;
                case 'dadatcoc':
                    $data->where('status','=',1);
                    break;
                case 'dagiaoxe':
                    $data->where('status','=',2);
                    break;
                default:
                    $data->orderBy('id','ASC');
            }
        }
        $data = $data->paginate(10);
        return view('admin.bookcar.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');


        $bookcar = booking_car::where([
            ['email','like','%'.$keyword.'%']
        ]);

        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'chuaxuly':
                    $bookcar->where('status','=',0);
                    break;
                case 'dadatcoc':
                    $bookcar->where('status','=',1);
                    break;
                case 'dagiaoxe':
                    $bookcar->where('status','=',2);
                    break;
                default:
                    $bookcar->orderBy('id','DESC');
            }
        }
        $bookcar = $bookcar->paginate(10);

        return view('admin.bookcar.search', [
            'bookcar' => $bookcar,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }



    public function contract($id){

        $booking_car = booking_car::findorfail($id);
        $contract = contract::where('booking_car_id',$booking_car->id)->first();



        return view('admin.bookcar.contract',[
            'booking_car' => $booking_car,
            'contract' => $contract,
        ]);
    }

    public function postContract(Request $request,$id){
        $request->validate(
            [

                'file_deposit' => 'required',
                'status' => 'required|not_in:0',
            ],
            [
                'file_deposit.required'=>'Vui lòng chọn file hợp đồng đặt cọc',
                'status.not_in'=>'Vui lòng chọn trạng thái khác',
            ]);

        $booking_car = booking_car::findorfail($id);
        $booking_car->status = $request->status;
        $booking_car->save();

        $car = car::where('id',$booking_car->car_id)->first();
        if($booking_car->status == 2){
            if($car->qty == 0){
                return redirect()->back()->with('msg_qty','Ô tô đặt mua tạm thời hết hàng');
                $booking_car->status = 0;
                $booking_car->save();
            }else{
                $car->qty = $car->qty - 1;
                $car->save();
            }
        }



        $contract = new contract();
        $contract->user_id = $booking_car->user_id;
        $contract->booking_car_id = $booking_car->id;
//        $contract->car_id = $booking_car->car_id;
        $contract->sokhung = $request->sokhung;
        $contract->somay = $request->somay;

        if($request->hasFile('image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $contract->image = $path_upload.$filename;

        }

        if($request->hasFile('file_deposit')){ //kiểm tra xem file file_deposit có được chọn hay k

            //get file
            $file = $request->file('file_deposit');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_deposit')->move($path_upload,$filename);

            $contract->file_deposit = $path_upload.$filename;

        }

        if($request->hasFile('file_contract')){ //kiểm tra xem file file_contract có được chọn hay k

            //get file
            $file = $request->file('file_contract');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_contract')->move($path_upload,$filename);

            $contract->file_contract = $path_upload.$filename;

        }
        $contract->save();

        return redirect()->route('quantri.bookcar.index')->with('msg','Đã thêm hợp đồng');
    }

    public function editContract($id){

        $contract = contract::where('booking_car_id',$id)->first();
        $booking_car = booking_car::find($id);

        $filename = explode("/",$contract->file_deposit);

        if($contract->file_contract){
            $file_contract = explode("/",$contract->file_contract);

            return view('admin.bookcar.edit_contract',[
                'contract' => $contract,
                'booking_car' => $booking_car,
                'filename' => $filename[2],
                'file_contract' => $file_contract[2],
            ]);
        }


        return view('admin.bookcar.edit_contract',[
            'contract' => $contract,
            'booking_car' => $booking_car,
            'filename' => $filename[2],
        ]);
    }

    public function updateContract(Request $request,$id){


        $booking_car = booking_car::findorfail($id);
        $contract = contract::where('booking_car_id',$id)->first();

        $request->validate(
            [
                'sokhung' => 'required|max:100|unique:contract,sokhung,'.$contract->id,
                'somay' => 'required|max:100|unique:contract,somay,'.$contract->id,
                'file_contract' => 'required',
//                'image' => 'required',
            ],
            [
                'sokhung.required'=>'Số khung xe không được để trống',
                'sokhung.unique'=>'Số khung xe này đã được sử dụng',
                'somay.required'=>'Số máy không được để trống',
                'somay.unique'=>'Số máy này đã được sử dụng',
                'file_contract.required'=>'Vui lòng chọn file hợp đồng mua xe',
//                'image.required'=>'Vui lòng chọn ảnh hợp đồng mua xe',
            ]);
        $booking_car->status = $request->status;
        $booking_car->save();

        $car = car::where('id',$booking_car->car_id)->first();
        if($booking_car->status == 2){
            if($car->qty == 0){
                return redirect()->back()->with('msg_qty','Ô tô đặt mua tạm thời hết hàng');
                $booking_car->status = 1;
                $booking_car->save();
            }else{
                $car->qty = $car->qty - 1;
                $car->save();
            }
        }

        $contract = contract::where('booking_car_id',$id)->first();
        $contract->sokhung = $request->sokhung;
        $contract->somay = $request->somay;

        if($request->hasFile('new_image')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('new_image');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $contract->image = $path_upload.$filename;

        }

        if($request->hasFile('file_deposit')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('file_deposit');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_deposit')->move($path_upload,$filename);

            $contract->file_deposit = $path_upload.$filename;

        }
        if($request->hasFile('file_contract')){ //kiểm tra xem file image có được chọn hay k

            //get file
            $file = $request->file('file_contract');
            //get tên
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() tương ứng với tên ảnh hiện tại của mình
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_contract')->move($path_upload,$filename);

            $contract->file_contract = $path_upload.$filename;

        }
        $contract->save();

        return redirect()->route('quantri.bookcar.index')->with('msg','Đã cập nhật hợp đồng');
    }

    public function bookCar($id)
    {
        $post = post::orderBy('view','DESC')->limit(4)->get();
        return view('frontend.book_car',[
            'post' => $post,
            'id' => $id
        ]);
    }

    public function saveInfoBookCar(Request $request,$id){

        $car = car::find($id);
        $price = $car->price;

        $bookcar = new booking_car();
        $bookcar->name = $request->input('name');
        $bookcar->email = $request->input('email');
        $bookcar->phone = $request->input('phone');
        $bookcar->address = $request->input('address');
        $bookcar->note = $request->input('note');
        $bookcar->price = $price;
        $bookcar->car_id = $car->id;
        $bookcar->user_id = \Auth::user()->id;

        $bookcar->save();

        return redirect()->route('frontend')->with('alert','Bạn đã đặt hẹn mua ô tô thành công');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = contract::where('booking_car_id',$id)->first();
        $booking_car = booking_car::findorfail($id);


        $filename = explode("/",$contract->file_deposit);

        if($contract->file_contract){
            $file_contract = explode("/",$contract->file_contract);

            return view('admin.bookcar.show',[
                'contract' => $contract,
                'booking_car' => $booking_car,
                'filename' => $filename[2],
                'file_contract' => $file_contract[2],
            ]);
        }





        return view('admin.bookcar.show',[
            'contract' => $contract,
            'booking_car' => $booking_car,
            'filename' => $filename[2],
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookcar = booking_car::destroy($id);
        return redirect()->route('quantri.bookcar.index')->with('msg','Xóa thành công');
    }
}
