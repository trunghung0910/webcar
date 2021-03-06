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
                'file_deposit.required'=>'Vui l??ng ch???n file h???p ?????ng ?????t c???c',
                'status.not_in'=>'Vui l??ng ch???n tr???ng th??i kh??c',
            ]);

        $booking_car = booking_car::findorfail($id);
        $booking_car->status = $request->status;
        $booking_car->save();

        $car = car::where('id',$booking_car->car_id)->first();
        if($booking_car->status == 2){
            if($car->qty == 0){
                return redirect()->back()->with('msg_qty','?? t?? ?????t mua t???m th???i h???t h??ng');
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

        if($request->hasFile('image')){ //ki???m tra xem file image c?? ???????c ch???n hay k

            //get file
            $file = $request->file('image');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('image')->move($path_upload,$filename);

            $contract->image = $path_upload.$filename;

        }

        if($request->hasFile('file_deposit')){ //ki???m tra xem file file_deposit c?? ???????c ch???n hay k

            //get file
            $file = $request->file('file_deposit');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_deposit')->move($path_upload,$filename);

            $contract->file_deposit = $path_upload.$filename;

        }

        if($request->hasFile('file_contract')){ //ki???m tra xem file file_contract c?? ???????c ch???n hay k

            //get file
            $file = $request->file('file_contract');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_contract')->move($path_upload,$filename);

            $contract->file_contract = $path_upload.$filename;

        }
        $contract->save();

        return redirect()->route('quantri.bookcar.index')->with('msg','???? th??m h???p ?????ng');
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
                'sokhung.required'=>'S??? khung xe kh??ng ???????c ????? tr???ng',
                'sokhung.unique'=>'S??? khung xe n??y ???? ???????c s??? d???ng',
                'somay.required'=>'S??? m??y kh??ng ???????c ????? tr???ng',
                'somay.unique'=>'S??? m??y n??y ???? ???????c s??? d???ng',
                'file_contract.required'=>'Vui l??ng ch???n file h???p ?????ng mua xe',
//                'image.required'=>'Vui l??ng ch???n ???nh h???p ?????ng mua xe',
            ]);
        $booking_car->status = $request->status;
        $booking_car->save();

        $car = car::where('id',$booking_car->car_id)->first();
        if($booking_car->status == 2){
            if($car->qty == 0){
                return redirect()->back()->with('msg_qty','?? t?? ?????t mua t???m th???i h???t h??ng');
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

        if($request->hasFile('new_image')){ //ki???m tra xem file image c?? ???????c ch???n hay k

            //get file
            $file = $request->file('new_image');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('new_image')->move($path_upload,$filename);

            $contract->image = $path_upload.$filename;

        }

        if($request->hasFile('file_deposit')){ //ki???m tra xem file image c?? ???????c ch???n hay k

            //get file
            $file = $request->file('file_deposit');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_deposit')->move($path_upload,$filename);

            $contract->file_deposit = $path_upload.$filename;

        }
        if($request->hasFile('file_contract')){ //ki???m tra xem file image c?? ???????c ch???n hay k

            //get file
            $file = $request->file('file_contract');
            //get t??n
            $filename = time().'_'.$file->getClientOriginalName();
            //$file->getClientOriginalName() t????ng ???ng v???i t??n ???nh hi???n t???i c???a m??nh
            //duong dan upload
            $path_upload = 'uploads/contract/';
            //upload file
            $request->file('file_contract')->move($path_upload,$filename);

            $contract->file_contract = $path_upload.$filename;

        }
        $contract->save();

        return redirect()->route('quantri.bookcar.index')->with('msg','???? c???p nh???t h???p ?????ng');
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

        return redirect()->route('frontend')->with('alert','B???n ???? ?????t h???n mua ?? t?? th??nh c??ng');

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
        return redirect()->route('quantri.bookcar.index')->with('msg','X??a th??nh c??ng');
    }
}
