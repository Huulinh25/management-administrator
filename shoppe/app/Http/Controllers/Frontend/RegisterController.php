<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\RegisterRequest;
use App\Models\Countries;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRegister(){
        $countries = Countries::all();
        return view("frontend.member.register", compact('countries'));
    }
    public function postRegister(RegisterRequest $request){
        $data = $request->all();

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->id_country = $request->input('id_country'); // Thêm id_country
        $user->level = 0;

        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName(); //Nếu có hình ảnh đã tải lên, tên hình ảnh mới sẽ được lấy 
        }

        $user->save();
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('member/user/upload', $file->getClientOriginalName());
            }
            return redirect('/member-login')->with('success', 'User registered successfully');
        }else {
            return redirect('/member-login')->withErrors('User registration failed! Please try again');
        }

        
    }
    public function index()
    {
        //
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
