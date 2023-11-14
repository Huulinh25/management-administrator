<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Products;
use App\Models\Categorys;
use App\Models\Brands;

use App\Http\Requests\ProductRequest;
use Illuminate\Console\View\Components\Alert;
use Intervention\Image\Facades\Image;


class MyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // kiem tra e da login chua?
        $this->middleware('auth');
    }
    public function deleteProduct($id)
    {
        if (!empty($id)) {
            Products::where('id', $id)->delete();

            return redirect()->route('member.my-product')->with('success', 'Delete product successfully');
        }
    }
    public function postEditProduct(Request $request, $id)
    {
        // - mang xoa: [1,2] 
        // - mangcu: [1,2,3] 
        // -> mangconlai: [3]

        //     1 + [1,2,3] : dung hàm chi de kiem tra value co trong mang 



        // + if không upload hinh mới => thì đưa mangconlai update vao 
        // + if có hình mới: 
        //     + mảng hình mớii + mangconlai (merge mang) > 3 => loi 
        //     + else => update vao
        $product = Products::find($id);

        $hinhxoa = $request->input('selected_images');
        $hinhcu = json_decode($product->avatar);
        $hinhconlai = [];

        if ($hinhxoa !== null) {
            foreach ($hinhcu as $value) {
                if (!in_array($value, $hinhxoa)) {
                    $hinhconlai[] = $value;
                }
            }
        } else {
            $hinhconlai = $hinhcu;
        }

        $data = $request->all();
        $id_user = Auth::id();
        $data['id_user'] = $id_user;

        if ($request->hasFile('avatar')) {
            $hinhmoi = $request->file('avatar');
            $imageData = [];

            foreach ($hinhmoi as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "2" . $name;
                $name_3 = "3" . $name;

                $path = public_path('member/user/upload/' . $name);
                $path2 = public_path('member/user/upload/' . $name_2);
                $path3 = public_path('member/user/upload/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                $imageData[] = $name;
            }
            // Update the avatar field with the new image data
            $newAvatarData = array_merge($hinhconlai, $imageData);

            if (count($newAvatarData) > 3) {
                return redirect()->route('member.my-product')->withErrors(['Lỗi! Chỉ được thêm 3 hình ảnh!']);
            }

            $data['avatar'] = json_encode($newAvatarData);
        } else {
            $data['avatar'] = json_encode($hinhconlai);
        }

        $product->update($data);
        return redirect()->route('member.my-product')->with('success', 'Updated product successfully');
    }




    public function getEditProduct($id)
    {
        $selected_product = Products::find($id)->toArray(); //lấy product được click
        // $products = Products::all();
        $categories = Categorys::all();
        $brands = Brands::all();
        $list_image_product = $selected_product['avatar'];
        // dd($list_image_product);
        return view("frontend.product.editProduct")
            ->with('selected_product', $selected_product)
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('list_image_product', $list_image_product);
    }
    public function postProduct(ProductRequest $request)
    {
        // Get the authenticated user's ID
        $id_user = Auth::id();
        // Prepare the product data
        $data = $request->all();
        $data['id_user'] = $id_user;
        // Initialize an array to store image names
        $imageData = [];

        if ($request->hasfile('avatar')) {
            foreach ($request->file('avatar') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "2" . $image->getClientOriginalName();
                $name_3 = "3" . $image->getClientOriginalName();

                $path = public_path('member/user/upload/' . $name);
                $path2 = public_path('member/user/upload/' . $name_2);
                $path3 = public_path('member/user/upload/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                $imageData[] = $name;
            }

            $data['avatar'] = json_encode($imageData);
        }
        // dd($imageData);

        $product = Products::create($data);

        if ($product) {
            return redirect('member/account/my-product')->with('success', 'Add product success.');
        } else {
            return redirect('member/account/my-product')->withErrors('Add product error.');
        }
    }

    public function formProduct()
    {
        $categories = Categorys::all();
        $brands = Brands::all();
        return view("frontend.product.addProduct")
            ->with('categories', $categories)
            ->with('brands', $brands);
    }
    public function index()
    {
        $userId = Auth::id();
        $products = Products::where('id_user', $userId)->get()->toArray();
        return view('frontend.product.my-product')->with('products', $products);
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
