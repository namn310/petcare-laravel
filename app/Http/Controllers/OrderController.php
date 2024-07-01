<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Order;
use App\Models\User\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Order = Order::all();
        return view('Admin.Quanlydonhang', ['Order' => $Order]);
    }
    public function detail($id)
    {
        $product=new OrderDetail();
        $OrderDetail=OrderDetail::select()->where('idOrder',$id)->get();
        $Order = Order::find($id)->get();
        return view('Admin.ChiTietDonHang', ['Order' => $Order,'OrderDetail'=>$OrderDetail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
