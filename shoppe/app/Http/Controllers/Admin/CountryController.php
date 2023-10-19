<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;

use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
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
    // TEST DATA
    public function getCountry(){
        $countries = countries::all();
        // dd($countries);
        return view('country')->with('countries', $countries);
    }
    public function addCountry()
    {
        return view('admin.country.addCountry');
    }
    public function postCountry(CountryRequest $request)
    {
        $country = new Countries();
        $country->name = $request->input('name');
        $country->save(); // Save the country to the database

        return redirect()->route('country.country')->with('success', 'Added country successfully');
    }

    public function getEditCountry($id)
    {
        $country = Countries::find($id);
        return view('admin.country.editCountry', compact('country'));
    }

    public function postEditCountry(CountryRequest $request, $id=0)
    {
        
        if(!empty($id)){
            $country = Countries::find($id);
            $country->name = $request->input('name');
            $country->save();
            return redirect()->route('country.country')->with('success', 'Updated country successfully');
        }
    }

    public function deleteCountry($id=0){
        if(!empty($id)){
            Countries::where('id', $id)->delete();

            return redirect()->route('country.country')->with('success', 'Delete country successfully');
        }
    }


    public function index()
    {
        $countries = countries::paginate(3); // Lấy tất cả dữ liệu từ bảng "countries"
        // dd($players);
        return view('admin.country.country',compact('countries'))->with('i',(request()->input('page',1) -1) *3);
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
