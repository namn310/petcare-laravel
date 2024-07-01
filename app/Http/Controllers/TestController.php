<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class TestController extends Controller
{
    public function index()
    {

        // $array = [
        //     'name' => 'nam',
        //     'age' => 18,
        //     'year' => 2003

        // ];
        // $array1 = [
        //     'name' => 'nameeeeee',
        //     'age' => 18,
        //     'year' => 2003

        // ];
        // $array2 = [1 => $array, 2 => $array1];
        // session(['nam' => $array2]);

        // //session()->forget(session('nam')[1]);
        // dd(session('nam')[1]);
        return view('User.test');
    }
    public function store(Request $request)
    {
        dd($request);
    }
}
