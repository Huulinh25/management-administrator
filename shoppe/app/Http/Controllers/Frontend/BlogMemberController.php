<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Models\Rates;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class BlogMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    
    public function postCmt(Request $request){
        
        $comment = $request->input('comment');
        $idBlog = $request->input('id_blog');
        $id_user = Auth::id();  
        $avatar = Auth::user()->avatar;
        $name_user = Auth::user()->name;
        $level = $request->input('level');

        $cmt = new Comments();
        $cmt->cmt = $comment;
        $cmt->id_blog = $idBlog;
        $cmt->id_user = $id_user;
        $cmt->avatar = $avatar;
        $cmt->name_user = $name_user;
        if($level >0){
            $cmt->level = $level;
        }
        else{
            $cmt->level = 0;
        }
        $cmt->save();
        
        return response()->json(['success' => 'Comment successfully']);

    }
    // BLOG
    //Lấy blog đầu tiên
    public function showFirstBlog()
    {
        $firstBlog = Blogs::first();
        $previousBlog = Blogs::where('id', '<', $firstBlog->id)->orderBy('id', 'desc')->first();
        $nextBlog = Blogs::where('id', '>', $firstBlog->id)->orderBy('id', 'asc')->first();
        // dd($previousBlog);
        // dd($nextBlog);
        return view('frontend.blog.detailBlog')->with('blog', $firstBlog)->with('previousBlog', $previousBlog)->with('nextBlog', $nextBlog);
    }
    public function getRateBlog($idBlog)
    {
        $userId = Auth::id();

        $rateValue = Rates::where('id_blog', $idBlog)
            ->where('id_user', $userId)
            ->value('num_rate');

        // Kiểm tra nếu không có giá trị nào thì gán một giá trị mặc định là 0
        if ($rateValue === null) {
            $rateValue = 0;
        }

        return response()->json(['rateValue' => $rateValue]);
    }


    public function postRateBlog(Request $request)
    {
        $userId = Auth::id();
        $idBlog = $request->input('id_blog');
        $rateValue = $request->input('rate');

        // Check if the user has already rated this blog post
        $existingRate = Rates::where('id_blog', $idBlog)
            ->where('id_user', $userId)
            ->first();

        if ($existingRate) {
            // Nếu người dùng đã đánh giá thì update num_rate
            $existingRate->num_rate = $rateValue;
            $existingRate->save();
        } else {
            // Nếu user ko tồn tại thì tạo rate mới 
            $rate = new Rates();
            $rate->id_blog = $idBlog;
            $rate->num_rate = $rateValue;
            $rate->id_user = $userId;
            $rate->save();
        }

        return response()->json(['success' => 'Rating successfully']);
    }
    //Hàm tính tổng đánh giá trung bình 
    public function averageRate($idBlog)
    {
        // Lấy tổng trung bình các đánh giá cho blog có id là $idBlog
        $averageRate = Rates::where('id_blog', $idBlog)->avg('num_rate');

        return response()->json(['averageRate' => $averageRate]);
    }
    public function detailBlog($id = 0)
    {
        $blog = Blogs::find($id);
        $previousBlog = Blogs::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextBlog = Blogs::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        //Lấy rate của user đánh giá
        $rateResponse = $this->getRateBlog($blog->id);

        if ($rateResponse->status() === 200) {
            $rateValue = $rateResponse->original['rateValue'];
        } else {
            $rateValue = 0;
        }

        // Gọi hàm averageRate và truyền $blog->id để tính tổng trung bình
        $averageRateResponse = $this->averageRate($blog->id);
        $averageRate = $averageRateResponse->original['averageRate'];

        // Truy vấn tất cả bình luận cho bài đăng cụ thể
        $comments = Comments::where('id_blog', $id)->get();
        return view('frontend.blog.detailBlog')
            ->with('blog', $blog)
            ->with('previousBlog', $previousBlog)
            ->with('nextBlog', $nextBlog)
            ->with('rateValue', $rateValue)
            ->with('averageRate', round($averageRate))
            ->with('comments', $comments);
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
