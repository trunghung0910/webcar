<?php

namespace App\Http\Controllers;

use App\booking_service;
use App\booking_servicedetail;
use App\post;
use App\service;
use Illuminate\Http\Request;


class BookingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $data = booking_service::latest()->paginate(10);
        $data = booking_service::latest();
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'daxuly':
                    $data->where('status','=',1);
                    break;
                case 'chuaxuly':
                    $data->where('status','=',0);
                    break;
                default:
                    $data->orderBy('id','DESC');
            }
        }
        $data = $data->paginate(10);
        return view('admin.bookservice.index',['data'=>$data] );
    }

    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');


        $bookservice = booking_service::where('email','like','%'.$keyword.'%');

        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'daxuly':
                    $bookservice->where('status','=',1);
                    break;
                case 'chuaxuly':
                    $bookservice->where('status','=',0);
                    break;
                default:
                    $bookservice->orderBy('id','DESC');
            }
        }
        $bookservice = $bookservice->paginate(10);

        return view('admin.bookservice.search', [
            'bookservice' => $bookservice,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }

    public function activeService($id)
    {
        $bookservice = booking_service::find($id);
        $bookservice->status = 1;
        $bookservice->save();
        return redirect()->route('quantri.bookservice.index')->with('msg','Dịch vụ đã được xử lý');
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
        $bookservice_detail  = booking_servicedetail::where('booking_service_id',$id)->get();

        return view('admin.bookservice.show',['data'=> $bookservice_detail]);
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
        $bookservice = booking_service::destroy($id);
        return redirect()->route('quantri.bookservice.index')->with('msg','Xóa thành công');
    }

    public function addService(Request $request,$id)
    {
        $service = service::select('title','id','price','image')->find($id);
        $price = $service->price;
        $check = \Cart::content();
        $list = [];
        foreach ($check as $key => $item){
            $list = $item->id;
            if($list == $id){
                return "error";
            }
        }

        if(!$service) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $service->title,
            'qty' => 1,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'image' => $service->image,
                'old_price' => $service->price,
            ]]);

        return "success";
    }

    public function getListService(){
        $service = \Cart::content();


        $post = post::orderBy('view','DESC')->limit(4)->get();
        return view('frontend.list_service',[
            'service' => $service,
            'post' => $post,
        ]);
    }

    public function deleteService($key){
        \Cart::remove($key);
        return redirect()->back();
    }

    public function bookService(){
        if (\Cart::content()->count() == 0){
            return redirect()->back()->with('alert', 'Danh sách đặt dịch vụ của bạn trống');
        }
        $post = post::orderBy('view','DESC')->limit(4)->get();
        return view('frontend.book_service',[
            'post' => $post,
        ]);
    }

    public function saveInfoBookService(Request $request){
        $totalMoney = str_replace(',','',\Cart::subtotal(0,3));

        $bookService = new booking_service();
        $bookService->user_id = \Auth::user()->id;
        $bookService->name = $request->input('name');
        $bookService->email = $request->input('email');
        $bookService->phone = $request->input('phone');
        $bookService->address = $request->input('address');
        $bookService->note = $request->input('note');
        $bookService->total_price = (int)$totalMoney;
        $bookService->save();

        if($bookService){
            $service = \Cart::content();
            foreach ($service as $item){
                $bookServiceDetail = new booking_servicedetail();
                $bookServiceDetail->title = $item->name;
                $bookServiceDetail->image = $item->options->image;
                $bookServiceDetail->booking_service_id  = $bookService->id;
                $bookServiceDetail->service_id = $item->id;
                $bookServiceDetail->price = $item->options->old_price;
                $bookServiceDetail->save();
            }
        }

        \Cart::destroy();
        return redirect()->route('frontend')->with('alert','Bạn đã đặt hẹn dịch vụ thành công');
    }
}
