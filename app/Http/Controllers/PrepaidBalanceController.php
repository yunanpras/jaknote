<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrepaidBalanceRequest;
use App\PrepaidBalance;
use App\Order;
use Session;
use Carbon\Carbon;

class PrepaidBalanceController extends Controller
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
        return view('prepaid_balance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requcreateest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrepaidBalanceRequest $request)
    {
        PrepaidBalance::create([
            'mobile_number' => $request->mobile_number,
            'value' => $request->value
        ]);

        $order_no = mt_rand(1000000000,9999999999);
        $total = $request->value + 0.05 * $request->value;
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

        Session::flash('success', 'Your mobile phone number ' . $request->mobile_number . ' will receive Rp ' . $request->value);

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
