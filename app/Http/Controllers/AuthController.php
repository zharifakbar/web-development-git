<?php

namespace App\Http\Controllers;

use Illuminate\http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\http\Facades\Session;
use Illuminate\http\Facades\Auth;
use App\Models\user;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $credentials = $request validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)); }
        $request->session()->regenerate();
        return redirect()-->intended();
    } else {
        return back()->with([
            'message'=> 'email atau password dak katek',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        
    }

    {
        $data = $request->except('password');
        $data ['password'] = Hash::make($request->password);
        User::create($data);

        return redirect('/login')->with('message', 'Register sukses, silahkan login.');
    }

   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
