<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Product;
use App\Order;
use Session;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        $order_no = str_random(10);

        Product::create([
            'product' => $request->product,
            'shipping_address' => $request->shipping_address,
            'price' => $request->price
        ]);

        $order_no = mt_rand(1000000000,9999999999);
        $total = $request->price + 10000;
        $date = Carbon::now();
        $now = $date->format('Y-m-d');
        
        Session::put('order_no', $order_no);
        Session::put('total', $total);

        Order::create([
            'order_no' => $order_no,
            'total' => $total,
            'orderable_id' => $request->orderable_id,
            'orderable_type' => $request->orderable_type,
            'date' => $now
        ]);

        Session::flash('success', $request->product . ' that costs ' . $request->price . ' will be shipped to ' . $request->shipping_address . ' only after you pay!');

        return redirect()->route('order.index');
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
        //
    }
}
