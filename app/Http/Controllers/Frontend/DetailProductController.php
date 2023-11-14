<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Products::findOrFail($id)->toArray();
        $imagesProduct = $product['avatar'];
        $id_Brand = $product['id_brand'];

        $brand = Brands::find($id_Brand)->toArray();
        // dd($brand);

        return view('frontend.product.detailProduct')
            ->with('imagesProduct', $imagesProduct)
            ->with('product', $product)
            ->with('brand', $brand);
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
