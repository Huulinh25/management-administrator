<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Countries;

class UploadProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // kiem tra e da login chua?
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function update(UpdateProfileRequest $request)
    {
        $userId = Auth::id(); //Dòng này lấy ID của người dùng hiện tại từ phiên đăng nhập
        $user = User::findOrFail($userId); // Dòng này sử dụng ID người dùng đã lấy được từ bước trước để tìm kiếm thông tin người dùng trong cơ sở dữ liệu
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
                $file->move('admin/user/upload', $file->getClientOriginalName());
            }
            return redirect('admin/profile')->with('success', ('Update profile success.'));
        } else {
            return redirect('admin/profile')->withErrors('Update profile error.');
        }
    }

    public function edit()
    {
        $countries = Countries::all();
        return view("admin.userProfile.profile", compact('countries'));
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
