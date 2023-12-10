<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // kiem tra e da login chua?
        $this->middleware('auth');
    }
    
    public function updateProfile(Request $request){
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $data = $request->all();
        // dd($data);
        $file = $request->avatar;
        
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName(); //Nếu có hình ảnh đã tải lên, tên hình ảnh mới sẽ được lấy 
        }

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        // dd($data);
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('member/user/upload', $file->getClientOriginalName());
            }
            return redirect('/member-profile')->with('success', ('Update profile success.'));
        } else {
            return redirect('/member-profile')->withErrors('Update profile error.');
        }
    }
    public function index()
    {
        $countries = Countries::all();
        return view("frontend.member.profile", compact('countries'));
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
