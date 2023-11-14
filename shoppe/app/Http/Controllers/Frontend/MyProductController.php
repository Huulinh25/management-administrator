<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postProduct(Request $request){
        $userId = Auth::id(); //Dòng này lấy ID của người dùng hiện tại từ phiên đăng nhập
        $data = $request->all();
        dd($data);
    }
    public function formProduct(){
        return view("frontend.product.addProduct");
    }
    public function index()
    {
        return view('frontend.product.my-product');
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
