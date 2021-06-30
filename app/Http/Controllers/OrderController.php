<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\OrderHead;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->OrderHead = new OrderHead;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $record_list    = $this->OrderHead->order_list($request->order_number, $request->full_name, $request->post_code);
        $title          = "Bookings List";
        $data           = compact('title','record_list','request');
        return view('admin_panel.order_list', $data);
    }

    public function show($order_id)
    {
        $order_data     = OrderHead::findOrfail(base64_decode($order_id));
        $title          = "Booking Details";
        $data           = compact('title','order_data');
        return view('admin_panel.order_details', $data);
    }
}
