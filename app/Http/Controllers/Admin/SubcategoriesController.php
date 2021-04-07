<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Mockery\Matcher\Subset;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories =  Category::get();
       $subcategories = Subcategory::get();
       return view('admin.pages.subcategories', compact('categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  dd($request->all());
        $request->validate([
            'subcategory_name' => 'required',
            'categories_name' =>'required|not_in:0',
            'subcategory_image' =>  'required|mimes:png,jpg',

        ]);

        $subcategory =  new Subcategory();

        if ($request->hasFile('subcategory_image')) {
            $file = $request->file('subcategory_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/subcategories/', $filename);
            $subcategory->subcategory_image = $filename;
        }
        $subcategory->category_id = $request->categories_name;
        $subcategory->subcategory_name= $request->subcategory_name;
        
        try {
            $subcategory->save();
            return redirect()->back()->with(['status' => 'Sub Categories Added SuccessFully Add!']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => $th->getMessage()]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $subcategory_edit =  Subcategory::find($id);
       if($subcategory_edit) {
        $categories =  Category::get();
        $subcategories = Subcategory::get();
        return view('admin.pages.subcategories', compact( 'subcategory_edit','categories', 'subcategories'));
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'categories_name' =>'required|not_in:0',
        ]);

        if ($request->hasFile('subcategory_image')) {
            $file = $request->file('subcategory_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/subcategories/', $filename);
            Subcategory::where('id', $id)->update([
                'subcategory_image' => $filename,
            ]);
        }

        Subcategory::where('id', $id)->update([
            'subcategory_name' => $request['subcategory_name'],
            'category_id' => $request['categories_name']
        ]);
        try {
            return redirect()->route('subcategories.index')->with(['status' => 'subcategories uploaded successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->route('subcategories.index')->with(['status' => $th->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function remove_subcategories($id) {
        $subcategories = Subcategory::find($id);
        $subcategories->delete();
        return  response()->json(['subcategories' => $subcategories]);
    } 


    public function show_image($id) {
        $get_image = Subcategory::where('id', $id)->first();
        
        if($get_image) {
            return response()->json(['get_image' => $get_image]);
        }
        
    }
}
