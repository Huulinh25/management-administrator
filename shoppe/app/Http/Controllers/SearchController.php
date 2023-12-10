<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Categorys;
use App\Models\Brands;

class SearchController extends Controller
{
    public function searchPrice(Request $request)
    {
        $minValue = $request->input('minValue');
        $maxValue = $request->input('maxValue');

        // $products = Products::whereBetween('price', [$minValue, $maxValue])->get()->toArray();

        //get 6 products newest from min price to max price
        $products = Products::latest()->whereBetween('price', [$minValue, $maxValue])->take(6)->get()->toArray();
        return response()->json($products);
    }
    public function searchItem(Request $request)
    {
        $data = $request->all();

        $products = Products::query();

        if ($data['name']) {
            $products->where('name', 'like', '%' . $data['name'] . '%');
        }
        if ($data['price']) {
            list($minPrice, $maxPrice) = explode('-', $data['price']);
            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }
        if ($data['category']) {
            $products->where('id_category', 'like', '%' . $data['category'] . '%');
        }
        if ($data['brand']) {
            $products->where('id_brand', 'like', '%' . $data['brand'] . '%');
        }
        if ($data['status']) {
            if ($data['status'] == 1) {
                $products->where('status', 'like', '%' . $data['status'] . '%');
            } else {
                $products = Products::latest()->take(6)->get()->toArray(); //Nếu là new thì lấy 6 sản phẩm mới nhất
            }
        }
        $resultProducts = $products->get()->toArray();

        $noResult = empty($resultProducts);
        if ($noResult) {
            $resultProducts = Products::latest()->take(6)->get()->toArray(); // nếu tìm không thấy thì sẽ lấy 6 sp newest
        }
        return view('frontend.product.resultsProduct')
            ->with('results', $resultProducts)
            ->with('noResult', $noResult);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('search');

        $results = Products::where('name', 'like', '%' . $query . '%')->get()->toArray();
        // dd($results);
        $noResult = empty($results);
        if ($noResult) {
            $results = Products::latest()->take(6)->get()->toArray(); // nếu tìm không thấy thì sẽ lấy 6 sp newest
        }
        return view('frontend.product.resultsProduct')
            ->with('results', $results)
            ->with('noResult', $noResult);
    }
    public function index()
    {
        $categories = Categorys::all();
        $brands = Brands::all();
        $products = Products::all();
        // dd($categories);
        return view('frontend.onepage.index')
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('products', $products);
    }
}
