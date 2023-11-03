<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;

use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // kiem tra e da login chua?
        $this->middleware('auth');
    }

    public function deleteCategory($id=0){
        if(!empty($id)){
            Categorys::where('id', $id)->delete();
            return redirect()->route('category.category')->with('success', 'Delete category successfully');
        }
    }
    public function postEditCategory(CategoryRequest $request, $id)
    {
        $category = Categorys::find($id);
        if (!$category) {
            return redirect()->route('category.category')->withErrors('Category not found.');
        }
        $data = $request->all();
        // dd($data);
        $category->update($data);
        return redirect()->route('category.category')->with('success', 'Updated category successfully');
    }
    public function getEditCategory($id)
    {
        $category = Categorys::find($id);
        // dd($category);
        return view('admin.product.editCategory', compact('category'));
    }
    public function postCategory(Request $request)
    {
        $category = new Categorys();
        $category->category_name = $request->input('category_name');
        $category->save();
        return redirect('admin/category')->with('success', 'Add category successfully');
    }

    public function addCategory()
    {
        return view('admin.product.addCategory');
    }
    public function index()
    {
        $categories = Categorys::paginate(3);
        return view('admin.product.category')->with('categories', $categories);
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
