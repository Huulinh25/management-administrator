<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // kiem tra e da login chua?
        $this->middleware('auth');
    }
    public function postEditBrand(BrandRequest $request,$id){
        $brand = Brands::find($id);
        if (!$brand) {
            return redirect()->route('product.brand')->withErrors('Brand not found.');
        }
        $data = $request->all();
        // dd($data);
        $brand->update($data);
        return redirect('admin/brand')->with('success', 'Updated brand successfully');
    }
    public function getEditBrand($id){
        $brand = Brands::find($id);    
        return view('admin.product.editBrand', compact('brand'));
    }
    public function postBrand(BrandRequest $request){
        $brand = new Brands();
        $brand->brand_name = $request->input('brand_name');
        $brand->save();
        return redirect('admin/brand')->with('success','Add brand successfully');
    }
    public function addBrand(){
        return view('admin.product.addBrand');
    }
    public function deleteBrand($id=0){
        if(!empty($id)){
            Brands::where('id', $id)->delete();

            return redirect()->route('brand.brand')->with('success', 'Delete brand successfully');
        }
    }
    public function index()
    {
        $brands = Brands::paginate(3);
        return view('admin.product.brand')->with('brands', $brands);
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
