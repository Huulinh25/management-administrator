<?php

namespace App\Http\Controllers\Frontend\blogs;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function detailBlog($id = 0)
    {
        $blog = Blogs::find($id); // Thay 'id' thành $id
        // dd($blog) ;
        return view('frontend.blog.detailBlog')->with('blog', $blog);
    }

    public function index()
    {
        $blogs = Blogs::paginate(3); // Lấy tất cả dữ liệu từ bảng "blogs"
        // dd($players);
        return view('frontend.blog.blog')->with('blogs', $blogs);
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
