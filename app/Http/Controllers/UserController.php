<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function logOut()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
    public function checkLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //dd(Auth::user()->name);
            return redirect()->route('admin.home')->with('alert', 'Chào mừng quay trở lại');
        } else {
            return redirect()->route('admin.login')->with('status', 'Email hoặc mật khẩu không chính xác');
        }
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
        $user = new User;
        try {
            $user->createUser($request);
        } catch (\Throwable) {
            return redirect('admin/register')->with('status', 'Email đã tồn tại')->with('alert', 'danger');
        };

        return redirect('admin/login')->with('status', 'Đăng ký thành công')->with('alert', 'success');
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
