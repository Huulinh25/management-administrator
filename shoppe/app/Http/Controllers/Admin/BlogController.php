<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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


    // public function getBlog(){
    //     $blogs = Blog::all();
    //     // dd($blogs);
    //     return view('blog')->with('blogs', $blogs);
    // }

    public function addBlog()
    {
        return view('admin.blog.addBlog');
    }
    public function postBlog(BlogRequest $request)
    {
        $blog = new Blogs();
        $blog->title = $request->input('title');
        $blog->image = $request->input('image'); // post tên image vào database
        $blog->description = $request->input('description');


        $blog->save(); // Save the country to the database

        return redirect()->route('blog.blog')->with('success', 'Added blog successfully');
    }
    public function getEditBlog($id)
    {
        $blog = Blogs::find($id);
        // dd($blog);
        return view('admin.blog.editBlog', compact('blog'));
    }

    public function postEditBlog(BlogRequest $request, $id = 0)
    {
        $blog = Blogs::find($id);

        if (!$blog) {
            return redirect()->route('blog.blog')->withErrors('Blog not found.');
        }

        $data = $request->all();
        $file = $request->image;

        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
            $file->move('admin/user/upload', $file->getClientOriginalName());
        }

        $blog->update($data);

        return redirect()->route('blog.blog')->with('success', 'Updated blog successfully');
    }

    public function deleteBlog($id=0){
        if(!empty($id)){
            Blogs::where('id', $id)->delete();

            return redirect()->route('blog.blog')->with('success', 'Delete blog successfully');
        }
    }


    public function index()
    {
        $blogs = Blogs::all(); // Lấy tất cả dữ liệu từ bảng "blogs"
        // dd($players);
        return view('admin.blog.blog')->with('blogs', $blogs);
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
